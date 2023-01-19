<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        $data =  [
            'fullname' => 'Niraj',
            'email' => 'admin@gmail.com',
            'phone' => '9876548965',
            'about' => 'Demo',
            'c_password' => Hash::make('12345678'),
            'password' => Hash::make('12345678'),
            'user_type'=>'Admin',
        ];
        User::create($data);
    }
}