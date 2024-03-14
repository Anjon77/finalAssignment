<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(
            // [
            //     'first_name' => 'owner',
            //     'last_name' => 'owner',
            //     'email' => 'akd.chandana@gmail.com',
            //     'role' => 'owner',
            //     'status' => 'active',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('james123'),
            //     'remember_token' => Str::random(10),
            // ],

            // [
            //     'first_name' => 'company',
            //     'last_name' => 'company',
            //     'email' => 'company@gmail.com',
            //     'company_name' => 'company',
            //     'role' => 'company',
            //     'status' => 'active',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('james123'),
            //     'remember_token' => Str::random(10),
            // ],

            [
                'first_name' => 'candidate',
                'last_name' => 'candidate',
                'email' => 'candidate@gmail.com',
                'role' => 'candidate',
                'status' => 'active',
                'email_verified_at' => now(),
                'password' => Hash::make('james123'),
                'remember_token' => Str::random(10),
            ]
        );

        // User::factory(5)->create();
    }
}
