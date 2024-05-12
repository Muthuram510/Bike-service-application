<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to provide each permission to each roles
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();

        $adminRole = Role::create([
            'name' => 'Admin',
        ]);

        $adminRole->givePermissionTo(['service.write','users.write']);

        $customerRole = Role::create([
            'name' => 'Customer',
        ]);
        $customerRole->givePermissionTo(['service.write']);

        User::where('email', '!=', 'admin@510.com')->chunkById(500, function ($users) {
            foreach ($users as $user) {
                $user->assignRole(['Customer']);
            }
        });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info('Completed roles table seeder');
    }
}
