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
        Schema::create('water', function (Blueprint $table) {
            $table->bigInteger('month_water_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->integer('old');
            $table->integer('new');
            $table->integer('total');

            // $table->foreign('department_id')
            //     ->references('id')->on('departments')
            //     ->onDelete('cascade');
            // $table->foreign('month_id')
            //     ->references('id')->on('months')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water');
    }
};
