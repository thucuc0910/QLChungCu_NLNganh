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
        //  `xaid` varchar(5) CHARACTER SET utf8 NOT NULL,
        //   `name` varchar(100) CHARACTER SET utf8 NOT NULL,
        //   `type` varchar(30) CHARACTER SET utf8 NOT NULL,
        //   `maqh` varchar(5) CHARACTER SET utf8 NOT NULL,
        //   PRIMARY KEY (`xaid`)
        Schema::create('wards', function (Blueprint $table) {
            $table->integer('xaid');
            $table->string('name');
            $table->string('type');
            $table->integer('maqh');
            $table->primary(['xaid']);
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
