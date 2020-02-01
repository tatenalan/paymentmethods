<?php

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{

     public function run()
     {
       $colores = [
         'Deportivas',
         'Blanco',
         'Negro',
         'Rojo',
         'Azul',
         'Amarillo',
         'Naranja',
         'Violeta',
         'Marron',
         'Gris',
         'Rosa',
         'Bordo',
         'Salmon',
         'Beige',
         'Celeste',
         'Verde',
         'Multicolor',
       ];
       foreach ($colores as $color) {
         DB::table('colors')->insert(
           [
             "name" => $color,
           ]
         );
       }
     }
}
