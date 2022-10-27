<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOfferSubmition extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'offer_amount',
        'sender_id',
    ];

}
