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

        User::factory()->create([
            'name' => 'Эрна Саркисян',
            'email' => 'm@rbru.ru',
            'password' => Hash::make('Passw0rd2'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Александра Артюшина',
            'email' => 'a.artyushina@rbru.ru',
            'password' => Hash::make('Passw0rd2'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Виктория Зинкина',
            'email' => 'v.zinkina@rbru.ru',
            'password' => Hash::make('Passw0rd2'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Марина Дюка',
            'email' => 'm.dyuka@rbru.ru',
            'password' => Hash::make('Passw0rd2'),
            'role' => 'manager',
        ]);
    }
}
