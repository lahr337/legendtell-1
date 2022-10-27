<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'email',
        'telephone',
        'location',
        'description',
        'services'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'services'          => 'array',
    ];

    /**
     * The append attributes.
     *
     * @var array
     */
    protected $appends = [
        'picture_url',
    ];

    function getPictureUrlAttribute() {
        return asset($this->picture ? '/assets/pics/network-shops/'. $this->picture: 'no-image.png');
    }

}
