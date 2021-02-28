<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNullableColumnsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_product_tax')->nullable()->change();
            $table->string('order_product_discount')->nullable()->change();
            $table->string('order_sub_total')->nullable()->change();
            $table->string('order_grand_total')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_product_tax')->nullable(false)->change();
            $table->string('order_product_discount')->nullable(false)->change();
            $table->string('order_sub_total')->nullable(false)->change();
            $table->string('order_grand_total')->nullable(false)->change();
        });
    }
}
