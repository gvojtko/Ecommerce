<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product');
            $table->string('tag_product');
            $table->integer('catebory_id');
            $table->integer('color_id');
            $table->integer('size_id');        
            $table->float('discount');        
            $table->string('description');        
            $table->string('cart_description');        
            $table->string('slug');        
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
        //
    }
}
