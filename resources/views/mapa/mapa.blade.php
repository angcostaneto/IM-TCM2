@push('styles')
    <!-- Map box -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.44.0/mapbox-gl.css' rel='stylesheet' />
    <!-- Leaflet -->
    <link href="{{ asset('plugins/leaflet/leaflet.css') }}" rel="stylesheet">
@endpush

<div class="col-md-12">
    <div id="mapa" style='width: 500px; height: 500px;'></div>
</div>

@push('scripts')
    <!-- Map box -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.44.0/mapbox-gl.js'></script>
    <!-- Leaflet -->
    <script src="{{ asset('plugins/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('js/geosearch.js') }}"></script>
@endpush