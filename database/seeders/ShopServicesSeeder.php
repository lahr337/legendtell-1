<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShopServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ShopServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ServiceSql = base_path('sql/shop_services.sql');
        $servicedata = ShopServices::count();
        if (($servicedata == 0) && file_exists($ServiceSql)) {
            $sql = file_get_contents($ServiceSql);
            DB::unprepared($sql);
        }
    }
}
