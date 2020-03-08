<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function pay(Request $request)
  {
    $rules = [
      'value' => ['required', 'numeric', 'min:5'],
      'currency' => ['required', 'exists:currencies,iso'], //Tiene que existir en la tabla currencies en el atributo iso
      'payment_platform' => ['required', 'exists:payment_platforms,id'],
    ];

    $request->validate($rules);

    return $request->all();
  }

  public function approval()
  {

  }

  public function canceled()
  {
    return redirect()->route('home')->withErrors('Cancelaste el pago');
  }
}
