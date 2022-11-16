<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventorysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Inventorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_tot')->nullable();
            $table->integer('item_lef')->nullable();
            $table->integer('item_lis')->nullable();
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
        Schema::drop('Inventorys');
    }
}
