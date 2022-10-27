<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CountrySql = base_path('sql/data_country.sql');
        $Country = Country::count();
        if (($Country == 0) && file_exists($CountrySql)) {
            $sql = file_get_contents($CountrySql);
            DB::unprepared($sql);
        }
    }
}
