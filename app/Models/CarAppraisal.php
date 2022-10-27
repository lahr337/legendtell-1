<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarAppraisal extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'engine',
        'mileage',
        'appraisal_date',
        'appraiser',
        'market_value',
        'appraisal_value',
        'user_id',
        'car_id',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'appraisal_date' => 'date',
    ];
}
