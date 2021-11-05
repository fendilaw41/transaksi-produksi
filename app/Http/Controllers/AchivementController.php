<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Achivement;

class AchivementController extends Controller
{
      public function index()
    {
        $achiv = Achivement::with(['item'])->latest()->get();

        return response()->json([
            'status' => true,
            'results' => $achiv
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);
        try {
            $achiv = new Achivement;
            $achiv->kode = $request->kode;
            $achiv->time_from = $request->time_from;
            $achiv->time_to = $request->time_to;
            $achiv->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Simpan Achivement",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Simpan Achivement",
        ], 200);
    }

    public function show($id)
    {
        $achiv = Achivement::findOrFail($id);

        return response()->json([
            'status' => true,
            'result' => $achiv
        ]);
    }

    public function update(Request $request, $id)
    {
        $achiv = Achivement::findOrFail($id);
        
        $this->validate($request, [
            'kode' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
           ]);
        try {
            $achiv->kode = $request->kode;
            $achiv->time_from = $request->time_from;
            $achiv->time_to = $request->time_to;
            $achiv->update();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Update Achivement",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Update Achivement",
        ], 200);
    }

    public function destroy($id)
    {
        $achiv = Achivement::findOrFail($id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Berhasil Delete Achivement",
        ], 200);
    }
}
