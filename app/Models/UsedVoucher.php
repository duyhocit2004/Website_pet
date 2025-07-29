<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedVoucher extends Model
{
    use HasFactory;
    
    protected $table = 'used_voucher';

    protected $fillable = [
        'user_id',
        "voucher_id",
        'status'
    ];

    public function Voucher(){
        return $this->belongsTo(Voucher::class,"user_id","id");
    }
}
