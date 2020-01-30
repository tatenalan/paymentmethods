window.addEventListener('load',function(){
  var discount = document.querySelector('.discountDiv')
  var onSale = document.getElementById('oferta')
  var discount_input = document.getElementById('discount_id')

onSale.addEventListener('change', function(){
  if (this.value==1) {
    discount.removeAttribute('hidden')
  }
  else if(this.value==0){
    discount.setAttribute('hidden','true')
    discount_input.value=0;
  }
  console.log(discount.value);
})
})
