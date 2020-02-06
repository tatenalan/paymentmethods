window.addEventListener('load',function(){
  // select del talle
  var inputSizes = document.querySelector('.sizes__')
  // input de cantidad de producto a comprar
  var inputCantidad = document.querySelector('.inputCantidad')


inputSizes.addEventListener('change',function(){
  // esto traeria por ejemplo hidden42
  var idTalleMax = 'hidden' + this.value;
  // traemos el input del limite de ese talle en particular
  var limiteDeStock = document.getElementById(idTalleMax)
  // almacenamos el stock maximo en una variable
  var valorMaxStock = parseInt(limiteDeStock.value)


  // almacenamos el valor del input en una variable
  var valorInput = parseInt(inputCantidad.value)


  // traemos el div del mensaje de error
  var div = document.querySelector('.divDeError')
  // etiqueta p con el error
  var p = document.querySelector('.mensajeError')

  // si el valor del input es mayor a el valor maximo de ese stock en particular
  if (valorInput>valorMaxStock) {
    // creamos el mensaje de errror
    mensaje = 'El stock maximo de este producto es ' + limiteDeStock.value
    // removemos el atributo hidden al div
    div.removeAttribute('hidden')
    // Agregamos el mensaje a la etiqueta p
    p.innerHTML = mensaje;
  }
  // caso contrario
  else {
    // ocultamos el div
    div.setAttribute('hidden','true')
    // vaciamos la etiqueta P
    p.innerHTML = ''
  }
})

inputCantidad.addEventListener('change', function(){
  // creamos una var con el id del talle maximo en particular
  var idTalleMax = 'hidden' + inputSizes.value;
  // traemos el input del limite de ese talle en particular
  var limiteDeStock = document.getElementById(idTalleMax)

  // Nos trae la cantidad maxima de stock de ese talle en particular
  var valorMaxStock = parseInt(limiteDeStock.value)

  // almacenamos el valor del input en una variable
  var valorInput = parseInt(this.value)

  // div del error
  var div = document.querySelector('.divDeError')
  // etiqueta p del error
  var p = document.querySelector('.mensajeError')

  // si el valor del input es mayor a el valor maximo de ese stock en particular
  if (valorInput>valorMaxStock) {
    mensaje = 'El stock maximo de este producto es ' + limiteDeStock.value
    div.removeAttribute('hidden')
    p.innerHTML = mensaje;
  }
  else {
    div.setAttribute('hidden','true');
    p.innerHTML = '';
  }
})

// ubicamos el boton de submit
var botonSubmit = document.querySelector('.buttonSubmit')

botonSubmit.addEventListener('click', function(event){
    // creamos una var con el id del talle maximo en particular
    var idTalleMax = 'hidden' + inputSizes.value;
    // traemos el input del limite de ese talle en particular
    var limiteDeStock = document.getElementById(idTalleMax);

    // Nos trae la cantidad maxima de stock de ese talle en particular
    var valorMaxStock = parseInt(limiteDeStock.value);

    // almacenamos el valor del input en una variable
    var valorInput = parseInt(inputCantidad.value);


  if (valorInput>valorMaxStock) {
    botonSubmit.classList.add('animated');
    botonSubmit.classList.add('shake');
    event.preventDefault();
  }
})

  // traemos al conjunto de imagenes
  imagenesPeque = document.querySelectorAll('.imagen-producto-peque')

  for (imagen of imagenesPeque) {

    // a cada imagen le agregamos un evento on click
    imagen.addEventListener('click', function(){
      // Reseteamos los cambios en las imagenes
      for (imagen of imagenesPeque) {
        imagen.style.border = 'none';
        imagen.style.opacity = 1;
      }

      //Traemos la imagen princial
      imagenGrande = document.querySelector('.imagen_grande')
      //modificamos su src con el de la imagen seleccionada
      imagenGrande.src = this.src;

      // le aplicamos los cambios a la imagen seleccionada
      this.style.border = '3px #25262a solid';
      this.style.opacity = 0.8;
    })
  }
})
