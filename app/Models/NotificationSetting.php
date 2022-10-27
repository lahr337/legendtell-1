<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'open_recall',
        'oil_change_due',
        'tire_rotation_due',
        'safety_inspection_due',
        'registration_due',
        'emissions_inspection_due',
        'leave_service_review',
        'monthly_vehicle_report',
        'add_vehicle_reminder',
        'still_own_vehicle',
        'user_id',
    ];

    function user() {
         return $this->belongsTo(User::class);
    }

}
