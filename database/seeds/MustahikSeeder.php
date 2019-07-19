<?php

use Illuminate\Database\Seeder;

class MustahikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baru=new \App\Mustahik;
        $baru->nama_mustahik="Jabir";
        $baru->alamat="teefefe";
        $baru->no_hp="03434";
        $baru->tipe_id=3;
        $baru->save();
    }
}
