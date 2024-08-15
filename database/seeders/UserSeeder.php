<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'test',
            'last_name' => 'admin',
            'email' => 'admin@test.com',
            'phone' => '1234567890',
            'role' => 'manager',
            'password' => Hash::make('T7v$L@9e^rW!'),
        ]);


        User::create([
            'first_name' => 'test',
            'last_name' => 'employee',
            'email' => 'empolyee@test.com',
            'phone' => '1123456789',
            'role' => 'employee',
            'manager_id' => 1,
            'password' => Hash::make('T7v$L@9e^rW!'),
        ]);
    }
}
