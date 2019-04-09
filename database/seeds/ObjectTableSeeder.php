<?php

use Illuminate\Database\Seeder;

class ObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('objects')->insert([
      'name' => str_random(10),
      'name_rus' => str_random(10),
      'address' => str_random(10),
    ]);
    }
}
