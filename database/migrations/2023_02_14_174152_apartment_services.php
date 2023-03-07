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
        Schema::create('apartment_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apartment_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            

            $table->foreign('apartment_id')
            ->references('id')->on('apartments')
            ->onDelete('cascade');

            $table->foreign('service_id')
            ->references('id')->on('services')
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
        Schema::dropIfExists('department_services');
    }
};
