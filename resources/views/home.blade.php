@php
dd($currencies);
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make a payment</div>

                <div class="card-body">
                  <form class="" action="#" method="post" id="paymentForm">
                    @csrf
                    <div class="row">
                      <div class="col-auto">
                        <label for="">Cuanto queres pagar?</label>
                        <input type="number" name="valor" min="5" step="0.01" class="form-control" value="{{ mt_rand(500, 100000) / 100 }}" required autofocus>
                        <small class="fomr-text text-muted">Utilicen valores decimales separados por "."</small>
                      </div>
                      <div class="col-auto">
                        <label>Currency</label>
                        <select class="custom-select" name="currency" required>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->iso }}">
                                    {{ strtoupper($currency->iso) }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" id="bayButton" class="btn btn-primary btn-lg">Pagar</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
