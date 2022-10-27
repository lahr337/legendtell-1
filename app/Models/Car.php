<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Car extends Model
{
     use HasFactory;

     protected $fillable = [
          'year',
          'make',
          'model',
          'picture',
          'vin',
          'miles',
          'drive',
          'status',
          'location',
          'user_id',
          'trims',
          "model_engine_cc",
          "model_engine_cyl",
          "model_engine_type",
          "ref_type",
     ];

     /**
      * The attributes that should be cast to native types.
      *
      * @var array
      */
     protected $casts = [
          'trims'          => 'array',
     ];

     /**
      * The append attributes.
      *
      * @var array
      */
     protected $appends = [
          'title',
          'model_engine',
          'has_submited',
     ];

     function getTitleAttribute()
     {
          return $this->year . ' ' . $this->make . ' ' . $this->model;
     }

     function getModelEngineAttribute()
     {
          return $this->model_engine_type . '-' . $this->model_engine_cyl . ' ' . $this->model_engine_cc;
     }

     function getPictureUrlAttribute()
     {
          return $this->media ? $this->media->url : asset('/no-image.png');
     }

     function services()
     {
          return $this->hasMany(CarService::class);
     }

     function registrations()
     {
          return $this->hasMany(CarRegistration::class);
     }

     function medias()
     {
          return $this->hasMany(CarMedia::class);
     }

     function medias_picture()
     {
          return $this->hasOne(CarMedia::class,'id','picture');
     }

     function media()
     {
          return $this->belongsTo(CarMedia::class, 'picture');
     }

     function conditions()
     {
          return $this->hasMany(CarCondition::class);
     }

     function stickers()
     {
          return $this->hasMany(CarSticker::class);
     }

     function appraisal()
     {
          return $this->hasOne(CarAppraisal::class);
     }

     function user()
     {
          return $this->hasOne(CarUser::class);
     }

     function submittions()
     {
          return $this->hasMany(CarOfferSubmition::class);
     }

     function getHasSubmitedAttribute()
     {
          if (auth()->check()) {
               return $this->submittions->where('sender_id', auth()->user()->id)->first() != null;
          }
          return false;
     }

     public function ownerHistory()
     {
          return $this->belongsTo('App\Models\CarOwnerHistory', 'id', 'car_id');
     }
     public function acHistory()
     {
          return $this->belongsTo('App\Models\AcServices', 'id', 'car_id');
     }
     public function carwashHistory()
     {
          return $this->belongsTo('App\Models\CarWashServices', 'id', 'car_id');
     }
     public function carhandwashHistory()
     {
          return $this->belongsTo('App\Models\CarWashServices', 'id', 'car_id')->where('services_name', 'Handwash');
     }
     public function carselfHistory()
     {
          return $this->belongsTo('App\Models\CarWashServices', 'id', 'car_id')->where('services_name', 'Self-serve');
     }
     public function cartunnelHistory()
     {
          return $this->belongsTo('App\Models\CarWashServices', 'id', 'car_id')->where('services_name', 'Touchless');
     }
     public function concerigeHistory()
     {
          return $this->belongsTo('App\Models\ConciergeServices', 'id', 'car_id');
     }
     public function breakHistory()
     {
          return $this->belongsTo('App\Models\BreakServices', 'id', 'car_id');
     }
     public function userData()
     {
          return $this->belongsTo('App\Models\User', 'user_id', 'id');
     }

     public function shopData()
     {
          return $this->belongsTo('App\Models\User', 'user_id', 'id')->where('id','!=',Auth::user()->id)->where('role',3);
     }
     public function colisonRepair()
     {
          return $this->belongsTo('App\Models\CollisionRepair', 'id', 'car_id');
     }
     public function engineblockService()
     {
          return $this->belongsTo('App\Models\EngineBlockServices', 'id', 'car_id');
     }
     public function exhaustService()
     {
          return $this->belongsTo('App\Models\ExhaustServices', 'id', 'car_id');
     }
     public function OilServices()
     {
          return $this->belongsTo('App\Models\OilServices', 'id', 'car_id');
     }
     public function batteryServices()
     {
          return $this->belongsTo('App\Models\BatteryService', 'id', 'car_id');
     }
     public function powderCoatingServices()
     {
          return $this->belongsTo('App\Models\PowderCoating', 'id', 'car_id');
     }
     public function tireServices()
     {
          return $this->belongsTo('App\Models\Tires', 'id', 'car_id');
     }
     public function partServices()
     {
          return $this->belongsTo('App\Models\Parts', 'id', 'car_id');
     }
     public function electricServices()
     {
          return $this->belongsTo('App\Models\ElectricControl', 'id', 'car_id');
     }
     public function transmissionServices()
     {
          return $this->belongsTo('App\Models\Transmission', 'id', 'car_id');
     }
     public function tintServices()
     {
          return $this->belongsTo('App\Models\TintServices', 'id', 'car_id');
     }
     public function glassServices()
     {
          return $this->belongsTo('App\Models\GlassServices', 'id', 'car_id');
     }
     public function rimServices()
     {
          return $this->belongsTo('App\Models\RimRepair', 'id', 'car_id');
     }
     public function raceTrackServices()
     {
          return $this->belongsTo('App\Models\RaceTrack', 'id', 'car_id');
     }
     public function spicalotherServices()
     {
          return $this->belongsTo('App\Models\SpecialtyOther', 'id', 'car_id');
     }
     public function SuspensionServices()
     {
          return $this->belongsTo('App\Models\Suspension', 'id', 'car_id');
     }
     public function mechicalServices()
     {
          return $this->belongsTo('App\Models\Mechanical', 'id', 'car_id');
     }
     public function beforefragment()
     {
          return $this->belongsTo('App\Models\FrameAlignment', 'id', 'car_id');
     }
     public function afterfragment()
     {
          return $this->belongsTo('App\Models\AfterFrameAlignment', 'id', 'car_id');
     }
     public function paintlessdentrepair()
     {
          return $this->belongsTo('App\Models\PaintlessDentRepair', 'id', 'car_id');
     }
     public function vinlyservices()
     {
          return $this->belongsTo('App\Models\Vinyl', 'id', 'car_id');
     }

     public function ceramicHistory()
     {
          return $this->belongsTo(CeramicCoating::class, 'id', 'car_id');
     }

     public function customBuildBody()
     {
          return $this->belongsTo(CustomBuildBody::class, 'id', 'car_id');
     }

     public function dealerShip()
     {
          return $this->belongsTo(DealerShip::class, 'id', 'car_id');
     }

     public function fabrication()
     {
          return $this->belongsTo(FabricationWelding::class, 'id', 'car_id');
     }

     public function fuel_system()
     {
          return $this->belongsTo(FuelSystem::class, 'id', 'car_id');
     }

     public function lubrication()
     {
          return $this->belongsTo(Lubrication::class, 'id', 'car_id');
     }

     public function nitrous()
     {
          return $this->belongsTo(Nitrous::class, 'id', 'car_id');
     }

     public function paint_body()
     {
          return $this->belongsTo(PaintBody::class, 'id', 'car_id');
     }

     public function performance_dyno_tuning()
     {
          return $this->belongsTo(PerformanceDynoTuning::class, 'id', 'car_id');
     }

     public function PPF()
     {
          return $this->belongsTo(PaintProtectionFilm::class, 'id', 'car_id');
     }
}
