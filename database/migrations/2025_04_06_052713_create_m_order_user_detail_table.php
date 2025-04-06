<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMOrderUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_order_user_detail', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg_order_user');
            $table->string('t_product_code');
            $table->integer('order_qty');
            $table->bigInteger('order_price');
            $table->string('order_status');
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
        Schema::dropIfExists('m_order_user_detail');
    }
}
