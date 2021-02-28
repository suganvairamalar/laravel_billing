<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->date('order_date');
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->text('order_product_category_name');
            $table->text('order_product_code');
            $table->text('order_product_name');
            $table->text('order_quantity');
            $table->text('order_product_price');
            $table->text('order_product_amount');
            $table->text('order_product_tax');
            $table->text('order_product_discount');
            $table->string('order_sub_total');
            $table->string('order_grand_total');
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
