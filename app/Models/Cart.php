<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function User(){
        return $this->belongsTo(User::class );
    }
    public function cartDetail(){
        return $this->hasOne(CartDetail::class,'cart_id',"id");
    }
}
