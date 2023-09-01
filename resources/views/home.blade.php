@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div id="map" style="height: 600px;"></div>
                </div>
                <div>
                    <a href="{{asset('uploads/1/cta.kml')}}">file</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function initMap() {

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: {lat: 31.989970, lng: 35.849170},
        });

        const kmlLayer = new google.maps.KmlLayer({
            url: "{{$kmlUrl}}",
            map: map,
        });
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{$googleApiKey}}&callback=initMap"></script>
@endsection
