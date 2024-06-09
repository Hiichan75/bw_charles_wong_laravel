<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'is_admin' => true,  // Assuming you add this column in the migration
        ]);
    }
}
