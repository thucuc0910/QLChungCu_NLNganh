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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apartment_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('CMND');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('address');
            $table->string('status');
            $table->timestamps();

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
        Schema::dropIfExists('residents');
    }
};
