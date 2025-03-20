<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTableMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_table_master', function (Blueprint $table) {
            $table->id('id_table');
            $table->string('m_table_master_code')->unique();
            $table->string('m_table_master_name');
            $table->string('m_table_master_cat');
            $table->string('m_table_master_type');
            $table->string('m_table_master_status');
            $table->text('m_table_master_desc');
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
        Schema::dropIfExists('m_table_master');
    }
}
