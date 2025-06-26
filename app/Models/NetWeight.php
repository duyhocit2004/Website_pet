<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetWeight extends Model
{
    use HasFactory;
    protected $table = 'net_weight';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'net_weight_id', 'id');
    }
}
