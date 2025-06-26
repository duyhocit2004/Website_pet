<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';
    protected $fillable = [
        'product_id',
        'location_name',
        'location_address',
        'location_type',
        'location_phone'
    ];
}
