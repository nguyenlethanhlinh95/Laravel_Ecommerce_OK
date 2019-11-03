<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name');
            $table->string('pro_code');
            $table->string('pro_price');
            $table->string('image')->nullable();
            $table->string('spl_price')->nullable()->default('0');
            //$table->integer('id_category');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->boolean('new')->default('0');
            $table->boolean('feaure')->default('0');
            $table->boolean('quick')->default('0');
            //$table->integer('id_tag');
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
        Schema::dropIfExists('products');
    }
}
