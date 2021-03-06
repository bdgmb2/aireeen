<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Finding an Air EEEN Flight...</title>
        <link rel="stylesheet" href="{{ asset('css/airline.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Lato" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/loading.css') }}" />
        <script type="text/javascript" src="{{ asset('js/airline.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var text = $("#dots");
                var step = 0;
                setInterval(function() {
                    switch (step)
                    {
                        case 0:
                            text.append('.');
                            step++;
                            break;
                        case 1:
                            text.append('.');
                            step++;
                            break;
                        case 2:
                            text.append('.');
                            step++;
                            break;
                        case 3:
                            text.empty();
                            text.append("Please Wait");
                            step = 0;
                            break;
                    }
                }, 800);
                setInterval(function() {
                    $.ajax("{{ route('flights.prog', ['token' => $req->accessToken]) }}", {
                       type: 'GET',
                       statusCode: {
                           200: function () { window.location = "{{ route('flights.pick', ['token' => $req->accessToken]) }}"; }
                       }
                    });
                }, 1000);
            });
        </script>
    </head>
    <body>
        <div class="background">
            <div class="center-info">
                <figure>
                    <img class="loading" src="{{ asset('images/bigE.png') }}" alt="Air EEEN Loading Gif" />
                </figure>
                <h1 id="dots">Please Wait</h1>
                <p>We're Finding you the perfect flight!</p>
                <div class="separator-blue"></div>
                @if ($req->tripType == "roundtrip")
                    <p class="info">From {{ $req->source->city }} to {{ $req->destination->city }} on {{ $req->departDate }} and back on {{ $req->returnDate }}</p>
                @else
                    <p class="info">From {{ $req->source->city }} to {{ $req->destination->city }} on {{ $req->departDate }}</p>
                @endif
            </div>
        </div>
    </body>
</html>