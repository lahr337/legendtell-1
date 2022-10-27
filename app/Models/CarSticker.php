<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSticker extends Model
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
        return asset($this->filename ? storageAccessPath('carsticker', $this->car_id, $this->filename): 'no-image.png');
    }
}
