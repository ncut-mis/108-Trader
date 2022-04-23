<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'member_id',
        'seller_id',
        'date',
        'status',
        'score',
        'comment',
        'pay',
        'way',
        'price',

    ];
    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
}
