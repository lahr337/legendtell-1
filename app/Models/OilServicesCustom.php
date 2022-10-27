<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OilServicesCustom extends Model
{
    use HasFactory;
    protected $table = 'oil_services_custom';
    protected $guarded = [];
    protected $primaryKey = 'oil_id';
}
