<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopApparisal extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'shop_apparisals';
    protected $guarded = [];
    protected $primaryKey = 'id';

    function shopapperisalRequest(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

}
