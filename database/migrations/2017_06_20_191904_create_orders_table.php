<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier');
            $table->integer('supplier_id');
            $table->date('order_date');
            $table->timestamps();


        });

        Schema::create('orderlines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('item');
            $table->integer('quantity');
            $table->integer('item_cost');
            $table->integer('unit_cost');
            $table->integer('total_cost');
            $table->string('reorder');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderlines');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('orders');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
