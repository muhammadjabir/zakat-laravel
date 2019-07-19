<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuzakiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muzaki', function (Blueprint $table) {
            $table->Increments('id');
            $table->char('nama_muzaki',40);
            $table->text('alamat',200);
            $table->string('no_hp',13);
            $table->enum('kelamin',['PRIA','WANITA']);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('muzaki');
    }
}
