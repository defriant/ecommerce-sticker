<?php

namespace App\Traits\Admin;

use App\Models\Custom\Desain;
use App\Models\Custom\Tipe;
use Illuminate\Http\Request;
use Str;

trait CustomPart
{
    public function tipe_get($tipe)
    {
        $data = Tipe::where('tipe', $tipe)->get();
        return response()->json($data);
    }

    public function tipe_add(Request $request, $tipe)
    {
        $data = Tipe::create([
            'tipe' => $tipe,
            'nama' => $request->nama
        ]);

        return response()->json([
            'data' => $data,
            'message' => $request->nama . ' berhasil ditambahkan'
        ]);
    }

    public function tipe_update(Request $request)
    {
        $data = Tipe::find($request->id);

        $data->update([
            'nama' => $request->nama
        ]);

        return response()->json([
            'data' => $data,
            'message' => $data->nama . ' berhasil diubah'
        ]);
    }

    public function tipe_delete(Request $request)
    {
        $data = Tipe::find($request->id);

        $data->delete();
        Desain::where('tipe_id', $request->id)->delete();

        return response()->json($data->nama . ' berhasil dihapus');
    }

    // Part
    public function desain_get($tipe_id, $part)
    {
        $data = Desain::where('tipe_id', $tipe_id)->where('part', $part)->get();

        return response()->json($data);
    }

    public function desain_add(Request $request, $tipe_id, $part)
    {
        $gambar = null;

        if ($request->gambar) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $filename = Str::uuid() . '-' . time() . '.' . $extension;
            $gambar = $filename;
            $request->file('gambar')->move('admins/desain_img/', $filename);
        }

        Desain::create([
            'tipe_id' => $tipe_id,
            'part' => $part,
            'nama' => $request->nama,
            'harga' => (int) $request->harga,
            'gambar' => $gambar
        ]);

        return response()->json($request->nama . ' berhasil ditambahkan');
    }

    public function desain_update(Request $request, $tipe_id, $part)
    {
        $data = Desain::find($request->id);
        $payload = [
            'nama' => $request->nama,
            'harga' => (int) $request->harga
        ];

        $gambar = null;
        if ($request->gambar) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $filename = Str::uuid() . '-' . time() . '.' . $extension;
            $gambar = $filename;
            $request->file('gambar')->move('admins/desain_img/', $filename);
        }

        if ($gambar) $payload['gambar'] = $gambar;

        $data->update($payload);

        return response()->json($data->nama . ' berhasil diubah');
    }

    public function desain_delete(Request $request)
    {
        $data = Desain::find($request->id);
        $data->delete();

        return response()->json($data->nama . ' berhasil dihapus');
    }

    public function desain_selfupload(Request $request)
    {
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $name = Str::uuid();
        $filename = $name . '-' . time() . '.' . $extension;
        $request->file('gambar')->move('admins/desain_img/', $filename);

        $data = Desain::create([
            'tipe_id' => 'self_upload',
            'part' => 'self_upload',
            'nama' => $name,
            'harga' => 50000,
            'gambar' => $filename
        ]);

        return response()->json($data);
    }
}
