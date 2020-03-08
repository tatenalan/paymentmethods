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
      DB::table('payment_platforms')->truncate();

      PaymentPlatform::create([
        'name' => 'Paypal',
        'image' => 'img/payment-platforms/paypal.jpg',
      ]);

      PaymentPlatform::create([
        'name' => 'Stripe',
        'image' => 'img/payment-platforms/stripe.jpg',
      ]);

      PaymentPlatform::create([
        'name' => 'MercadoPago',
        'image' => 'img/payment-platforms/mercadopago.jpg',
      ]);
    }
}
