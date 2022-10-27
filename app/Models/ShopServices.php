<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopServices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'shop_services';
    protected $guarded = [];
    protected $primaryKey = 'service_id';

    public function shop_detail()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
