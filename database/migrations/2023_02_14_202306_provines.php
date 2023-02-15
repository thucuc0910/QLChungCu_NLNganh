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
        //`maqh` varchar(5) CHARACTER SET utf8 NOT NULL,
        //   `name` varchar(100) CHARACTER SET utf8 NOT NULL,
        //   `type` varchar(30) CHARACTER SET utf8 NOT NULL,
        //   `matp` varchar(5) CHARACTER SET utf8 NOT NULL,
        Schema::create('provines', function (Blueprint $table) {
            $table->integer('maqh');
            $table->string('name');
            $table->string('type');
            $table->integer('matp');
            $table->primary(['maqh']);
            // $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
