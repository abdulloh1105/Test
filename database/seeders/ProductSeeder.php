<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++){
            for ($j = 1; $j <= 10; $j++){
                Products::create([
                    'name' => $faker->name,
                    'price' => $faker->numberBetween(100, 1000),
                    'shop_id' => $i,
                    'description' => $faker->text,
                    'status' => 1,
                ]);
            }

        }
    }
}
