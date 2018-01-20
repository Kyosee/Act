<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template_name')->comment('模板名称');
            $table->text('template_desc')->nullable()->comment('模板描述');
            $table->string('template_folder')->comment('模板所属文件夹');
            $table->string('controller_name')->default('')->commnet('模板控制器');
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
        Schema::dropIfExists('project_templates');
    }
}
