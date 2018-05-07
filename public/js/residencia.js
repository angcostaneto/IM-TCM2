function initMap() {
    var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 18
    });
    var geocoder = new google.maps.Geocoder();
    
    geocodeAddress(geocoder, map);
}
    
function geocodeAddress(geocoder, resultsMap) {
    var address = $('#endereco').text();
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } 
    });
}
