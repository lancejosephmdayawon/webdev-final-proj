<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // 1 Admin
            [
                'first_name' => 'System',
                'middle_name' => null,
                'last_name' => 'Administrator',
                'email' => 'admin@iskolib.com',
                'password_hash' => Hash::make('12345678'),
                'role' => 'admin',
                'student_id' => null,
            ],

            // 5 Students
            [
                'first_name' => 'Lance Joseph',
                'middle_name' => 'M.',
                'last_name' => 'Dayawon',
                'email' => 'lancejosephmdayawon@iskolarngbayan.pup.edu.ph',
                'password_hash' => Hash::make('12345678'),
                'role' => 'student',
                'student_id' => '2023-04972-MN-1',
            ],
            [
                'first_name' => 'Maria',
                'middle_name' => 'S.',
                'last_name' => 'Cruz',
                'email' => 'mariascruz@iskolarngbayan.pup.edu.ph',
                'password_hash' => Hash::make('12345678'),
                'role' => 'student',
                'student_id' => '2023-04973-MN-2',
            ],
            [
                'first_name' => 'Juan',
                'middle_name' => 'D.',
                'last_name' => 'Reyes',
                'email' => 'juandreyes@iskolarngbayan.pup.edu.ph',
                'password_hash' => Hash::make('12345678'),
                'role' => 'student',
                'student_id' => '2023-04974-MN-3',
            ],
            [
                'first_name' => 'Carla',
                'middle_name' => 'L.',
                'last_name' => 'Velasco',
                'email' => 'carlalvelasco@iskolarngbayan.pup.edu.ph',
                'password_hash' => Hash::make('12345678'),
                'role' => 'student',
                'student_id' => '2023-04975-MN-4',
            ],
            [
                'first_name' => 'Mark',
                'middle_name' => 'A.',
                'last_name' => 'Delgado',
                'email' => 'markadelgado@iskolarngbayan.pup.edu.ph',
                'password_hash' => Hash::make('12345678'),
                'role' => 'student',
                'student_id' => '2023-04976-MN-5',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
