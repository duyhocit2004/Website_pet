<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    use HasFactory;

    protected $table = 'status_order';

    protected $fillable = [
        'name'
    ];

    public function Order(){
        return $this->hasOne(Order::class,'status_order_id','id');
    }
}
