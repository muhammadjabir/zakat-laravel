<?php

use Illuminate\Database\Seeder;

class AdminmasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $master= new \App\User;
      $master->name="Muhammad Jabir";
      $master->email="jabir@gmail.com";
      $master->password=\Hash::make("123456");
      $master->username="MASTER";
      $master->roles="MASTER";
      $master->save();  
    }
}
