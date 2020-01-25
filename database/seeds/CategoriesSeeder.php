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
          "name" => "deportivas",
        ]
      );

      DB::table('categories')->insert(
        [
          "name" => "urbanas",
        ]
      );

      DB::table('categories')->insert(
        [
          "name" => "ojotas",
        ]
      );
      DB::table('categories')->insert(
        [
          "name" => "botas",
        ]
      );
    }
}
