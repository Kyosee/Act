<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->default(1)->comment('公众号所属用户UID');
            $table->string('wechat_name')->comment('公众号名称');
            $table->string('app_id')->comment('公众号APPID');
            $table->string('secret')->comment('公众号APPsecret');
            $table->string('token')->default('');
            $table->string('aes_key')->default('');
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
        Schema::dropIfExists('wechats');
    }
}
