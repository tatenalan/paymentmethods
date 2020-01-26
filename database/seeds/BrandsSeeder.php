<?php

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('brands')->insert(
        [
          "name" => "Adidas",
        ]
      );
      DB::table('brands')->insert(
        [
          "name" => "Nike",
        ]
      );
      DB::table('brands')->insert(
        [
          "name" => "New Balance",
        ]
      );
      DB::table('brands')->insert(
        [
          "name" => "Reebok",
        ]
      );
      DB::table('brands')->insert(
        [
          "name" => "Fila",
        ]
      );
      DB::table('brands')->insert(
        [
          "name" => "Crocs",
        ]
      );
      DB::table('brands')->insert(
        [
          "name" => "Havaianas",
        ]
      );
    }
}
