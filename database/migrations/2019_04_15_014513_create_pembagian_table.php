<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembagian_zakat', function (Blueprint $table) {
            $table->Increments('id');
            $table->float('beras',2,2);
            $table->float('uang',11,2);
             $table->integer('mustahik_id')->unsigned();
             $table->foreign('mustahik_id')->references('id')->on('mustahik')->onDelete('cascade');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembagian_zakat');
    }
}
