<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransaksiRequest;

use App\Models\Transaksi;
use App\Models\Item;
use App\Models\Lokasi;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
    	$tanggal = $request->tanggal_transaksi;
    	$lokasi_cari = $request->lokasi;

        $transaksi = Transaksi::when($tanggal, function($query, $tanggal) {
            return $query->where('tanggal_transaksi', 'like', '%'.$tanggal.'%');
        })->when($lokasi_cari, function($query, $lokasi_cari) {
            return $query->where('lokasi_id', 'like', '%'.$lokasi_cari.'%');
        })->with(['karyawan', 'lokasi', 'item'])->latest()->get();

    	$item = Item::latest()->get();
    	$lokasi = Lokasi::latest()->get();

    	return view('pages.transaksi.index', compact('transaksi', 'item', 'lokasi', 'tanggal', 'lokasi_cari'));
    }

    public function create()
    {

    	return view('pages.transaksi.create');
    }

    public function store(TransaksiRequest $request)
    {
    	$transaksi = $request->validated();

    	try{

    	$transaksi = new Transaksi;
    	$transaksi->karyawan_id = $request->karyawan_id;
    	$transaksi->tanggal_transaksi = $request->tanggal_transaksi;
    	$transaksi->lokasi_id = $request->lokasi_id;
    	$transaksi->item_id = $request->item_id;
    	$transaksi->qty = $request->qty;
    	$transaksi->save();

    	} catch(\Exeption $e) {

    		return redirect()->route('transaksi.index')->with('error', 'Gagal Simpan Transaksi');
    	}

    	return redirect()->route('transaksi.index')->with('sukses', 'Berhasil Simpan Transaksi');
    }

    public function edit($id)
    {
    	$transaksi = Transaksi::with(['karyawan', 'lokasi', 'item'])->findOrFail($id);

    	return view('pages.transaksi.edit', compact('transaksi'));
    }

     public function show($id)
    {
    	$transaksi = Transaksi::with(['karyawan', 'lokasi', 'item'])->findOrFail($id);

    	return view('pages.transaksi.show', compact('transaksi'));
    }

    public function update(TransaksiRequest $request, $id)
    {
    	$transaksi = $request->validated();

    	try{
		$transaksi = Transaksi::findOrFail($id);
    	$transaksi->tanggal_transaksi = date('Y-m-d', strtotime($request->tanggal_transaksi));;
    	$transaksi->karyawan_id = $request->karyawan_id;
    	$transaksi->lokasi_id = $request->lokasi_id;
    	$transaksi->item_id = $request->item_id;
    	$transaksi->qty = $request->qty;
    	$transaksi->update();

    	} catch(\Exeption $e) {
    		return redirect()->route('transaksi.index')->withInput()->with('error', 'Gagal Update Transaksi');
    	}

    	return redirect()->route('transaksi.index')->with('sukses', 'Berhasil Update Transaksi');
    }

     public function destroy($id)
    {
    	$transaksi = Transaksi::findOrFail($id);
    	$transaksi->delete($id);

    	return redirect()->route('transaksi.index')->with('sukses', 'Berhasil Hapus Transaksi');
    }
}
