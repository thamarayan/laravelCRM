<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayOrdersModelTable extends Migration
{
    public function up()
    {
        Schema::create('pay_orders_model', function (Blueprint $table) {
            $table->increments('orderId');
            $table->string('fullName', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->char('currency', 3)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('street1', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('postal_code', 255)->nullable();
            $table->string('invoiceNumber', 100)->nullable();
            $table->text('comments')->nullable();
            $table->integer('orderStatus')->nullable()->default(1000);
            $table->text('orderMessage')->nullable();
            $table->string('transactionID', 255)->nullable();
            $table->dateTime('orderDate')->nullable();
            $table->dateTime('orderPaid')->nullable();
            $table->string('paymentMethod', 255)->nullable();
            $table->text('report')->nullable();
            $table->decimal('interchange', 6, 2)->nullable();
            $table->decimal('fee_scheme_fee', 6, 2)->nullable();
            $table->decimal('service_fee', 6, 2)->nullable();
            $table->string('card_type', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('descriptor', 255)->nullable();
            $table->string('mid', 255)->nullable();
            $table->string('merchantName', 255)->nullable();
            $table->dateTime('chargeback_date')->nullable();
            $table->dateTime('decline_date')->nullable();
            $table->string('cardnum', 255)->nullable();
            $table->boolean('included_in_report')->default(0);
            $table->integer('meps_profile_id')->default(0);
            $table->text('chargeback_callbackurl')->nullable();
            $table->text('fraud_callbackurl')->nullable();
            $table->text('refund_callbackurl')->nullable();
            $table->text('status_url')->nullable();
            $table->text('redirect_url')->nullable();
            $table->text('chargeback_callback')->nullable();
            $table->text('fraud_callback')->nullable();
            $table->text('refund_callback')->nullable();
            $table->integer('banks_mid')->nullable();
            $table->text('return_url')->nullable();
            $table->integer('mode')->default(0);
            $table->decimal('refund_amount', 10, 2)->nullable();
            $table->dateTime('psp_time')->nullable();
            $table->string('ARN_Number', 255)->nullable();
            $table->char('api_test', 1)->nullable();
            $table->decimal('partial_amount', 10, 2)->nullable();
            $table->boolean('paid_by_psp')->default(0);
            $table->string('xref', 255)->nullable();
            $table->string('refund_id', 255)->nullable();
            $table->decimal('partial_refund', 10, 2)->nullable();
            $table->integer('callback_send')->default(0);
            $table->integer('callback_receive')->default(0);
            $table->boolean('success_reported')->default(0);
            $table->char('3ds_started', 1)->default('N');
            $table->string('bank_status', 255)->nullable();
            $table->string('ip_address', 50)->nullable();
            $table->string('status_history', 255)->nullable();
            $table->string('auth_code', 255)->nullable();
            $table->string('akur_status', 255)->nullable();
            $table->string('gatewayID', 255)->nullable();
            $table->string('extra_gatewayID', 255)->nullable();
            $table->string('chargeID', 255)->nullable();
            $table->dateTime('akuratecoDate')->nullable();
            $table->dateTime('StripeDate')->nullable();
            $table->date('settlement_date')->nullable();
            $table->string('settlement_number', 255)->nullable();
            $table->dateTime('psp_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pay_orders_model');
    }
}
