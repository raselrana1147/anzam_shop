<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('order_id');
           $table->unsignedBigInteger('seller_id');
           $table->unsignedBigInteger('product_id');
      
           $table->integer('product_quantity');
           $table->timestamps();
           // propagration constrain
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
