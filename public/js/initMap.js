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