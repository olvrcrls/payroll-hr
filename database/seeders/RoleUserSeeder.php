<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::whereEmail('dev.olivercarlos@gmail.com')->first();
        $superAdminRole = Role::query()->select('id')->whereName(Role::SUPER_ADMIN)->first();
        $superAdminUser->roles()->syncWithoutDetaching([$superAdminRole->id]);
    }
}
