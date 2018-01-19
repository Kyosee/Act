<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->default('')->comment('用户昵称');
            $table->string('avatar')->default('');
            $table->smallInteger('gender')->default(1);
            $table->string('email')->default('')->unique();
            $table->integer('mobile')->default('')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('activated_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
