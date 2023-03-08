<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('month_receipt_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->integer('water_bill');
            $table->integer('electricity_bill');
            $table->integer('service_fee');
            $table->integer('rent');
            $table->integer('total');
            $table->integer('status');

            $table->foreign('month_receipt_id')
                ->references('id')->on('month_receipts')
                ->onDelete('cascade');

            $table->foreign('apartment_id')
                ->references('id')->on('apartments')
                ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
};
