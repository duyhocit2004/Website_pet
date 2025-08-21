<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whishList extends Model
{
    use HasFactory;

    protected $table = 'whishlist';

    protected $fillable = [
        'use_id',
        'product_id'
    ];
}
