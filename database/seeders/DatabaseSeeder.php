<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'Admin SMKN 7',
            'email' => 'admin@smkn7balam.sch.id',
            'password' => 'admin123',
            'role'  => 'admin',
        ]);
    }
}
