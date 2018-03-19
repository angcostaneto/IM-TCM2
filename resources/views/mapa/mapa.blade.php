<!--Grid column-->
<div class="col-md-6 mb-4">
    <!--Card-->
    <div class="card">
        <!-- Card header -->
        <div class="card-header text-center">Mapa </div>
        <!--Card content-->
        <div class="card-body">
            <!--Google map-->
            <div id="mapa" class="z-depth-1" style="height: 500px"></div>
        </div>
    </div>
    <!--/.Card-->
</div>

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD87XLDAzmq-4LhBJI36gfhf637fGS_wFw&callback=initMap" async defer></script>
    <script src="{{ asset('js/inicializaMapa.js') }}"></script>
    <script src="{{ asset('js/geosearch.js') }}"></script>
@endpush