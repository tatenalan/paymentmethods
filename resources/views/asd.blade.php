{{-- En caso de que no haya stock en ningun talle del producto --}}

{{-- Creo una variable que me va a servir como contador --}}
@php
$cantidadstock=0;
@endphp

{{-- Por cada stock del producto me fijo si la cantidad es mayor a 0 y en tal caso le sumo 1 a la variable creada --}}
@foreach ($product->stocks as $stock)
  @if ($stock->quantity > 0)
    @php
    $cantidadstock=$cantidadstock+1
    @endphp
  @endif
@endforeach
{{-- @php
dd($product->stocks);
@endphp --}}
{{-- Si al final del foreach la cantidad de stock me da menor a 1 muestro que no hay stock y creo el boton solicitar stock, si me da  --}}
@if ($cantidadstock == 0)
  <p>No hay stock de este producto</p>
  <div class="solicitar-stock">
    <a href="https://api.whatsapp.com/send?phone=5491156000588&text=Hola, estoy contactandolos desde IL Nato Tienda Online para solicitarles stock del producto {{$product->model}}" target="_blank" class="solicitar-stock" data-toggle="tooltip" data-placement="right" data-original-title="Consulta por Whatsapp!">Click aqui para solicitar Stock por Whatsapp <ion-icon class="solicitar-stock" name="logo-whatsapp"></ion-icon></a></li>
  </div>
@else
  <a class="ordenar" href="/">Ordenar!  <ion-icon name="cart"></ion-icon></a>
@endif
