<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    use HasFactory;
    protected $table = 'vinyls';
    protected $guarded = [];
    protected $primaryKey = 'vinyl_id';

    public function shop_service()
    {
        return $this->hasOne(ShopServices::class,'service_id','service_id');
    }

    public function shop_user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function car_user()
    {
      return $this->hasOne(Car::class,'id','car_id');
    }

    public function car_issue()
    {
        return $this->hasOne(CarIssue::class,'issue_id','car_issue_id');
    }
}
