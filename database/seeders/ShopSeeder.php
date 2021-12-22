<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
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
            $shop = Shop::create([
                'name' => $faker->company,
                'description' => $faker->text,
                'status' => 1,
            ]);
        }
    }
}
