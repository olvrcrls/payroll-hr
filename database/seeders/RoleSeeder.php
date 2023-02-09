<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => Role::ADMIN,
                'created_at' => now()
            ],
            [
                'name' => Role::SUPER_ADMIN,
                'created_at' => now()
            ],
            [
                'name' => Role::DEVELOPER,
                'created_at' => now()
            ],
            [
                'name' => Role::SYSTEM,
                'created_at' => now()
            ],
            [
                'name' => Role::EMPLOYEE,
                'created_at' => now()
            ],
            [
                'name' => Role::EMPLOYER,
                'created_at' => now()
            ],
            [
                'name' => Role::SUPERVISOR,
                'created_at' => now()
            ],
            [
                'name' => Role::DIRECTOR,
                'created_at' => now()
            ],
        ]);
    }
}
