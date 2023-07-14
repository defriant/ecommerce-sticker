<?php

namespace App\Traits\Admin;

use App\Models\Custom\Tipe;
use Illuminate\Http\Request;

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

        return response()->json($data->nama . ' berhasil dihapus');
    }
}
