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
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('month_water_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->integer('old');
            $table->integer('new');

            $table->foreign('month_water_id')
                ->references('id')->on('month_waters')
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
        Schema::dropIfExists('waters');
    }
};
