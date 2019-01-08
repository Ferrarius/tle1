<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 12; $i++) {
        Product::create([
          'name' => 'Zonnepanelen 100x'.$i*40,
          'price' => $i*40,
          'link' => 'https://google.com',
          'user_id' => rand(1,3)
        ]);
      }

      for ($i=0; $i < 3; $i++) {
        Product::create([
          'name' => 'Vloerisolatie '.$i*40,
          'price' => 2000 + $i*80,
          'link' => 'https://google.com',
          'user_id' => rand(1,3)
        ]);
      }

      for ($i=0; $i < 1; $i++) {
        Product::create([
          'name' => 'Spouwmuur',
          'price' => 3000,
          'link' => 'https://google.com',
          'user_id' => rand(1,3)
        ]);
      }

      Product::create([
        'name' => 'Warmtepomp voor in huis',
        'price' => 2499,
        'link' => 'https://google.com',
        'user_id' => rand(1,3)
      ]);

      Product::create([
        'name' => 'Warmtepomp, bespaar geld',
        'price' => 2499,
        'link' => 'https://google.com',
        'user_id' => rand(1,3)
      ]);

      Product::create([
        'name' => 'Dubbelglas',
        'price' => 200,
        'link' => 'https://google.com',
        'user_id' => rand(1,3)
      ]);

    }
}
