<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'filename',
        'type',
    ];

    /**
     * The append attributes.
     *
     * @var array
     */
    protected $appends = [
        'url',
    ];

    function getUrlAttribute() {
        return asset($this->filename ? storageAccessPath('carmedia', $this->car_id, $this->filename): 'no-image.png');
    }

    function car(){
        return $this->belongsTo(Car::class,'car_id');
    }
}
