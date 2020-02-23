window.addEventListener('load',function(){

  // Si queda 1 sola imagen le enviamos un mensaje de que no se puede borrar la ultima imagen
  var cant_imagenes = document.querySelectorAll('.product-img').length;
  var etiquetaP = document.querySelector('.mensajeErrorImagen');
  var divError = document.querySelector('.divErrorImagen');

  // si hay mas de 1 imagen
  if (cant_imagenes<=1) {
    etiquetaP.innerHTML = "No puedes eliminar todas las imagenes del producto";
    divError.removeAttribute('hidden');
  }
  else {
    etiquetaP.innerHTML = "";
    divError.setAttribute('hidden',true);
  }
})


window.addEventListener('load',function(){

// Creacion de input descuento en vista add product
  function onSale(){
    // Selecciono el select con id onSale y el div de discount que tiene la clase hidden
    var onSale = document.getElementById('onSale');
    var discount = document.getElementById('discount');
    var inputDiscount = document.getElementById('inputDiscount');

        // Creo un evento que actue cuando cambia el value del input onSale
        onSale.addEventListener('change',function(){
          if (onSale.value==1) {
            discount.classList.remove("hidden");
            console.log(inputDiscount.value);
            console.log(discount);
          } else {
            discount.classList.add("hidden");
            inputDiscount.value=null;
            console.log(inputDiscount.value);
            console.log(discount);
          }
    }) // cierre del evento change de onSale
  }// cierre de la funcion onSale
  onSale();

})
