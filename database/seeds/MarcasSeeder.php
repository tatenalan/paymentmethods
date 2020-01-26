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
          "name" => "New Balance",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "Reebok",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "Fila",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "Crocs",
        ]
      );
      DB::table('marcas')->insert(
        [
          "name" => "Havaianas",
        ]
      );
    }
}
