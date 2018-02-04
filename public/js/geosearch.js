console.log('aqui');

var mymap = L.map('mapa').setView([51.505, -0.09], 13);

mapboxgl.accessToken = 'sk.eyJ1IjoiYW5nY29zdGEiLCJhIjoiY2pkOTNxbnBlNXBieTJ4bjJvNTU0ZnV3eCJ9.IYgPUQv-LQvpnqiBB1hoLw';
mapboxgl.googleToken = 'AIzaSyD87XLDAzmq-4LhBJI36gfhf637fGS_wFw';

L.tileLayer('https://api.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxgl.accessToken, {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id: 'mapbox.streets',
    accessToken: mapboxgl.accessToken
}).addTo(mymap);
