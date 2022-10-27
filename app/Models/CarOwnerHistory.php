<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOwnerHistory extends Model
{
    use HasFactory;
    protected $table = 'car_owner_histories';
    protected $primaryKey = 'id';
    protected $guarded = [];
    // protected $fillable = [
    //     'car_id',
    //     'owner_type',
    //     'estimated_length_of_ownership',
    //     'states_provinces',
    //     'estimated_miles_per_year',
    //     'last_reported_odometer_reading',
    //     'total_loss',
    //     'structural_damage',
    //     'airbag_deployment',
    //     'odometer_check',
    //     'accident_damage',
    //     'manufacturer_recall',
    // ];

}
