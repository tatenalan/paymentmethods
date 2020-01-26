<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert(
        [
          "name" => "Deportivas",
        ]
      );

      DB::table('categories')->insert(
        [
          "name" => "Urbanas",
        ]
      );

      DB::table('categories')->insert(
        [
          "name" => "Ojotas",
        ]
      );
      
      DB::table('categories')->insert(
        [
          "name" => "Botas",
        ]
      );
    }
}
