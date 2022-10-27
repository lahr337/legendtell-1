<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class AddShopSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::truncate();
        $data = [
            [
                'name'          =>      'Express Auto Salon',
                'location'      =>      '2441 Florida Ave, Kenner, La 70062',
                'email'         =>      'info@mysite.com',
                'telephone'     =>      '15042874421',
                'picture'       =>      '0.jpg',
                'description'   =>      'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis orci sed eu laoreet mollis. Facilisis mi nam consectetur sit aliquet velit etiam fermentum. Quis massa enim vitae quis. Sem tristique eu, felis elementum sit.',
                'services'      =>      ['Mclaren Specialist','Appraisal Certified','Paint Protection Film','Auto Detailing'],
            ],
            [
                'name'          =>      'Lindsey Automotive',
                'location'      =>      '2501 Delaware Ave, Kenner, LA 70062',
                'email'         =>      'info@mysite.com',
                'telephone'     =>      '15042874421',
                'picture'       =>      '1.jpg',
                'description'   =>      'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis orci sed eu laoreet mollis. Facilisis mi nam consectetur sit aliquet velit etiam fermentum. Quis massa enim vitae quis. Sem tristique eu, felis elementum sit.',
                'services'      =>      ['Mclaren Specialist','Appraisal Certified','Paint Protection Film','Auto Detailing'],
            ],
            [
                'name'          =>      'Metropolitan Detail',
                'location'      =>      '2441 Florida Ave, Kenner, La 70062',
                'email'         =>      'info@mysite.com',
                'telephone'     =>      '15042874421',
                'picture'       =>      '2.jpg',
                'description'   =>      'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis orci sed eu laoreet mollis. Facilisis mi nam consectetur sit aliquet velit etiam fermentum. Quis massa enim vitae quis. Sem tristique eu, felis elementum sit.',
                'services'      =>      ['Mclaren Specialist','Appraisal Certified','Paint Protection Film','Auto Detailing'],
            ],
            [
                'name'          =>      'Express Auto Salon',
                'location'      =>      '2441 Florida Ave, Kenner, La 70062',
                'email'         =>      'info@mysite.com',
                'telephone'     =>      '15042874421',
                'picture'       =>      '3.jpg',
                'description'   =>      'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis orci sed eu laoreet mollis. Facilisis mi nam consectetur sit aliquet velit etiam fermentum. Quis massa enim vitae quis. Sem tristique eu, felis elementum sit.',
                'services'      =>      ['Mclaren Specialist','Appraisal Certified','Paint Protection Film','Auto Detailing'],
            ],
        ];
        foreach($data as $each) Shop::create($each);
    }
}
