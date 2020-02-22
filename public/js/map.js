function initMap() {

  var uluru = {lat: -34.816530, lng: -58.468796};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: uluru,
    scrollwheel: false,
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map,
    icon: 'http://merloestucasa.com/images/map-point.png'
  });
}


// sparkpost-key 8a6e049ac2998ac94f1f056af4fa962435274e96
