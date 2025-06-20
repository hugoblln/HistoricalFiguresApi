<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

       $admin = User::create([
         'name' => 'admin',
         'email' => 'admin@admin.fr',
         'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

    }
}
