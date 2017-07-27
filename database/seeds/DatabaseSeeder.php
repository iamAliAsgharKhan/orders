<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$this->call(SuppliersTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
    	$this->call(OrderlineTableSeeder::class);
    }
}