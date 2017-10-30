@extends('layouts.airline')
@section('title', 'Home')

@section('scripts')
    <script type="text/javascript">
        var map;

        var flightPaths = [
            @foreach ($flightPaths as $path)
            {
                from: "{{ $path->sourceAirport()->first()->city }}, {{ $path->sourceAirport()->first()->state }}",
                to: "{{ $path->destinationAirport()->first()->city }}, {{ $path->destinationAirport()->first()->state }}",
                fromActivity: {{ $path->sourceAirport()->first()->activity }},
                toActivity: {{ $path->destinationAirport()->first()->activity }},
                path: [ { lat: {{ $path->sourceAirport()->first()->latitude }} , lng: {{ $path->sourceAirport()->first()->longitude }} }, { lat: {{ $path->destinationAirport()->first()->latitude }} , lng: {{ $path->destinationAirport()->first()->longitude }} }]
            },
            @endforeach
        ];

        var airports = [
            @foreach ($airports as $airport)
            { icao: "{{ $airport->icao }}", name: "{{ $airport->name }}", coords: { lat: {{ $airport->latitude }}, lng: {{ $airport->longitude }} }, activity: {{ $airport->activity }} },
            @endforeach
        ]

        function setLines() {
            for (var i = 0, len = flightPaths.length; i < len; i++) {
                (function() {
                    var line = new google.maps.Polyline({
                        path: flightPaths[i].path,
                        geodesic: true,
                        strokeColor: (flightPaths[i].fromActivity === 1 || flightPaths[i].toActivity === 1) ? "#A90705" : "#2E6DA4",
                        strokeWeight: function() {
                            if (flightPaths[i].fromActivity === 1 || flightPaths[i].toActivity === 1) return 2;
                            else return (flightPaths[i].fromActivity + flightPaths[i].toActivity) / 2;
                        }()
                    });
                    var windowContent = "Flight from " + flightPaths[i].from + " to " + flightPaths[i].to;
                    var infoWindow = new google.maps.InfoWindow({content: windowContent});
                    line.addListener('click', function(event) {
                        infoWindow.setPosition(event.latLng);
                        infoWindow.open(map);
                    }, false);
                    line.setMap(map);
                })();
            }
        }

        function setMarkers() {
            for (var i = 0, len = airports.length; i < len; i++) {
                (function() {
                    var circle = new google.maps.Circle({
                        center: airports[i].coords,
                        radius: 5000
                    });
                    var windowContent = airports[i].icao + " - " + airports[i].name + ", " + airports[i].activity;
                    var infoWindow = new google.maps.InfoWindow({content: windowContent});
                    circle.addListener('click', function () {
                        infoWindow.setPosition(circle.getCenter());
                        infoWindow.open(map);
                    }, false);
                    circle.setMap(map);
                }());
            }
        }

        function setLegend() {
            var legend = document.getElementById('legend');
            map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 3,
                center: { lat: 41.879, lng: -87.624 }
            });
            setLines();
            setMarkers();
            setLegend();
        }



    </script>
    <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOBxtbwubPHOTU_62AQXUmKljXcZkoWK8&callback=initMap"></script>
@endsection

@section('main-content')
    <section class="container">
        <h1>Where We Fly</h1>
        <p>Air EEEN has over 80 destinations throughout the United States and over 1,000 flights per day. Click on an airport or a route below to learn more.x</p>
    </section>

    <div id="legend" style="background-color: white; margin-bottom: 25px; margin-left: 10px; padding: 5px;">
        <h1 style="text-align: center"><strong>Legend</strong></h1>
        <div>
            <div style="display: inline-block; height: 10px; width: 20px; background-color: #2E6DA4;"></div>
            <span>Air EEEN</span>
        </div>
        <div>
            <div style="display: inline-block; height: 10px; width: 20px; background-color: #A90705;"></div>
            <span>Air EEEN Connect</span>
        </div>
    </div>
    <div id="map" style="height: 80vh;"></div>
@endsection