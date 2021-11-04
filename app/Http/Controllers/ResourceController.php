<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Item;
use App\Models\Lokasi;

class ResourceController extends Controller
{
    // select2 untuk Karyawan
    public function getKaryawan(Request $request)
    {
        $search = $request->search;

        $kary = Karyawan::when($search, function($query, $search) {
            return $query->where('nama', 'like', '%'.$search.'%');
        })->paginate(10);

        return response()->json([
            'status' => false,
            'message' => 'Success Fetch Karyawan',
            'results' => $kary
        ], 200);
    }

    // select2 untuk Item
    public function getItem(Request $request)
    {
        $search = $request->search;

        $item = Item::when($search, function($query, $search) {
            return $query->where('nama_item', 'like', '%'.$search.'%');
        })->paginate(10);

        return response()->json([
            'status' => false,
            'message' => 'Success Fetch Item',
            'results' => $item
        ], 200);
    }

    // select2 untuk Lokasi
    public function getLokasi(Request $request)
    {
        $search = $request->search;

        $lokasi = Lokasi::when($search, function($query, $search) {
            return $query->where('nama_lokasi', 'like', '%'.$search.'%');
        })->paginate(10);

        return response()->json([
            'status' => false,
            'message' => 'Success Fetch lokasi',
            'results' => $lokasi
        ], 200);
    }
}
