<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Karyawan;

class KaryawanController extends Controller
{
      public function index()
    {
        $kary = Karyawan::latest()->get();

        return response()->json([
            'status' => true,
            'results' => $kary
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'npk' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        try {
            $kary = new Karyawan;
            $kary->npk = $request->npk;
            $kary->nama = $request->nama;
            $kary->alamat = $request->alamat;
            $kary->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Simpan Karyawan",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Simpan Karyawan",
        ], 200);
    }

    public function show($id)
    {
        $kary = Karyawan::findOrFail($id);

        return response()->json([
            'status' => true,
            'result' => $kary
        ]);
    }

    public function update(Request $request, $id)
    {
        $kary = Karyawan::findOrFail($id);
        
        $this->validate($request, [
            'npk' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        try {
            $kary->npk = $request->npk;
            $kary->nama = $request->nama;
            $kary->alamat = $request->alamat;
            $kary->update();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Update Karyawan",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Update Karyawan",
        ], 200);
    }

    public function destroy($id)
    {
        $kary = Karyawan::findOrFail($id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Berhasil Delete Karyawan",
        ], 200);
    }
}
