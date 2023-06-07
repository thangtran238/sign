<?php

namespace Database\Seeders;

use App\Models\TikiProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();


        for ( $i = 0; $i< 20 ; $i++) {
            TikiProduct::create([
                'title' => $faker->sentence(),
                'rate' => $faker->numberBetween(1,5),
                'sold' => $faker->numberBetween(400,900),
                'unit_price' => $faker->numberBetween(80000,120000),
                'promo_price' => $faker->numberBetween(60000,79000),
                'image' => $faker->imageUrl(),
                'des' => $faker->text()
            ]);
        }
    }
}
