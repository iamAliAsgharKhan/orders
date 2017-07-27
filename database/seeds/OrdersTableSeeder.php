<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$suppliers = App\Supplier::all();
    	
    	foreach( $suppliers as $supplier)
    	{
    		factory('App\Order', 2)->create([
    			'supplier_id' => $supplier->id,
    			'supplier' => $supplier->name
    			]);
    	};
    }
}
