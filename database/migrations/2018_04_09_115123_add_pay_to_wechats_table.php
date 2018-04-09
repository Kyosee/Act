<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPayToWechatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wechats', function (Blueprint $table) {
            $table->string('pay_key')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('sub_merchant_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wechats', function (Blueprint $table) {
            $table->dropColumn('pay_key');
            $table->dropColumn('merchant_id');
            $table->dropColumn('sub_merchant_id');
        });
    }
}
