@extends('layouts.airline')
@section('title', 'Home')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" />
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            $(".chosen-dropdown").chosen({
                width: "80%",
                no_results_text: "Sorry, We don't fly to ",
                placeholder_text_single: "Select an airport"
            });
            $(".datepick").datepicker({
                autoHide: true
            });
            $('input[type=radio]').change(function() {
                if (this.value === 'oneway')
                    $('.dateReturning').hide();
                else
                    $('.dateReturning').show();
            });

            $("#manage-booking, #flight-status").hide();

            $("#btn-book-flight").click(function() {
                $(".column .active").removeClass("active");
                $("#btn-book-flight").addClass("active");
                $("#book-flight").show();
                $("#manage-booking, #flight-status").hide();
            });
            $("#btn-manage-booking").click(function() {
                $(".column .active").removeClass("active");
                $("#btn-manage-booking").addClass("active");
                $("#manage-booking").show();
                $("#book-flight, #flight-status").hide();
            });
            $("#btn-flight-status").click(function() {
                $(".column .active").removeClass("active");
                $("#btn-flight-status").addClass("active");
                $("#flight-status").show();
                $("#book-flight, #manage-booking").hide();
            });
        });
    </script>
@endsection

@section('main-content')
    <section class="columns" style="min-height: 600px">
        <div class="column is-two-thirds">

        </div>
        <div class="column action-window">
            <section class="columns action-heading">
                <div class="column active" id="btn-book-flight">
                    <h1>Book a Flight</h1>
                </div>
                <div class="column" id="btn-manage-booking">
                    <h1>Manage Booking</h1>
                </div>
                <div class="column" id="btn-flight-status">
                    <h1>View Flight Status</h1>
                </div>
            </section>
            <section id="book-flight">
                <h1>Create Your Trip:</h1>
                @if ($errors->any())
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ url('/find_flights') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="field is-horizontal">
                        <label class="label field-label" for="fromICAO">From:</label>
                        <div class="control field-body">
                            <select class="chosen-dropdown" name="fromICAO">
                                <option></option>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport->icao }}">{{ substr($airport->icao, 1) }} - {{ $airport->name }}, {{ $airport->city }} {{ $airport->state }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <label class="label field-label" for="toICAO">To:</label>
                        <div class="control field-body">
                            <select class="chosen-dropdown" name="toICAO">
                                <option></option>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport->icao }}">{{ substr($airport->icao, 1) }} - {{ $airport->name }}, {{ $airport->city }} {{ $airport->state }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control">
                        <label class="radio"><input type="radio" name="tripType" value="roundtrip" checked>Round Trip</label>
                        <label class="radio"><input type="radio" name="tripType" value="oneway">One Way</label>
                    </div>
                    <div class="columns field">
                        <div class="column control dateDeparting">
                            <label class="label" for="dateDeparting">Depart:</label>
                            <input type="text" class="input datepick" name="dateDeparting">
                        </div>
                        <div class="column control">
                            <label class="label dateReturning" for="dateReturning">Return:</label>
                            <input type="text" class="input datepick dateReturning" name="dateReturning">
                        </div>
                    </div>
                    <div class="columns field">
                        <div class="column control">
                            <label class="label" for="numPassengers">Passengers:</label>
                            <select class="select" name="numPassengers">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                        </div>
                        <div class="column control">
                            <label class="label" for="preferredClass">Preferred Class:</label>
                            <select class="select" name="preferredClass">
                                <option selected>Economy</option>
                                <option>First</option>
                            </select>
                        </div>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-info">Search</button>
                    </div>
                </form>
            </section>
            <section id="manage-booking">
                <h1>Manage Your Trip:</h1>
            </section>
            <section id="flight-status">
                <h1>Check Flight Status:</h1>
            </section>
        </div>
    </section>
    <section class="columns">
        <article class="column box">
            <div class="columns">
                <div class="column">
                    <img src="{{ asset('images/laptop_airplane.jpg') }}" alt="Laptop on Airplane" />
                </div>
                <div class="column is-two-thirds">
                    <h1><strong>Stay Connected</strong></h1>
                    <p>Most flights in our network now have in-flight Wifi.</p>
                    <a href="#">More Info</a>
                </div>
            </div>
        </article>
        <article class="column box">
            <div class="columns">
                <div class="column">
                    <img src="{{ asset('images/people_meeting.jpg') }}" alt="Happy People Meeting" />
                </div>
                <div class="column is-two-thirds">
                    <h1><strong>Get Great Rewards</strong></h1>
                    <p>Frequent flyers have the chance to earn extra EEENPoints now through December.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </article>
        <article class="column box">
            <div class="columns">
                <div class="column">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="Nice Looking Hotel" />
                </div>
                <div class="column is-two-thirds">
                    <h1><strong>Bundle and Save</strong></h1>
                    <p>Save up to 20&#37; when you bundle one of our flights and a hotel.</p>
                    <a href="#">View Offers</a>
                </div>
            </div>
        </article>
    </section>
@endsection