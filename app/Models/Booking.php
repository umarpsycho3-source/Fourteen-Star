<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'service',
    'barber',
    'date',
    'time_slot',
    'price',
    'payment_method',
    'payment_status',
    'status',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}