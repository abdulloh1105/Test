<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
           ShopSeeder::class,
           ProductSeeder::class
        ]);
    }
}
