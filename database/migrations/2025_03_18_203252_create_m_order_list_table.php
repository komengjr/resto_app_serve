<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMOrderListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_order_list', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg_order')->unique();
            $table->string('m_order_user');
            $table->string('m_order_table');
            $table->string('m_order_status');
            $table->string('m_order_no')->nullable();
            $table->string('m_order_date');
            $table->string('userid');
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
        Schema::dropIfExists('m_order_list');
    }
}
