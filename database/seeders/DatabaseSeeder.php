<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Administrator',
        //     'email' => 'admin@admin.com',
        //     'password'=>Hash::make('password')
        // ]);

        Company::create([
            'name' => 'TIP',
            'email' => 'tip@edu.ph',
            'website' => 'https://tip.edu.ph/'
        ]);

        Company::create([
            'name' => 'TIP1',
            'email' => 'tip@edu.ph',
            'website' => 'https://tip.edu.ph/'
        ]);
    }
}
