window.addEventListener('load',function(){
  var discount = document.querySelector('.discountDiv')
  var onSale = document.getElementById('oferta')


onSale.addEventListener('change', function(){
  if (this.value==1) {
    discount.removeAttribute('hidden')
  }
  else if(this.value==0){
    discount.setAttribute('hidden','true')
  }
  console.log(discount.value);
})
})
