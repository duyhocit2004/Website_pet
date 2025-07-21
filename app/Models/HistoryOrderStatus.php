<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrderStatus extends Model
{
    use HasFactory;

    protected $table = 'history_order_status';

    protected $fillable = [
        'Order_id',
        'order_status_old',
        'order_status_new',
        'User_edit_method',
        'note',
    ];

    public function Order(){
        return $this->belongsTo(Order::class,'Order_id','id');
    }
}
