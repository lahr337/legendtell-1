<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verify_token',
        'status',
        'avatar',
        "first_name",
        "last_name",
        "email",
        "contact_number",
        "address",
        "city",
        "state",
        "zip_code",
        "country",
        "plan_id",
        "stripe_customer_id",
        "stripe_default_card_id",
        "purchased_reports",
        "view_reports",
        "shop_name",
        "shop_photo",
        "shop_latitude",
        "shop_longitude",
        "role",
        "approve",
        "fb_id",
        "google_id",
        "first_login"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The append attributes.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
        'name',
    ];

    function getAvatarUrlAttribute() {
        return asset($this->avatar ? '' .$this->avatar : 'avatar.jpg');
    }
    function getShopLogoUrlAttribute() {
        return asset($this->avatar ? 'storage/uploads/shoplogo/' .$this->avatar : 'avatar.jpg');
    }
    function getShopphotoUrlAttribute() {
        return asset($this->shop_photo ? 'storage/uploads/photo/' .$this->shop_photo : 'shop_photo.png');
    }

    function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    function notification_setting(){
        return $this->hasOne(NotificationSetting::class);
    }

    function plan(){
        return $this->belongsTo(Plan::class,'plan_id');
    }

    function payment_cards(){
        return $this->hasMany(PaymentCard::class);
    }
    
}
