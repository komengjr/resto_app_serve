<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_product', function (Blueprint $table) {
            $table->id('id_t_product');
            $table->string('t_product_code')->unique();
            $table->string('t_category_code');
            $table->string('t_product_name');
            $table->string('t_product_type');
            $table->string('t_product_status');
            $table->text('t_product_desc');
            $table->text('t_product_file');
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
        Schema::dropIfExists('t_product');
    }
}
