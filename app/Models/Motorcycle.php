<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;
    protected $fillable = [
        'qr_code_image',
        'uuid',
        'user_id',
        'make_type',
        'chasis',
        'motor_no',
        'plate_no',
        'color',
        'ORCR_no',
        'LTO_File_no',
        'registered_owner',
        'address',
        'violations',
        'date',
        'status',
        'municipality',
    ];
}
