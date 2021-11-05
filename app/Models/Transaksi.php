<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // relasi ke table karyawan
     public function karyawan()
    {
    	return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    // relasi ke table lokasi
     public function lokasi()
    {
    	return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    // relasi ke table item
     public function item()
    {
    	return $this->belongsTo(Item::class, 'item_id');
    }

    public function getTanggalTransaksiAttribute()
    {
    	return \Carbon\Carbon::parse($this->attributes['tanggal_transaksi'])->format('d-m-Y');
    }


}
