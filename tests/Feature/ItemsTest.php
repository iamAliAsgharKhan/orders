<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemsTest extends TestCase
{
	use DatabaseMigrations;
	
    /** @test */
    public function a_user_can_browse_iventory_items()
    {
    	$item = factory('App\Item')->create();

    	$this->get('/items')
    		->assertSee($item->product);
    }

    /** @test */
    public function a_user_can_add_items()
    {
    	$item = factory('App\Item')->make();

    	$this->post('/items', $item->toArray());

    	$this->get('/items/'.$item->id)
    		->assertSee($item->product);	
    }

    /** @test */
    // public function a_user_can_edit_items()
    // {
    //     $item = factory('App\Item')->create();

    //     $item->update(['Product' => 'Ray Gun']);

    //     $this->put('/items/'. $item->id .'/update', $item->toArray());

    //     $this->get('/items/'. $item->id)
    //         ->assertSee('Ray Gun');   
    // }

    /** @test */
    public function a_user_can_delete_items()
    {
        $item = factory('App\Item')->create();

        $this->delete('/items/'. $item->id);
        
        $this->assertDatabaseMissing('items', ['id' => $item->id]);
    }
}
