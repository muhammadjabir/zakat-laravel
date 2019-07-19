<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembarayanzakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_zakat', function (Blueprint $table) {
            $table->Increments('id');
            $table->float('bayar', 8, 2);
            $table->enum('tipe_zakat',['FITRAH','MAL'])->nullable();
            $table->integer('muzaki_id')->unsigned();
            $table->foreign('muzaki_id')->references('id')->on('muzaki')->onDelete('cascade');
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
        Schema::dropIfExists('pembayaran_zakat');
    }
}
