// scrollea lentamente hacia la posicion 0 de la ventana
function scrollToTop() {
  window.scrollTo({top: 0, behavior: 'smooth'});
}
window.addEventListener('load',function(){
  boton_iniciar_sesion = document.getElementById('iniciarSesion')
})

// Toma el nombre del archivo que queremos subir y lo pone dentro del elemento con la clase info para que podamos verlo.
// esta funcion la utilizamos para cambiar la fachada del input file y poder seguir viendo los nombres de los archivos subidos.

function change(){
  var pdrs = document.getElementById('file-upload').files[0].name;
  document.getElementById('info').innerHTML = pdrs;
}



// Muestra o esconde la barra de redes sociales
function hideAndShowSocialBar() {
  var socialBar = document.getElementById("socialBar");
  if (socialBar.style.display === "none") {
    socialBar.style.display = "block";
    document.getElementById("showhide").innerHTML = 'X';
  } else {
    socialBar.style.display = "none";
    document.getElementById("showhide").innerHTML = 'Show';
  }
}

function hideSocialBar() {
  var socialBar = document.getElementById("socialBar");
    socialBar.style.display = "none";
     document.getElementById("showhide").innerHTML = '';
}




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
