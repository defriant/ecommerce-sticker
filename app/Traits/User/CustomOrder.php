<?php

namespace App\Traits\User;

use Auth;
use Pusher\Pusher;
use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\PesananBarang;

trait CustomOrder
{
    public function custom_create_order(Request $request)
    {
        $orderData = [];

        foreach ($request->all() as $reqKey => $reqVal) {
            if ($reqVal) {
                if ($reqKey === 'bahan' || $reqKey === 'laminasi') {
                    $orderData[$reqKey] = [
                        'barang_id' => 'general',
                        'nama' => ucwords(str_replace('_', ' ', $reqKey)) . '|' . $reqVal['nama'],
                        'harga' => $reqVal['price'],
                        'jumlah' => 1,
                        'total' => $reqVal['price'],
                        'gambar' => null,
                        'url' => null
                    ];
                } else {
                    $orderData[$reqKey] = [
                        'barang_id' => $reqVal['id'],
                        'nama' => ucwords(str_replace('_', ' ', $reqKey)) . '|' . $reqVal['nama'],
                        'harga' => $reqVal['price'],
                        'jumlah' => 1,
                        'total' => $reqVal['price'],
                        'gambar' => $reqVal['url'],
                        'url' => null
                    ];
                }
            }
        }

        Keranjang::where('user_id', Auth::user()->id)->where('type', 'custom')->delete();

        foreach ($orderData as $data) {
            Keranjang::create([
                'type' => 'custom',
                'user_id' => Auth::user()->id,
                'barang_id' => $data['barang_id'],
                'nama' => $data['nama'],
                'harga' => $data['harga'],
                'jumlah' => $data['jumlah'],
                'total' => $data['total'],
                'gambar' => $data['gambar'],
                'url' => $data['url']
            ]);
        }

        return response()->json($orderData);
    }

    public function custom_pesanan_proses(Request $request)
    {
        $random = '';
        for ($i = 0; $i < 4; $i++) {
            $angka = random_int(0, 9);
            $random .= $angka;
        }
        $tgl_sekarang = date("md");
        $id_pesanan = Auth::user()->id . $tgl_sekarang . $random;

        $total = Keranjang::where('user_id', Auth::user()->id)->where('type', 'custom')->sum('total');

        Pesanan::create([
            'id' => $id_pesanan,
            'type' => 'custom',
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'total' => $total,
            'status' => 'menunggu_konfirmasi'
        ]);

        foreach (Auth::user()->keranjang()->where('type', 'custom')->get() as $k) {
            PesananBarang::create([
                'pesanan_id' => $id_pesanan,
                'barang_id' => $k->barang_id,
                'nama' => $k->nama,
                'harga' => $k->harga,
                'jumlah' => $k->jumlah,
                'jenis_stock' => $k->jenis_stock,
                'total' => $k->total,
                'gambar' => $k->gambar,
                'url' => $k->url
            ]);
        }

        // Kirim notif ke admin
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true,
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $notif_data = ['pesanan_id' => $id_pesanan];
        $pusher->trigger('admin-channel', 'konfirmasi-pesanan-event', $notif_data);

        Keranjang::where('user_id', Auth::user()->id)->where('type', 'custom')->delete();

        return redirect('/pesanan/' . $id_pesanan);
    }
}
