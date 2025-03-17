<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_main', function (Blueprint $table) {
            $table->id();
            $table->string('userid')->index();
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('email');
            $table->string('number_handphone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('access_code');
            $table->boolean('access_status');
            $table->rememberToken();
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
        Schema::dropIfExists('users_main');
    }
}
