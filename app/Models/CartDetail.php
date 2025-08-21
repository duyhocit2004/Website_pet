<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cartdetail';

    protected $fillable = [
      'cart_id',
      'product_id',
      'product_vartiant_id',
      'quantity',
      'price'
    ];

    public function Cart(){
        return $this->belongsTo(Cart::class);
    }

    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function ProductVariant(){
        return $this->belongsTo(ProductVariant::class,'product_vartiant_id','id');
    }
}
