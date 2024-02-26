<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'logo' => $faker->imageUrl(100, 100, 'business'), // 100x100 size
                'website' => 'https://' . $faker->domainName(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
