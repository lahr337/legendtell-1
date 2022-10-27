<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CommonController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Route::get('/shop-issue-repair', function () {
//     return view('shop-settings.partials.shop_services.shop_issue_repair');
// });
// Route::get('/car-wash-handwash', function () {
//     return view('shop-settings.partials.shop_services.car_wash_handwash');
// });
//termand condition
Route::get('/term-use', function () {
    return view('pages.term-use');
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
});
Route::any('/admin/login',[LoginController::class,'admin_login'])->name('.admin.login');
//social
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
//end social
Route::get('/collision-repair', function () {
    return view('shop-settings.partials.shop_services.collision-repair');
});

Route::get('image-upload', [ CommonController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ CommonController::class, 'imageUploadPost' ])->name('image.upload.post');

Route::post('store-session',[LoginController::class,'storeSession'])->name('store-session');



Route::get('/suspension', function () {
    return view('shop-settings.partials.shop_services.suspension');
});
Route::get('/rim-repair', function () {
    return view('shop-settings.partials.shop_services.rim-repair');
});

Route::get('/custom-build-body', function () {
    return view('shop-settings.partials.shop_services.custom-build-body');
});

Route::get('/electricalcontrols-specialty', function () {
    return view('shop-settings.partials.shop_services.electricalcontrols-specialty');
});
Route::get('/electricalcontrols-specialty', function () {
    return view('shop-settings.partials.shop_services.electricalcontrols-specialty');
});
Route::get('/performance-dyno-tuning', function () {
    return view('shop-settings.partials.shop_services.performance-dyno-tuning');
});
Route::get('/parts', function () {
    return view('shop-settings.partials.shop_services.parts');
});
Route::get('/paintless-dent-repair-pdr', function () {
    return view('shop-settings.partials.shop_services.paintless-dent-repair-pdr');
});
Route::get('/frame-alignment', function () {
    return view('shop-settings.partials.shop_services.frame-alignment');
});
Route::get('/mechanic', function () {
    return view('shop-settings.partials.shop_services.mechanic');
});
Route::get('/battery-service', function () {
    return view('shop-settings.partials.shop_services.battery-service');
});
Route::get('/paint-protection-film-ppf', function () {
    return view('shop-settings.partials.shop_services.paint-protection-film-ppf');
});
Route::get('/detailing-professional', function () {
    return view('shop-settings.partials.shop_services.detailing-professional');
});
Route::get('/install-details', function () {
    return view('shop-settings.partials.shop_services.install-details');
});
Route::get('/detailing-correction', function () {
    return view('shop-settings.partials.shop_services.detailing-correction');
});
Route::get('/paint-body', function () {
    return view('shop-settings.partials.shop_services.paint-body');
});


Route::get('/web_paint_service', function () {
    return view('account-settings.web.web_paint_service');
});
Route::get('/web_oil_service', function () {
    return view('account-settings.web.web_oil_service');
});

Route::get('/service', function () {
    return view('account-settings.web.service');
});
// Route::get('/tires', function () {
//     return view('shop-settings.partials.shop_services.tires');
// });
// Dashboard
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::post('/search', 'DashboardController@search')->name('search');

Route::group(['prefix' => 'vehicle', 'as' => 'vehicle'], function(){
    Route::get('/appraisal/{id}', 'VehicleController@appraisal')->name('.appraisal');
    Route::get('/{id}', 'VehicleController@view')->name('.view');
});

Route::group(['prefix' => 'shop', 'as' => 'shop'], function(){
    Route::get('/network-shop', 'ShopController@index')->name('.get-appraisal');
    Route::get('/{id}', 'ShopController@view')->name('.view');
});

Route::get('/auth/{type?}', 'Auth\LoginController@loginOrSignup')->name('auth.login-or-signup');

Route::post('/register/email-exists', 'Auth\RegisterController@emailExists')->name('register.email-exists');

// Common apis
Route::post('/get/years', 'CommonController@getYears')->name('get.years');
Route::post('/get/makes', 'CommonController@getMakes')->name('get.makes');
Route::post('/get/models', 'CommonController@getModels')->name('get.models');

Route::group(['prefix' => 'help', 'as' => 'help'], function(){
    Route::get('/', 'HelpController@index')->name('.index');

});

Route::group(['middleware' => ['auth']], function(){
    
    Route::group(['prefix' => 'account-settings', 'as' => 'account-settings'], function(){
        // Route::get('/vin-dashboard-service', function () {
        //     return view('account-settings.web._vin-dashboard-service');
        // });
        Route::get('/vin-dashboard-service/{servicedata?}', 'AccountSettingsController@userservices')->name('.vin-dashboard-service');
        Route::post('/email-exists', 'AccountSettingsController@emailExists')->name('.email-exists');
        Route::post('/change-password', 'AccountSettingsController@changePassword')->name('.change-password');
        // save Profile
        Route::put('/save-profile', 'AccountSettingsController@saveProfile')->name('.save-profile');
        Route::put('/save-notification-setting', 'AccountSettingsController@saveNotificationSetting')->name('.save-notification-setting');

        // Payment Methods
        Route::group(['prefix' => 'payment-method', 'as' => '.payment-method'], function(){
            Route::post('/make-default/{id}', 'AccountSettingsController@makeDefaultPaymentMethod')->name('.make-default');
            Route::delete('/delete/{id}', 'AccountSettingsController@deletePaymentMethod')->name('.delete');
            Route::post('/add', 'AccountSettingsController@addPaymentMethod')->name('.add');
        });

        Route::get('/{tab?}/{myval?}', 'AccountSettingsController@index')->name('.index');
       
        
    }); 
 
    //shop setting
    Route::group(['prefix' => 'shop-settings', 'as' => 'shop-settings'], function(){
        Route::post('/email-exists', 'ShopSettingController@emailExists')->name('.email-exists');
        Route::post('/change-password', 'ShopSettingController@changePassword')->name('.change-password');
        Route::post('/contact-form', 'VinShopController@store')->name('contact-form');
    //     Route::get('/ac-service-details', function () {
    // return view('shop-settings.partials.shop_services.ac_service_details');
    //      });
    // Route::get('/all-services', function () {
    //     return view('shop-settings.partials.all-services');
    // });
    Route::get('/all-services', 'ShopSettingController@allServices')->name('.all-services');
        // save Profile
        Route::put('/save-profile', 'ShopSettingController@saveProfile')->name('.save-profile');
        Route::put('/save-notification-setting', 'ShopSettingController@saveNotificationSetting')->name('.save-notification-setting');

        //services
        Route::put('/save-shop-service', 'ShopSettingController@saveShopService')->name('.save-shop-service');
        Route::post('/save-issue-repair', 'CarIssueController@IssueStore')->name('.save-issue-repair');
        
        

        // Payment Methods
        Route::group(['prefix' => 'payment-method', 'as' => '.payment-method'], function(){
            Route::post('/make-default/{id}', 'ShopSettingController@makeDefaultPaymentMethod')->name('.make-default');
            Route::delete('/delete/{id}', 'ShopSettingController@deletePaymentMethod')->name('.delete');
            Route::post('/add', 'ShopSettingController@addPaymentMethod')->name('.add');
        });

        //system
        // Route::get('/completedshop', function () {
        //     return view('shop-settings.partials.shop_services._services-completed');
        // });
        // Route::get('/tires', function () {
        //     return view('shop-settings.partials.shop_services.tires');
        // });
        // Route::get('/oil-service', function () {
        //     return view('shop-settings.partials.shop_services.oil-service');
        // });
        // Route::get('/brake-service', function () {
        //     return view('shop-settings.partials.shop_services.brake-service');
        // });
        // Route::get('/concierge-service', function () {
        //     return view('shop-settings.partials.shop_services.concierge-service');
        // });
        // Route::get('/exhaust', function () {
        //     return view('shop-settings.partials.shop_services.exhaust');
        // });
        // Route::get('/glass-service', function () {
        //     return view('shop-settings.partials.shop_services.glass-service');
        // });
        Route::get('/race-track', function () {
            return view('shop-settings.partials.shop_services.race-track');
        });
        // Route::get('/engine-block-specialty', function () {
        //     return view('shop-settings.partials.shop_services.engine-block-specialty');
        // });
        Route::get('/tint', function () {
            return view('shop-settings.partials.shop_services.tint');
        });
        Route::get('/completedshop/{vinid?}', 'VinShopController@completedshop')->name('.completedshop');
        Route::get('/shop-issue-repair/{vinid?}', 'CarIssueController@shopRepair')->name('.shop-issue-repair');
        Route::get('/ac-service/{vinid?}', 'ShopServicesController@acServices')->name('.ac-service');
        Route::put('/save-ac-service', 'ShopServicesController@AcStore')->name('.save-ac-service');
        Route::get('/vinyl-wraps/{vinid?}', 'VinylController@vinlyIndex')->name('.vinyl-wraps');
        Route::get('/tires/{vinid?}', 'TiresController@tireIndex')->name('.tires');
        Route::get('/oil-service/{vinid?}', 'OilServicesController@oilIndex')->name('.oil-service');
        Route::get('/brake-service/{vinid?}', 'BreakServicesController@breakIndex')->name('.brake-service');
         Route::get('/concierge-service/{vinid?}', 'ConciergeServicesController@conciergeIndex')->name('.concierge-service');
         Route::get('/exhaust/{vinid?}', 'ExhaustServicesController@exhaustIndex')->name('.exhaust');
        Route::get('/car-wash-handwash/{vinid?}', 'CarWashServicesController@carwashIndex')->name('.car-wash-handwash');
        Route::get('/glass-service/{vinid?}', 'GlassServicesController@glassIndex')->name('.glass-service');
        Route::get('/car-wash-self-serve/{vinid?}', 'CarWashServicesController@carwashIndex')->name('.car-wash-self-serve');
        Route::get('/car-wash-touchless/{vinid?}', 'CarWashServicesController@carwashIndex')->name('.car-wash-touchless');
        Route::put('/save-car-tunnel', 'CarWashServicesController@CarTunnelStore')->name('.save-car-tunnel');
        Route::get('/stab-change-carwash', 'CarWashServicesController@tab_change_carwash')->name('.stab-change-carwash');
        Route::put('/save-car-handle', 'CarWashServicesController@CarStore')->name('.save-car-handle');
        Route::get('/engine-block-specialty', 'EngineBlockServicesController@engineIndex')->name('.engine-block-specialty');
        Route::get('/tint', 'TintServicesController@tintIndex')->name('.tint');
        Route::post('/save-tintService','TintServicesController@storeTintService')->name('.save-tintService');
        Route::get('/collision-repair','CollisionRepairController@collisionIndex')->name('.collision-repair');
        Route::post('/save-collision-repair','CollisionRepairController@collisionSave')->name('.save-collision-repair');
        Route::get('electricalcontrols-specialty','ElectricControlController@indexElectricControl')->name('.electricalcontrols-specialty');
        Route::post('/save-electric-control','ElectricControlController@electricontrolSave')->name('.save-electric-control');
        Route::get('/parts','PartsController@indexPart')->name('.parts');
        Route::post('/save-parts','PartsController@saveParts')->name('.save-parts');
        Route::get('/specialty-other','SpecialtyOtherController@indexSpecialty')->name('.specialty-other');
        Route::post('/save-specialty-other','SpecialtyOtherController@saveSpeciality')->name('.save-specialty-other');
        Route::get('/powder-coating','PowderCoatingController@indexPowderCoating')->name('.powder-coating');
        Route::post('/save-powder-coating','PowderCoatingController@savePowderCoating')->name('.save-powder-coating');
        Route::get('/transmission','TransmissionController@indexTransmission')->name('.transmission');
        Route::post('/save-transmission','TransmissionController@saveTransmission')->name('.save-transmission');
        Route::get('/mechanic','MechanicalController@indexMechanical')->name('.mechanic');
        Route::post('/save-mechanic','MechanicalController@saveMechanical')->name('.save-mechanic');
        Route::get('/battery-service','BatteryServiceController@indexBatterService')->name('.battery-service');
        Route::post('/save-battery-service','BatteryServiceController@saveBatteryService')->name('.save-battery-service');
        Route::get('/rim-repair','RimRepairController@indexRimRepair')->name('.rim-repair');
        Route::post('/save-rim-repair','RimRepairController@saveRimRepair')->name('.save-rim-repair');
        Route::get('/paint-protection-film-ppf','PaintProtectionFilmController@indexPaintProtectionFilm')->name('.paint-protection-film-ppf');
        Route::post('/save-paint-protection-film-ppf','PaintProtectionFilmController@savePaintProtectionFilm')->name('.save-paint-protection-film-ppf');

       Route::get('/suspension','SuspensionController@indexSuspension')->name('.suspension');
       Route::post('/save-suspension','SuspensionController@saveSuspension')->name('.save-suspension');
       Route::get('/race-track','RaceTrackController@indexRaceTrack')->name('.race-track');
       Route::post('/save-race-track','RaceTrackController@saveRaceTrack')->name('.save-race-track');
       Route::post('/save-race-track-run-one','RaceTrackController@saveTrackRaceRunOne')->name('.save-race-track-run-one');
       Route::get('/paint-body','PaintBodyController@indexPaintBody')->name('.paint-body');
       Route::post('/save-paint-body','PaintBodyController@savePaintBody')->name('.save-paint-body');
       Route::get('/fabrication-welding','FabricationWeldingController@indexFabricationWelding')->name('.fabrication-welding');
       Route::post('/save-fabrication-welding','FabricationWeldingController@saveFabricationWelding')->name('.save-fabrication-welding');
       Route::get('/custom-build-body','CustomBuildBodyController@indexCustomBuildBody')->name('.custom-build-body');
       Route::post('/save-custom-build-body','CustomBuildBodyController@saveCustomBuildBody')->name('.save-custom-build-body');
       Route::get('/paintless-dent-repair-pdr','PaintlessDentRepairController@indexPaintlessDentRepairPdr')->name('.paintless-dent-repair-pdr');
       Route::post('/save-paintless-dent-repair-pdr','PaintlessDentRepairController@savePaintlessDentRepairPdr')->name('.save-paintless-dent-repair-pdr');
       Route::get('/frame-alignment','FrameAlignmentController@indexFrameAlignment')->name('.frame-alignment');
       Route::post('/save-frame-alignment','FrameAlignmentController@saveFrameAlignment')->name('.save-frame-alignment');
       Route::get('/detailing-professional','DetailingProfessionalController@indexDetailingProfessional')->name('.detailing-professional');
       Route::get('/detailing-correction','DetailingProfessionalController@indexDetailingCorrection')->name('.detailing-correction');
       Route::get('/detailing-correction','DetailingProfessionalController@indexDetailingCorrection')->name('.detailing-correction');
       Route::post('/save-detailing','DetailingProfessionalController@saveDetailing')->name('.save-detailing');

       
       Route::post('/save-detailing-professional','DetailingProfessionalController@saveDetailingProfessional')->name('.save-detailing-professional');
       Route::post('/save-vehicle-data','DetailingProfessionalController@savevehicleData')->name('.save-vehicle-data');
       Route::get('/install-details','PaintProtectionFilmController@installDetails')->name('.install-details');
       Route::post('/save-ppf-install-details','PaintProtectionFilmController@savePPFDetails')->name('.save-ppf-install-details');
       Route::get('/ceramic-coating','CeramicCoatingController@indexCreamicCoating')->name('.ceramic-coating');
       Route::post('/save-ceramic-coating','CeramicCoatingController@saveCreamicCoating')->name('.save-ceramic-coating');

       Route::get('/dealership-service','DealerShipController@indexDealerShip')->name('.dealership-service');
       Route::post('/save-dealership-service','DealerShipController@saveDealerShip')->name('.save-dealership-service');
       Route::get('/fuel-system','FuelSystemController@indexFuelSystem')->name('.fuel-system');
       Route::post('/save-fuel-system','FuelSystemController@saveFuelSystem')->name('.save-fuel-system');
       Route::get('/lubrication','LubricationController@indexLubrication')->name('.lubrication');
       Route::post('/save-lubrication','LubricationController@saveLubrication')->name('.save-lubrication');
       Route::get('/nitrous','NitrousController@indexNitrous')->name('.nitrous');
       Route::post('/save-nitrous','NitrousController@saveNitrous')->name('.save-nitrous');
       Route::get('/performance-dyno-tuning','PerformanceDynoTuningController@indexPDT')->name('.performance-dyno-tuning');
       Route::post('/save-performance-dyno-tuning','PerformanceDynoTuningController@savePDT')->name('.save-performance-dyno-tuning');

       // Route::get('/race-track/{vinid?}', 'GlassServicesController@raceIndex')->name('.race-track');
        // Route::get('/shop-issue-repair', function () {
        //     return view('shop-settings.partials.shop_services.shop_issue_repair');
        // });
        //dashbord insertVin Number
        Route::post('/insert-vin', 'VinShopController@vinInput')->name('.insert-vin');
        Route::get('/index-vin', 'VinShopController@vinIndex')->name('.index-vin');
        Route::get('/search-vin', 'VinShopController@vinSearch')->name('.search-vin');
        //end Vin number
        // Route::get('/approved-specialty', function () {
        //     return view('shop-settings.partials.apperisal.approved-specialty');
        // });
        
        //aperisal
        Route::get('/apperisal/{tab?}', 'ShopApparisalController@apperisal')->name('.apperisal');
        Route::get('/approved-specialty', 'ShopApparisalController@approved_specialty')->name('.approved-specialty');
        Route::post('/save-apperisalstored', 'ShopApparisalController@approved_stored')->name('.save-apperisalstored');
        Route::post('/save-engine-block', 'EngineBlockServicesController@save_engine_block')->name('.save-engine-block');
        //end apperisals
        Route::get('/{tab?}', 'ShopSettingController@index')->name('.index');
        //static page
        // vinly
        // Route::get('/vinyl-wraps', function () {
        //     return view('shop-settings.partials.shop_services.vinyl-wraps');
        // });

       
       Route::post('/save-vinly-car', 'VinylController@save_vinly_Car')->name('.save-vinly-car');
       Route::post('/save-tires', 'TiresController@save_tires')->name('.save-tires');
       Route::post('/save-OilServices', 'OilServicesController@save_oilservices')->name('.save-OilServices');
       Route::post('/save-break', 'BreakServicesController@save_break')->name('.save-break');
       Route::post('/save-glass', 'GlassServicesController@save_glass')->name('.save-glass');
       Route::post('/save-concierge', 'ConciergeServicesController@save_concierge')->name('.save-concierge');
       Route::post('/save-exhaust', 'ExhaustServicesController@save_exhaust')->name('.save-exhaust');
        // Route::get('/approved-specialty', function () {
        //     return view('shop-settings.partials.apperisal.approved-specialty');
        // });
        


    });
    //end shop setting
    //shop setting
    Route::group(['prefix' => 'admin-settings', 'as' => 'admin-settings'], function(){
        Route::post('/email-exists', 'AdminController@emailExists')->name('.email-exists');
        Route::post('/change-password', 'AdminController@changePassword')->name('.change-password');
        // save Profile
        Route::post('/save-profile', 'AdminController@saveProfile')->name('.save-profile');
        Route::put('/save-notification-setting', 'AdminController@saveNotificationSetting')->name('.save-notification-setting');
        //services
        Route::post('/add-services', 'ShopServicesController@addServices')->name('.add-services');
        Route::get('/list-services', 'ShopServicesController@listServices')->name('.list-services');
        //apperisal
        Route::get('/getShopdata', 'ShopApparisalController@getShopdata')->name('.getShopdata');
        Route::get('/shopApproved', 'ShopApparisalController@shopApproved')->name('.shopApproved');

        Route::post('/vin-insert', 'AdminController@vinInput')->name('.vin-insert');
        Route::get('/vin-index', 'AdminController@vinIndex')->name('.vin-index');
        Route::get('/vin-search', 'AdminController@vinSearch')->name('.vin-search');
        // Payment Methods
        Route::group(['prefix' => 'payment-method', 'as' => '.payment-method'], function(){
            Route::post('/make-default/{id}', 'AdminController@makeDefaultPaymentMethod')->name('.make-default');
            Route::delete('/delete/{id}', 'AdminController@deletePaymentMethod')->name('.delete');
            Route::post('/add', 'AdminController@addPaymentMethod')->name('.add');
        });

        Route::get('/{tab?}', 'AdminController@index')->name('.index');


    });
    //end shop setting
    Route::group(['prefix' => 'car', 'as' => 'car'], function(){
        Route::get('/', 'CarController@index')->name('.index');
        Route::post('/add', 'CarController@add')->name('.add');
        Route::post('/appraisal/update/{car_id}', 'CarController@appraisalUpdate')->name('.appraisal.update');
        Route::post('/add-registration/{car_id}', 'CarController@addRegistration')->name('.add-registration');
        Route::post('/add-service/{car_id}', 'CarController@addService')->name('.add-service');
        Route::post('/edit-service/{car_id}', 'CarController@editService')->name('.edit-service');
        Route::post('/set/default/picture', 'CarController@setDefaultPicture')->name('.set-default-picture');
        Route::get('/view/{id}', 'CarController@view')->name('.view');
        Route::get('/viewservices/{id}', 'CarController@viewservices')->name('.viewservices');
        Route::post('/delete/{id}', 'CarController@delete')->name('.delete');
        // Route::get('/viewservices', function () {
        //     return view('cars.partials._tab-contents.service-view');
        // });
        // Car Media
        Route::group(['prefix' => 'media', 'as' => '.media'], function(){
            Route::post('/uploads', 'CarMediaController@uplaodFiles')->name('.uploads');
            Route::post('/delete', 'CarMediaController@delete')->name('.delete');
        });

        // Car sticker
        Route::group(['prefix' => 'sticker', 'as' => '.sticker'], function(){
            Route::post('/uploads', 'CarStickerController@uplaodFiles')->name('.uploads');
            Route::post('/delete', 'CarStickerController@delete')->name('.delete');
        });

    });

    Route::group(['prefix' => 'sale', 'as' => 'sale'], function(){
        Route::post('/submit-offer/{car}', 'SaleController@offerSubmit')->name('.submit-offer');
    });

    Route::group(['prefix' => 'payment', 'as' => 'payment'], function(){
        Route::post('/do', 'PaymentController@do')->name('.do');
        Route::get('/{car}', 'PaymentController@index')->name('.index');
    });

});