<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->nullable();
            $table->integer('item_list_id')->nullable();
            $table->integer('item_category_id')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->integer('item_unit_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Items');
    }
}
