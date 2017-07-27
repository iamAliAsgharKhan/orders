<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->timestamps();
        });

        Schema::create('item_supplier', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->primary(['item_id', 'supplier_id']);

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('supplier_id')->references('id')->on('suppliers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_supplier');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('suppliers');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
