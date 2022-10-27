<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CarQueryApi {

    public static function getYears() {
        return self::get(['cmd' => 'getYears' ]);
    }

    public static function getMakes($year = '') {
        return self::get(['cmd' => 'getMakes', 'year' => $year,'sold_in_us' => 1 ]);
    }

    public static function getModels($year = '', $make = '') {
        return self::get(['cmd' => 'getModels', 'year' => $year, 'make' => $make, 'sold_in_us' => 1 ]);
    }

    public static function getModel($model) {
        return self::get(['cmd' => 'getModel', 'model' => $model ]);
    }

    public static function getTrims($year, $make, $model) {
        return self::get(['cmd' => 'getTrims', 'model' => $model, 'make' => $make, 'year' => $year, ]);
    }

    public static function baseUrl() {
        return config('carqueryapi.baseurl');
    }

    public static function get($data = []) {
        try {
            $body = Http::get( self::baseUrl(), $data + ['callback' => '',])->body();
            return self::bodyParser($body);
        } catch (\Throwable $exception) {
            \Log::info('CarQueryAPI get $exception', [$exception->getMessage()]);
            return false;
        }
    }

    public static function bodyParser($data) {
        return json_decode(preg_replace('/^(\()(.+)(\);)/', '$2',$data), true);
    }

}