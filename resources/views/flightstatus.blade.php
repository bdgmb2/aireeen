@extends('layouts.airline')
@section('title', 'Flight Status')

@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('scripts')
    <script type="text/javascript">
        var map;

        function plotAircraft()
        {
            var icon = {
                url: "{{ asset('images/airplane-icon.png') }}",
                size: new google.maps.Size(64, 64),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(32, 32)
            };
            var marker = new google.maps.Marker({
                position: { lat: {{ $locationLatitude }}, lng: {{ $locationLongitude }} },
                icon: icon,
                map: map
            });
            var windowContent =
                "<p style=\"font-size: 14px\">Aircraft: <strong>" + "{{ $aircraftName }}" + "</strong></p>" +
                "<p style=\"font-size: 14px\">Current Speed: <strong>" + {{ $airspeed }} + " mph</strong></p>" +
                "<p style=\"font-size: 14px\">Current Altitude: <strong>" + {{ $altitude }} + " ft</strong></p>";
            var infoWindow = new google.maps.InfoWindow({content: windowContent});
            marker.addListener('click', function(event) {
                infoWindow.setPosition(event.latLng);
                infoWindow.open(map);
            }, false);
        }

        function plotPath()
        {
            var line = new google.maps.Polyline({
                path: [ { lat: {{ $departureAirport->latitude }}, lng: {{ $departureAirport->longitude }} }, { lat: {{ $arrivalAirport->latitude }}, lng: {{ $arrivalAirport->longitude }} } ],
                map: map,
                geodesic: true,
                strokeColor: "#2E6DA4",
                strokeWeight: 5,

            });
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('flightmap'), {
                zoom: 5,
                center: { lat: {{ $locationLatitude }}, lng: {{ $locationLongitude }} },
            });
            plotAircraft();
            plotPath();
        }
    </script>
    <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_KEY') }}&callback=initMap"></script>
@endsection

@section('main-content')
    <section class="description">
        <h1>Flight Status of AE{{ $flightNumber }}:</h1>
        <p>{{ $status }}</p>
        <p>{{ $departureAirport->icao }} -> {{ $arrivalAirport->icao }}</p>
        <p>{{ $departureAirport->city }}, {{ $departureAirport->state }} -> {{ $arrivalAirport->city }}, {{ $arrivalAirport->state }}</p>
        @if ($wifi)
            <div class="separator-blue"></div>
            <p>There is Wifi aboard this flight!</p>
        @endif
    </section>
    <section class="content">
        <div id="flightmap" style="height: 80vh"></div>
    </section>
@endsection