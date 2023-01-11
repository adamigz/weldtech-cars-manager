<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDriver extends Model
{
    use HasFactory;

    protected $table = 'car_driver';

    protected $fillable = [
        'driver_name',
        'car_registration',
        'dkv_number',
        'from',
        'to',
        'previous_owner'
    ];

    // filter by driver 

    // filter by car registration

    // filter by dkv number
}
