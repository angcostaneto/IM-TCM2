var markers = [];

/**
 * Inicializa o google maps
 * 
 * Relação de zooms
 * 1: Mundo
 * 5: Terra/continente
 * 10: Cidade
 * 15: Ruas
 * 20: Prédios
*/

function initMap() {
    map = new google.maps.Map(document.getElementById('mapa'), {
        center: { lat: 0, lng: 0 },
        zoom: 1
    });
}

/**
 * Função de localização reversa.
 * 
 * @param {String} logradouro 
 * @param {String} bairro 
 * @param {String} cidade 
 * @param {String} estado 
 * @param {Integer} numero 
 */
function geosearch (logradouro, bairro, cidade, estado, numero) {
    // Inicializa o geocoder
    var geocoder = new google.maps.Geocoder();

    var address = logradouro + ',' + bairro + ',' + cidade + ',' + estado + ',' + numero;

    geocoder.geocode({
        'address': address
    }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map
            });
            markers.push(marker);
            map.setCenter(results[0].geometry.location);
            map.setZoom(18);
        }
    });

    if (numero == null) {
        clearMarkers();
    }

}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
  markers = [];
}

