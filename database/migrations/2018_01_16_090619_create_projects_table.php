<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('应用所属用户ID');
            $table->integer('wechat_id')->comment('应用所述公众号ID');
            $table->string('project_name')->comment('应用名称');
            $table->integer('project_template_id')->default(1)->comment('应用所属模板ID');
            $table->string('share_img')->default('')->comment('应用微信分享图片');
            $table->string('share_title')->default('')->comment('应用微信分享标题');
            $table->string('share_desc')->default('')->comment('应用微信分享描述');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
