<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('plans')->truncate();
        $plandata = [
            [
                'name'              =>  'starter',
                'price'             =>  33.99,
                'allow_reports'     =>  2,
            ],
            [
                'name'              =>  'advanced',
                'price'             =>  59.99,
                'allow_reports'     =>  5,
            ],
            [
                'name'              =>  'professional',
                'price'             =>  89.99,
                'allow_reports'     =>  10,
            ]
        ];

        DB::table('plans')->insert($plandata);
    }
}
