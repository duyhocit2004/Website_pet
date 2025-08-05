<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = "location";
    protected $fillable = [
        'user_id',
        'province_code',
        'province_name',
        'district_code',
        'district_name',
        'ward_code',
        'ward_name',
        'phone',
        'location_detail',
        'is_default',
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
