<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

     public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

      public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
    }
}
