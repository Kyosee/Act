<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserPartLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user_part_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('应用用户ID');
            $table->integer('project_id')->comment('应用ID');
            $table->text('added')->nullable()->comment('额外保留字段');
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
        Schema::dropIfExists('project_user_part_logs');
    }
}
