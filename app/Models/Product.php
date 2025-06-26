<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'title',
        'rating',
        'image',
        'SKU',
        'status',
        'discount',
        'created_at',
        'updated_at'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
    public function AlbumImage()
    {
        return $this->hasMany(AlbumImage::class, 'product_id', 'id');
    }

}
