<?php

namespace App\Traits\Admin;

use App\Models\Custom\Bahan;
use App\Models\Custom\Laminasi;
use Illuminate\Http\Request;

trait CustomGeneral
{
    public function bahan_list()
    {
        $data = Bahan::all();

        return response()->json($data);
    }

    public function bahan_add(Request $request)
    {
        Bahan::create([
            'nama' => $request->nama,
            'harga' => (int) $request->harga
        ]);

        return response()->json([
            'error' => false,
            'message' => $request->nama . ' berhasil ditambahkan'
        ]);
    }

    public function bahan_update(Request $request)
    {
        $data = Bahan::find($request->id);

        $data->update([
            'nama' => $request->nama,
            'harga' => (int) $request->harga
        ]);

        return response()->json($data->nama . ' berhasil diubah');
    }

    public function bahan_delete(Request $request)
    {
        $data = Bahan::find($request->id);
        $data->delete();

        return response()->json($data->nama . ' berhasil dihapus');
    }

    // =====

    public function laminasi_list()
    {
        $data = Laminasi::all();

        return response()->json($data);
    }

    public function laminasi_add(Request $request)
    {
        Laminasi::create([
            'nama' => $request->nama,
            'harga' => (int) $request->harga
        ]);

        return response()->json([
            'error' => false,
            'message' => $request->nama . ' berhasil ditambahkan'
        ]);
    }

    public function laminasi_update(Request $request)
    {
        $data = Laminasi::find($request->id);

        $data->update([
            'nama' => $request->nama,
            'harga' => (int) $request->harga
        ]);

        return response()->json($data->nama . ' berhasil diubah');
    }

    public function laminasi_delete(Request $request)
    {
        $data = Laminasi::find($request->id);
        $data->delete();

        return response()->json($data->nama . ' berhasil dihapus');
    }
}
