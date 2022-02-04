<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;
    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
