<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'System',
                'middle_name' => null,
                'last_name' => 'Admin',
                'email' => 'admin@iskolib.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'student_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Lance Joseph',
                'middle_name' => 'M.',
                'last_name' => 'Dayawon',
                'email' => 'lancejosephmdayawon@iskolarngbayan.pup.edu.ph',
                'password' => Hash::make('12345678'),
                'role' => 'student',
                'student_id' => '2023-04971-MN-0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
