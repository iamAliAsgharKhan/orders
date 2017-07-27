<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = App\Order::all();

        foreach( $orders as $order)
        {
        	factory('App\Item', 2)->create();
        };
    }
}
