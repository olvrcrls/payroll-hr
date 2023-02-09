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
        $adminRole = Role::query()->select('id')->whereName(Role::ADMIN)->first();
        $superAdminUser->roles()->syncWithoutDetaching([$superAdminRole->id, $adminRole->id]);

        $roles = Role::query()->select('id')->whereKeyNot([$superAdminRole->id, $adminRole->id])->get();
        $users = User::query()->select('id')->whereKeyNot($superAdminUser->id)->get();
        $users->each(function ($user) use ($roles) {
            $role = $roles->random();
            $user->roles()->sync([$role->id]);
        });

        $this->command->info("Attached non-admin roles to " . $users->count() . " users.");
    }
}
