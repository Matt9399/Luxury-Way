<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'http://www.voyageorlando.ca/images/repas5.jpg',
            'title' => 'Repas',
            'description' => 'Un repas gastronomique',
            'price' => 10
        ]);
        $product->save();
    }
}
