<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attributes_id')->unsigned();
            $table->string('name');

            $table->foreign('attributes_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
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
        Schema::dropIfExists('items_attributes');
    }
}
