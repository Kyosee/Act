<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user_prizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->commont('奖品所属参与用户ID');
            $table->integer('project_id')->commont('应用ID');
            $table->integer('prize_id')->commont('奖品ID');
            $table->boolean('exchange')->default(false)->nullable()->commont('是否兑换过');
            $table->timstamp('exchange_time')->default('')->nullable()->commont('兑换时间');
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
        Schema::dropIfExists('project_user_prizes');
    }
}
