<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SuppliersTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_suppliers()
    {
    	$supplier = factory('App\Supplier')->create();

    	$this->get('/suppliers')
    		->assertSee($supplier->name);
    }

    /** @test */
    public function a_user_can_add_suppliers()
    {
    	$supplier  = factory('App\Supplier')->make();

    	$this->post('/suppliers', $supplier->toArray());

    	$this->get('/suppliers/' .$supplier->id)
    		->assertSee($supplier->name);
    }

	/** @test */
    // public function a_user_can_edit_suppliers()
    // {
    //     $supplier = factory('App\Supplier')->create();

    //     $this->put('/suppliers/'. $supplier->id, ['name' => 'Ray Gun Inc.']);

    //     $this->get('/suppliers/'. $supplier->id)
    //         ->assertSee('Ray Gun');   
    // }

    /** @test */
    public function a_user_can_delete_suppliers()
    {
        $supplier = factory('App\Supplier')->create();

        $this->delete('/suppliers/'. $supplier->id);
        
        $this->assertDatabaseMissing('suppliers', ['id' => $supplier->id]);
    }
}
