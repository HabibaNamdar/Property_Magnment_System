<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
  {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Landlord User',
            'email' => 'landlord@example.com',
            'password' => Hash::make('password'),
            'role' => 'landlord',
        ]);

        User::create([
            'name' => 'Tenant User',
            'email' => 'tenant@example.com',
            'password' => Hash::make('password'),
            'role' => 'tenant',
        ]);
    }
}
