<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarService extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'date',
        'odometer',
        'completed',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'array',
        'date' => 'date',
    ];
}
