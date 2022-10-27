<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'email'     =>      'test@gmail.com',
            'password'  =>      \Hash::make('test@123'),
            'role'=> 1,
            'approve'=>1
        ]);
    }
}
