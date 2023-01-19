<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $role = [
            ['name' => 'Niraj', 'guard_name' => 'web'],
            ['name' => 'Customer', 'guard_name' => 'web'],
        ];

        foreach ($role as $value) {
            Role::create($value);
        }
    }
}