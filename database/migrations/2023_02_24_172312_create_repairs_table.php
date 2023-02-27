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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resident_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->string('name');
            $table->string('content');
            $table->string('status');
            $table->date('date');

            $table->foreign('resident_id')
                ->references('id')->on('residents')
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
        Schema::dropIfExists('repairs');
    }
};
