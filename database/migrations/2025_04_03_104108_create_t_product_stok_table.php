<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTProductStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_product_stok', function (Blueprint $table) {
            $table->id();
            $table->string('t_product_token')->unique();
            $table->string('t_product_code');
            $table->integer('t_stok_qty');
            $table->integer('t_stok_used');
            $table->string('userid');
            $table->string('stok_status');
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
        Schema::dropIfExists('t_product_stok');
    }
}
