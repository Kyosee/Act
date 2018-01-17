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
            $table->integer('wechat_id');
            $table->string('openid');
            $table->string('nickname');
            $table->string('avatar')->default('');
            $table->smallInteger('gender')->default(1);
            $table->string('language')->default('');
            $table->string('city')->default('');
            $table->string('province')->default('');
            $table->string('country')->default('');
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
