<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersRefundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_refund', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('订单所属用户UID');
            $table->integer('project_id')->comment('所属应用ID');
            $table->string('openid')->default('')->nullable()->comment('用户openid');
            $table->string('out_refund_no')->default('')->nullable()->comment('商户退款订单号');
            $table->string('out_trade_no')->default('')->nullable()->comment('商户订单号');
            $table->string('transaction_id')->default('')->nullable()->comment('微信订单号');
            $table->string('refund_id')->default('')->nullable()->comment('微信退款订单号');
            $table->integer('total_fee')->comment('订单金额');
            $table->integer('refund_fee')->comment('退款金额');
            $table->integer('sub_refund_at')->nullable()->comment('发起退款申请时间');
            $table->integer('refund_at')->nullable()->comment('退款时间');
            $table->integer('step')->nullable()->comment('退款状态');
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
        Schema::dropIfExists('orders_refund');
    }
}
