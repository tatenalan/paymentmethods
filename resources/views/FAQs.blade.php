@extends('plantilla')
@section('titulo')
IL Nato Home
@endsection
@section('css')
FAQs
@endsection('css')
@section('main')

  <div class="FAQs">

    <h2>Preguntas Frecuentes</h2>

    <div style="visibility: hidden; position: absolute; width: 0px; height: 0px;">
      <svg xmlns="http://www.w3.org/2000/svg">
        <symbol viewBox="0 0 24 24" id="expand-more">
          <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/>
        </symbol>
        <symbol viewBox="0 0 24 24" id="close">
          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/>
        </symbol>
      </svg>
    </div>

    <details open>
      <summary>
        Cual es mi talle?
        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
      </summary>
      <p> Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does. Totally. Totally does.</p>
    </details>

    <details>

      <summary>
        Puedo solicitar stock?
        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
      </summary>
      <p>Of course you can, we won't stop you.</p>
    </details>

    <details>
      <summary>
        Politica de cambios
        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
      </summary>
      <p>Only your imagination my friend. Go forth!</p>
    </details>

    <details>
      <summary>
        Garantia
        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
      </summary>
      <p>Only your imagination my friend. Go forth!</p>
    </details>

    <details>
      <summary>
        Promociones
        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
      </summary>
      <p>Only your imagination my friend. Go forth!</p>
    </details>

    <details>
      <summary>
        Horarios de Atencion y showroom
        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
      </summary>
      <p>Only your imagination my friend. Go forth!</p>
    </details>

  </div>

@endsection
