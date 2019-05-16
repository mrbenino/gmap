var map;
var rest =  {
    north: 79.99,
    south: -79.99,
    west: -179.99,
    east: 179.99,
};

initMap = function(){
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -31.563910, lng: 147.154312},
        zoom: 16,
        disableDefaultUI: true,
        restriction: {
            latLngBounds: rest,
            strictBounds: false,
        }
    });
    markers = locations.map(function(location, i) {
        return new google.maps.Marker({
          id: location.id,
          position: location,
          label: location.lab,
          title: 'locations.info',
          info: locations.info,
        });
    });

    var infowindow = null;
    
    infowindow = new google.maps.InfoWindow({
        content: "holding..."
    });

    for (var i = 0; i < markers.length; i++) {
        var marker = markers[i];
        google.maps.event.addListener(marker, 'click', function () {      
            console.log(this.id);
            index = this.id;
            infowindow.setContent(locations[index].info);
            infowindow.open(map, this);
        });
    }

    var markerCluster = new MarkerClusterer(map, markers,{
        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
    });
};

$(document).ready(function(){    
    $('form').submit(function(e){ 
        e.preventDefault();
        data = {};
        data['lat'] = $('[name=lat]').val();
        data['lng'] = $('[name=lng]').val();
        data['lab'] = $('[name=lab]').val();
        data['info'] = $('[name=info]').val();
        console.log(data);
        $('#res').load('save.php',{data});
    });
});
