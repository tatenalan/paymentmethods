// scrollea lentamente hacia la posicion 0 de la ventana
function scrollToTop() {
  window.scrollTo({top: 0, behavior: 'smooth'});
}
window.addEventListener('load',function(){
  boton_iniciar_sesion = document.getElementById('iniciarSesion')
})

// Muestra o esconde la barra de redes sociales
function myFunction() {
  var socialBar = document.getElementById("socialBar");
  if (socialBar.style.display === "none") {
    socialBar.style.display = "block";
    document.getElementById("showhide").innerHTML = 'Hide';
  } else {
    socialBar.style.display = "none";
    document.getElementById("showhide").innerHTML = 'Show';
  }
}
