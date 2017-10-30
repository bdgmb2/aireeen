@extends('layouts.airline')
@section('title', 'Home')

@section('scripts')
    <script type="text/javascript">
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
    </script>
@endsection

@section('main-content')
    <section class="columns" style="min-height: 600px">
        <div class="column is-two-thirds">

        </div>
        <div class="column action-window">
            <section class="columns action-heading">
                <div class="column active">
                    <h1>Book a Flight</h1>
                </div>
                <div class="column">
                    <h1>Manage Booking</h1>
                </div>
                <div class="column">
                    <h1>View Flight Status</h1>
                </div>
            </section>
            <section id="book-flight">
                <h1>Create Your Trip:</h1>
                <form action="{{ url('/find_flights') }}" method="post">
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
                    <div class="control">
                        <button type="submit" class="button is-info">Search</button>
                    </div>
                </form>
            </section>
            <section id="manage-booking">

            </section>
            <section id="flight-status">

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
                    <h1><strong>Get Connected</strong></h1>
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