<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'text',
        'ok',
        'damaged',
        'other',
    ];

}
