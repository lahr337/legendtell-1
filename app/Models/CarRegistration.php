<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'odometer',
        'has_closest_odometer',
        'oil_change',
        'oildate',
        'tire_rotation',
        'tiredate',
    ];
}
