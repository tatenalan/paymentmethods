<?php

use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('marcas')->insert(
        [
          "name" => "nike",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "adidas",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "new balance",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "reebok",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "fila",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "crocs",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "havaianas",
        ]
      );
    }
}
