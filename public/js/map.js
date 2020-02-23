function initMap() {
  var myLatLng = {lat: -34.816530, lng: -58.468796};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!',
    icon: 'https://image.freepik.com/iconos-gratis/pin-geolocalizacion_318-9542.jpg'
  });
}
