<div id="mapa" style="width: 500px; height: 500px"></div>

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD87XLDAzmq-4LhBJI36gfhf637fGS_wFw&callback=initMap" async defer></script>
    <script src="{{ asset('js/initMap.js') }}"></script>
    <script src="{{ asset('js/geosearch.js') }}"></script>
@endpush