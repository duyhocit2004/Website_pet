<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    
    protected $table = "voucher";
    protected $fillable = [
        "code",
        "description",
        "discount_type",
        "discount_value",
        "max_discount",
        'min_order_amount',
        "usage_limit",
        "used_count",
        "start_date",
        "end_date",
        "is_active",

    ];

    public function UsedVoucher(){
        return $this->hasMany(UsedVoucher::class,'user_id',"id");
    }
}
