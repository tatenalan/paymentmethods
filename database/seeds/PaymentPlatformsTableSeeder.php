<?php

use App\PaymentPlatform; // Agregar esto!!
use Illuminate\Database\Seeder;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PaymentPlatform::create([
        'name' => 'Paypal',
        'image' => 'img/payment-payment-platforms/paypal.jpg',
      ]);

      PaymentPlatform::create([
        'name' => 'Stripe',
        'image' => 'img/payment-payment-platforms/stripe.jpg',
      ]); 
    }
}
