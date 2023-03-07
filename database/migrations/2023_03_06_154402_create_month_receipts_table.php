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
        Schema::create('month_receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('month_id')->unsigned();
            $table->bigInteger('year_id')->unsigned();

            $table->foreign('month_id')
                ->references('id')->on('months')
                ->onDelete('cascade');

            $table->foreign('year_id')
                ->references('id')->on('years')
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
        Schema::dropIfExists('month_receipts');
    }
};
