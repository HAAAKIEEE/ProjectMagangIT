<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            InternationalCompaniesSeeder::class,
            DomesticCompaniesSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'tset@example.com',
            'password'=> bcrypt('12345678'),
        ]);
    }
}