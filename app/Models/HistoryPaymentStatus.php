<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPaymentStatus extends Model
{
    use HasFactory;
    protected $table = 'history_payment_status';
    protected $fillable = [
        'Order_id',
        'status_old',
        'status_new',
        'User_edit_status',
        'note',
    ];
    public function Order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
