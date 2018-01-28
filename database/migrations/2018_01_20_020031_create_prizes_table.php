<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id')->comment('所属应用ID');
            $table->string('prize_name')->comment('奖品名称');
            $table->string('prize_img')->default('')->comment('奖品图片');
            $table->text('prize_desc')->nullable()->comment('奖品描述');
            $table->integer('chance')->default(0)->nullable()->comment('中奖概率');
            $table->integer('day_num')->default(0)->nullable()->comment('奖品每日发放限制数量');
            $table->integer('prize_num')->default(0)->nullable()->comment('奖品库存量');
            $table->boolean('is_default')->default(false)->nullable()->comment('是否为默认奖品注：其他奖品抽完后则抽这个奖品可以放谢谢参与');
            $table->boolean('is_special')->default(false)->nullable()->comment('是否为特殊奖品');
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
        Schema::dropIfExists('prizes');
    }
}
