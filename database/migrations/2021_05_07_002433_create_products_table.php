<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->integer('quantity')->default(1);
            $table->text('description')->nullable();
            $table->enum('status',['On','Off'])->default('On');
            $table->string('code')->nullable();
            $table->string('made_in')->nullable();
            $table->integer('sale_counts')->nullable();
            $table->integer('rate_counts')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('SubCategory_id')->constrained('sub_categories')->cascadeOnDelete();
            // $table->integer('SubCategory_id');
            $table->string( 'main_img')->nullable();
            $table->boolean('featured')->default(0);
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
