<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'code',
        'username',
        'user_id',
        'province_code',
        'province_name',
        'district_code',
        'district_name',
        'ward_code',
        'ward_name',
        'phone',
        'email',
        'note',
        'discount',
        'payment_method_id',
        'payment_status_id',
        'status',
        'created_at',
        'status_order_id'
    ];

    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id','id');
    }
    public function PaymenStatus(){
        return $this->belongsTo(PaymenStatus::class,'payment_status_id','id');
    }

    public function HistoryOrderStatus(){
        return $this->hasOne(HistoryOrderStatus::class,'Order_id','id');
    }
    public function HistoryPaymentStatus(){
        return $this->hasOne(HistoryOrderStatus::class,'Order_id','id');
    }
    public function StatusOrder(){
        return $this->belongsTo(StatusOrder::class,'status_order_id','id');
    }
}
