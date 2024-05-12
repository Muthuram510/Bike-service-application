<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // to seed users to check functionality and assign each as customer
        $users = User::factory()->count(20)->create();
        foreach ($users as $user) {
            $user->assignRole(['Customer']);
        }
    }
}
