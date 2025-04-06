<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_history', function (Blueprint $table) {
            $table->id('id_payment_history');
            $table->string('no_payment')->unique();
            $table->string('id_user');
            $table->string('code_gorup');
            $table->string('code');
            $table->string('date_payment_history');
            $table->longText('desc_payment');
            $table->bigInteger('total_payment');
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
        Schema::dropIfExists('payment_history');
    }
}
