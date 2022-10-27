<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class NhtsaApi {

    public static function getByVIN($vin) {
        return self::get("/vehicles/decodevinvalues/{$vin}");
    }

    public static function baseUrl($url) {
        return config('nhtsa_api.baseurl') . $url;
    }
    // https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvalues/5UXWX7C5*BA?format=json&modelyear=2021
    public static function get($url, $data = []) {
        try {
            return Http::get( self::baseUrl($url), $data + ['format' => 'json',])->json();
        } catch (\Throwable $exception) {
            \Log::info('NhtsaApi get $exception', [$exception->getMessage()]);
            return false;
        }
    }

}