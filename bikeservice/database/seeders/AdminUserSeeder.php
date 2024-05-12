<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to seed the admin role for John
        $adminUser = User::firstOrCreate([
            'email' => 'admin@510.com'
        ], [
            'name' => 'John',
            'password' => Hash::make('password123'),
        ]);

        $adminUser->assignRole(['Admin']);
    }
}
