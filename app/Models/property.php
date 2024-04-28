<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
    protected $fillable = [

        'qr_code_image',
        'picture',
        'changes',//for edit disabled
        'uuid',
        'user_id',
        'establishment',
        'address',
        'quantity',
        'item',
        'description',
        'seizing_officer',
        'witness',
        'date',
        'status',
        'municipality',
        'received',
    ];
}
