<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
      public function index()
    {
        $item = Item::latest()->get();

        return response()->json([
            'status' => true,
            'results' => $item
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
        ]);
        try {
            $item = new Item;
            $item->kode = $request->kode;
            $item->nama_item = $request->nama_item;
            $item->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Simpan Item",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Simpan Item",
        ], 200);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);

        return response()->json([
            'status' => true,
            'result' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        
        $this->validate($request, [
            'kode' => 'required',
            'nama_item' => 'required',
        ]);
        try {
           $item->kode = $request->kode;
            $item->nama_item = $request->nama_item;
            $item->update();
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => "Gagal Update Item",
                'error' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => "Berhasil Update Item",
        ], 200);
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id)->delete();
        return response()->json([
            'status' => true,
            'message' => "Berhasil Delete Item",
        ], 200);
    }
}
