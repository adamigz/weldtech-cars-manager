<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_name',
        'car_registration',
        'price',
        'currency',
        'fuel_quantity',
        'car_course',
        'payed_by_dkv',
        'refueling_date',
        'dkv_number'
    ];
    // payments from user 

    // payments from car registration

    //payments payed by dkv
}
