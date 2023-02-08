<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() && !app()->environment('production')) {
            User::with('roles')->forceDelete();
        }

        // Insert the admin
        User::insert([
            [
                'first_name' => 'Oliver', 'last_name' => 'Carlos',
                'email' => 'dev.olivercarlos@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'email_verified_at' => now(),
            ]
        ]);

        User::insert(
            User::factory()->count(1000)->make()->makeVisible('password')->toArray()
        );

        $this->command->info("Inserted: " . User::count() . " users in the DB");
    }
}
