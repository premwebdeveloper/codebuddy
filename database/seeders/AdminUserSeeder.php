<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // To create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ])->assignRole('admin');

        // To create normal user
        User::create([
            'name' => 'Prem',
            'email' => 'premsaini9602@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole(2);
    }
}
