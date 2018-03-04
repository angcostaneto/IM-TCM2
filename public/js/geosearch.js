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
            new google.maps.Marker({
                position: results[0].geometry.location,
                map: map
            });
            map.setCenter(results[0].geometry.location);
            map.setZoom(18);
        }
    });

}

function destacaBairro(bairro) {
    
}