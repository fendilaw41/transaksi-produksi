<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = ['item_id', 'qty', 'waktu_target'];

    public function item()
    {
    	return $this->belongsTo(Item::class, 'item_id');
    }
}
