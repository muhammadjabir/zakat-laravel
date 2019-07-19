<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustahikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mustahiks', function (Blueprint $table) {
            $table->Increments('id');
            $table->char('nama_mustahik',40);
            $table->text('alamat',200);
            $table->string('no_hp',13);
            $table->enum('kelamin',['PRIA','WANITA'])->nullable();
            $table->string('foto')->nullable();
            $table->integer('tipe_id')->unsigned();
             $table->foreign('tipe_id')->references('id')->on('tipemustahiks')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mustahik');
    }
}
