<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->double('price')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->Integer('quantity')->default(1);
            $table->double('discount')->nullable();
            $table->double('total_price')->nullable();
            $table->foreignId('order_id')->constrained("orders");
            $table->foreignId('product_id')->constrained("products");
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
        Schema::dropIfExists('order_products');
    }
}
