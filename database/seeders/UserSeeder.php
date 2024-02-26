<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'is_admin' => true,
            'name' => $faker->name(),
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'is_admin' => false,
            'name' => $faker->name(),
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
