<?php

namespace Database\Seeders;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citySql = base_path('sql/cities.sql');
        $citySql1 = base_path('sql/cities1.sql');
        $cities = City::count();
        if (($cities == 0) && file_exists($citySql)) {
            $sql = file_get_contents($citySql);
            $sql1 = file_get_contents($citySql1);
            DB::unprepared($sql);
            DB::unprepared($sql1);
        }
    }
}
