function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('custom-map'), {
          center: {lat: 48.947430, lng: 9.429230},
          zoom: 18,
		  
		  // Styles from https://snazzymaps.com/
          styles: []
        });
		  
	var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    icon: ''
  });
  
   marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
		
		 var contentString = '<div id="custom-map-infowindow">'+
            '<h5>STROH hörakustik</h5>'+
            '<p>Grabenstraße 22</p>'+
            '<p>71522 Backnang</p>'+     
            '</div>';
  
   var infowindow = new google.maps.InfoWindow({
          content: contentString
        });      
}


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOEHcUXEjPE4j4vaB_i8ytk0j0762t4Hw&callback=initMap"
    async defer></script>

