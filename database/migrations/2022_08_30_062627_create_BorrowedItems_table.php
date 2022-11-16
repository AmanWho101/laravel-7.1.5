<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBorrowedItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BorrowedItems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_b')->nullable();
            $table->string('item_b')->nullable();
            $table->string('room_b')->nullable();
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
        Schema::drop('BorrowedItems');
    }
}
