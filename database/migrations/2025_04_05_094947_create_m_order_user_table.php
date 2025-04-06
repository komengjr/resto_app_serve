<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMOrderUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_order_user', function (Blueprint $table) {
            $table->id('id_m_order_user');
            $table->string('no_reg_order_user')->unique();
            $table->string('m_order_user');
            $table->string('m_order_type');
            $table->string('m_order_date');
            $table->integer('m_order_status');
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
        Schema::dropIfExists('m_order_user');
    }
}
