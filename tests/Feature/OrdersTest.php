<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrdersTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_orders()
    {
    	$order = factory('App\Order')->create();

    	$this->get('/orders')
    		->assertSee($order->order_date);
    }

    /** @test */
    public function a_user_can_add_orders()
    {
    	$order = factory('App\Order')->make();

    	$this->post('/orders', $order->toArray());

    	$this->get('/orders')
    		->assertSee($order->order_date);
    }

    /** @test */
    public function a_user_can_delete_orders()
    {
    	$order = factory('App\Order')->create();

    	$this->delete('/orders/' .$order->id. '/delete');

    	$this->assertDatabaseMissing('orders', [ 'id' => $order->id ]);
    }
}
