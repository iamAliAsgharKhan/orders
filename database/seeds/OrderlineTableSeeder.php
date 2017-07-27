<?php

use Illuminate\Database\Seeder;

class OrderlineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items = App\Item::all();

        foreach( $items as $item )
        {
        	factory('App\Orderlines')->create([
        		'item_id' => $item->id,
        		'item' => $item->product,
        		'quantity' => $item->quantity
        		]);
        };
    }
}
