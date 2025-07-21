<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymenStatus extends Model
{
    use HasFactory;

    protected $table = 'payment_status';

    protected $fillable = [
        'name'
    ];

    public function Order(){
        return $this->hasOne(Order::class,'payment_status_id','id');
    }
    
}
