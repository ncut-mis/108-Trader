<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'id',
        'seller_id',
        'category_id',
        'name',
        'price',
        'pictures',
        'detail',
        'status',
        'inventory'
    ];

    public function cart_items()
    {
        return $this->hasMany(Cart_item::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function sellers()
    {
        return $this->belongsTo(Seller::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
