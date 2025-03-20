<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTableDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_table_detail', function (Blueprint $table) {
            $table->id('id_table_detail');
            $table->string('m_table_detail_code')->unique();
            $table->string('m_table_master_code');
            $table->string('m_table_detail_name');
            $table->string('m_table_detail_type');
            $table->string('m_table_detail_status');
            $table->text('m_table_detail_desc');
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
        Schema::dropIfExists('m_table_detail');
    }
}
