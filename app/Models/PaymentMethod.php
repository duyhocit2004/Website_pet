<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_method' ;

    protected $fillable = [
        'name'
    ];
      public function Order(){
        return $this->hasOne(Order::class,'payment_method_id','id');
    }
}
