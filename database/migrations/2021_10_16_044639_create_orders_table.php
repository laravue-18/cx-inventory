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
            $table->integer('user_id')->unsigned()->nullable();
//            $table->foreign('user_id')->references('id')->on('users')
//                ->onUpdate('cascade')->onDelete('set null');
            $table->string('order_id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('payer_email');
            $table->string('shipping_name');
            $table->string('shipping_address');
//            $table->string('shipping_address_line_2')->nullable();
//            $table->string('shipping_city')->nullable();
//            $table->string('shipping_province')->nullable();
//            $table->string('shipping_postalcode')->nullable();
//            $table->string('shipping_phone')->nullable();
//            $table->string('shipping_name_on_card')->nullable();
//            $table->string('shipping_discount')->default(0);
//            $table->string('shipping_discount_code')->nullable();
//            $table->integer('shipping_subtotal')->nullable();
//            $table->integer('shipping_tax')->nullable();
            $table->integer('amount');
            $table->string('currency');
            $table->string('payment_method')->default('paypal');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();

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
