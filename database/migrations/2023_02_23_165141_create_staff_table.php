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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('CMND')->unique();
            $table->integer('gender');
            $table->date('birthday');
            $table->bigInteger('position_id')->unsigned();
            $table->integer('city');
            $table->integer('district');
            $table->integer('ward');


            $table->foreign('position_id')
                ->references('id')->on('positions')
                ->onDelete('cascade');

            $table->foreign('city')
                ->references('matp')->on('cities')
                ->onDelete('cascade');

            $table->foreign('district')
                ->references('maqh')->on('districts')
                ->onDelete('cascade');

            $table->foreign('ward')
                ->references('xaid')->on('wards')
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
        Schema::dropIfExists('staff');
    }
};
