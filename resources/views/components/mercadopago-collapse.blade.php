<label class="mt-3">Card details:</label>

<div class="form-group form-row">
    <div class="col-5">
        <input class="form-control" type="text" id="cardNumber" data-checkout="cardNumber" placeholder="Card Number">
    </div>

    <div class="col-2">
        <input class="form-control" type="text" data-checkout="securityCode" placeholder="CVC">
    </div>

    <div class="col-1"></div>

    <div class="col-1">
        <input class="form-control" type="text" data-checkout="cardExpirationMonth" placeholder="MM">
    </div>

    <div class="col-1">
        <input class="form-control" type="text" data-checkout="cardExpirationYear" placeholder="YY">
    </div>
</div>

<div class="form-group form-row">
    <div class="col-5">
        <input class="form-control" type="text" data-checkout="cardholderName" placeholder="Your Name">
    </div>
    <div class="col-5">
        <input class="form-control" type="email" data-checkout="cardholderEmail" placeholder="email@example.com" name="email">
    </div>
</div>

<div class="form-group form-row">
    <div class="col-2">
        <select class="custom-select" data-checkout="docType"></select>
    </div>
    <div class="col-3">
        <input class="form-control" type="text" data-checkout="docNumber" placeholder="Document">
    </div>
</div>

{{-- Indica que la moneda va a ser convertida a pesos argentinos --}}
<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-mute"  role="alert" >Tu pago se hara en pesos argentinos. {{ strtoupper(config('services.mercadopago.base_currency')) }}</small>
    </div>
</div>

{{-- Aqui se muestran los error que puedan existir y va a ser establecido desde el JS --}}
<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-danger" id="paymentErrors" role="alert"></small>
    </div>
</div>

<input type="hidden" id="cardNetwork" name="card_network">
{{-- Input oculto que se usa para el JS --}}

<input type="hidden" id="cardToken" name="card_token">
{{-- Input oculto que se usa para el JS --}}


@push('scripts')

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

<script>
    const mercadoPago = window.Mercadopago;

    mercadoPago.setPublishableKey('{{config('services.mercadopago.key')}}');

    mercadoPago.getIdentificationTypes();
</script>

<script>
    function setCardNetwork()
    {
        const cardNumber = document.getElementById("cardNumber");

        mercadoPago.getPaymentMethod(
            { "bin": cardNumber.value.substring(0,6) },
            function(status, response) {
                const cardNetwork = document.getElementById("cardNetwork");

                cardNetwork.value = response[0].id;
            }
        );
    }
</script>

<script>

    // Accedemos al Formulario por el id
    const mercadoPagoForm = document.getElementById("paymentForm");

    // Agregamos un evenoto para realizar operaciones una vez que se haya enviado
    mercadoPagoForm.addEventListener('submit', function(e) {

        // Solo queremos que esto se ejecute unicamente en el caso de enviar un pago con MercadoPago
        // Consiste en que si el elemento actual de este formulario llamado mercadoPagoForm , en el caso particular del valor de la plataforma
        // de pago coincide exactamente con la que tenemos de MP particularmente.
        if (mercadoPagoForm.elements.payment_platform.value === "{{ $paymentPlatform->id }}") {

            // Utilizamos el evento y prevenimos que se envie el formulario para poder realizar las acciones adicionales
            e.preventDefault();

            // Ahora si utilizamos la variable mercadoPago y llamamos al metodo createToken
            // Este metodo recibe el formulario con todos los campos, metodos y elementos relacionados con MP
            // y tiene una funcion anonima que recibe el estado de la peticion y la respuesta
            mercadoPago.createToken(mercadoPagoForm, function(status, response) {

                // Si el estado es un estado no es de exito (200 o 201)
                if (status != 200 && status != 201) {

                    // Obtenemos el elemento de errores para establecerle un valor
                    const errors = document.getElementById("paymentErrors");

                    // Le establecemos el contenido que viene de la respuesta de un elemento llamado cause (puede haber muchas causas de error) y de alli obtenemos la descripcion de la causa
                    errors.textContent = response.cause[0].description;

                } else {

                    // Una vez que estamos seguros que no hay error establecemos el token que representa el metodo de pago
                    const cardToken = document.getElementById("cardToken");

                    // antes de establecer el valor del token, tenemos que asegurarnos que el elemento que contenga la red que represento
                    // ese metodo de pago sea establecido, por eso hay que llamar al siguiente metodo para que se establezca esa red a partir de
                    // lo que ya el usuario nos ingreso y que ya no hay errores (el numero es correcto y demas).
                    setCardNetwork();

                    // Le establecemos el valor a ese elemento viniendo directamente de la respuesta, simplemente con el id que representa ese metodo de pago
                    cardToken.value = response.id;

                    // enviamos el formulario.
                    mercadoPagoForm.submit();
                }
            });
        }
    });
</script>

@endpush
