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
        // User::factory(10)->create();

        $users = [
            [
            'name' => 'Эрна Саркисян',
            'email' => 'm@rbru.ru',
            'password' => Hash::make('Passw0rd2'),
            'role' => 'admin',
            ],

            [
                'name' => 'Александра Артюшина',
                'email' => 'a.artyushina@rbru.ru',
                'password' => Hash::make('Passw0rd2'),
                'role' => 'manager',
            ],

            [
                'name' => 'Виктория Зинкина',
                'email' => 'v.zinkina@rbru.ru',
                'password' => Hash::make('Passw0rd2'),
                'role' => 'manager',
            ],

            [
                'name' => 'Марина Дюка',
                'email' => 'm.dyuka@rbru.ru',
                'password' => Hash::make('Passw0rd2'),
                'role' => 'manager',
            ],
        ];

        // Создаем пользователей только если их нет
        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']], // Условие для поиска
                [                                 // Данные для создания
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                    'role' => $userData['role'],
                    'email_verified_at' => now(), // Автоматически подтверждаем email
                ]
            );
        }
    }
}
