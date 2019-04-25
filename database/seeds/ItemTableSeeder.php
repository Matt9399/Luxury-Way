<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new \App\Item([
            'name' => 'Ordinateur portable MacBook Air',
            'type' => 'PC',
            'price' => 80,
            'current_stock' => 20,
            'stock' => 20
        ]);
        $item->save();
    }
}
