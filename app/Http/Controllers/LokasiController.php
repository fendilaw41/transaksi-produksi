<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lokasi;

class LokasiController extends Controller
{
      public function index()
    {
        $location = Lokasi::latest()->get();

        return response()->json([
            'status' => true,
            'results' => $location
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama_lokasi' => 'required',
        ]);
        try {
            $location = new Lokasi;
            $location->kode = $request->kode;
            $location->nama_lokasi = $request->nama_lokasi;
            $location->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Simpan Lokasi",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Simpan Lokasi",
        ], 200);
    }

    public function show($id)
    {
        $location = Lokasi::findOrFail($id);

        return response()->json([
            'status' => true,
            'result' => $location
        ]);
    }

    public function update(Request $request, $id)
    {
        $location = Lokasi::findOrFail($id);
        
        $this->validate($request, [
            'kode' => 'required',
            'nama_lokasi' => 'required',
           ]);
        try {
            $location->kode = $request->kode;
            $location->nama_lokasi = $request->nama_lokasi;
            $location->update();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Update Lokasi",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Update Lokasi",
        ], 200);
    }

    public function destroy($id)
    {
        $location = Lokasi::findOrFail($id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Berhasil Delete Lokasi",
        ], 200);
    }
}
