<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';
    protected $fillable = [
        'title',
        'descripton',
        'Link_video',
        'Link_product',
        'status',
        'role',
    ];
}
