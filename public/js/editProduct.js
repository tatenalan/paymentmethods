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
