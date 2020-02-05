window.addEventListener('load',function(){
  var sizes = document.querySelector('.sizes__')
  var inputCantidad = document.querySelector('.inputCantidad')
  console.log(sizes);


sizes.addEventListener('change',function(){
  var query = 'hidden' + this.value;
  var errorStock = document.getElementById(query)
  var valorInput = parseInt(inputCantidad.value)
  var valorMaxStock = parseInt(errorStock.value)

  var div = document.querySelector('.mensajeErrorD')
  var p = document.querySelector('.mensajeErrorP')
  console.log(valorInput, valorMaxStock);
  if (valorInput>valorMaxStock) {
    mensaje = 'El stock maximo de este producto es ' + errorStock.value
    div.removeAttribute('hidden')
    p.innerHTML = mensaje;
    console.log(mensaje);
  }
  else {
    div.setAttribute('hidden','true')
    p.innerHTML = ''
    console.log(p, div);
  }
})

inputCantidad.addEventListener('change', function(){
  var query = 'hidden' + sizes.value;
  var errorStock = document.getElementById(query)
  var valorInput = parseInt(this.value)
  var valorMaxStock = parseInt(errorStock.value)

  var div = document.querySelector('.mensajeErrorD')
  var p = document.querySelector('.mensajeErrorP')
  console.log(valorInput, valorMaxStock);
  if (valorInput>valorMaxStock) {
    mensaje = 'El stock maximo de este producto es ' + errorStock.value
    div.removeAttribute('hidden')
    p.innerHTML = mensaje;
    console.log(mensaje);
  }
  else {
    div.setAttribute('hidden','true')
    p.innerHTML = ''
    console.log(p, div);
  }
})

})
