<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
//    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }
}
