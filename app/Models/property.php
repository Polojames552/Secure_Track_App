<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
    protected $fillable = [
        'qr_code_image',
        'user_id',
        'establishment',
        'address',
        'quantity',
        'description',
        'seizing_officer',
        'witness',
        'date',
        'status',
    ];
}
