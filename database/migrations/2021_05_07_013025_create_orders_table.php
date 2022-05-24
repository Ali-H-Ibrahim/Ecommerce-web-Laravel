<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();;
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('city');
            $table->string('address');
            $table->string('phone_number');
            $table->string('zip_code')->nullable();
//            $table->timestamps('ship_date');
//            $table->timestamps('required_date');
//            $table->timestamps('payment_date');
            //$table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->decimal('grand_total', 20, 6);
            $table->boolean('payment_status')->default(1);
           // $table->enum('payment_method', ['cash', 'visa', 'master'])->default('cash');
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
        Schema::dropIfExists('orders');
    }
}
