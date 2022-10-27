<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CarsxeApi {

    public static function getHistoryByVin($vin) {
        return self::get("/history",['vin' => $vin ]);
    }

    public static function getSpecsByVin($vin) {
        return self::get("/specs",['vin' => $vin ]);
    }

    public static function baseUrl($url) {
        return config('carsxeapi.baseurl') . $url;
    }

    public static function get($url, $data = []) {
        try {
            return Http::get( self::baseUrl($url), $data + ['key' => config('carsxeapi.key'),])->json();
        } catch (\Throwable $exception) {
            \Log::info('NhtsaApi get $exception', [$exception->getMessage()]);
            return false;
        }
    }

}