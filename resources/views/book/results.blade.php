@extends('layouts.airline')
@section('title', 'Search Results for ' . $results['request']->source->icao . ' to ' . $results['request']->destination->icao)

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bookflight.css') }}" />
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".box-addon").hide();

            $(".showDetails, .hideDetails").click(function() {
                if ($(this).hasClass('showDetails')) {
                    $(this).removeClass('showDetails');
                    $(this).addClass('hideDetails');
                    $(this).html("Hide Details <i class=\"fa fa-arrow-up\"></i>");
                    $(this).parent().parent().parent().parent().parent().next().slideDown();
                } else {
                    $(this).addClass('showDetails');
                    $(this).removeClass('hideDetails');
                    $(this).html("More Details <i class=\"fa fa-arrow-down\"></i>");
                    $(this).parent().parent().parent().parent().parent().next().slideUp();
                }
            });
        });
    </script>
@endsection

@section('main-content')
    <section class="description">
        <h1>Your Flight from {{ $results['request']->source->city }} to {{ $results['request']->destination->city }}</h1>
        <p>On {{ $results['request']->departDate }}</p>
        <p><small>Price includes taxes and fees. Additional baggage fees may apply.</small></p>
    </section>
    @if ($results['searchResults']->isEmpty())
    <section class="noresults">
        <h1>No Results</h1>
    </section>
    @else
    <div class="search-results columns">
        <section class="column is-three-quarters">
            <div class="columns topbar">
                <div class="column is-two-thirds filter">
                    <p>Sort By:</p>
                    <div class="buttons">
                        <a href="{{ route('flights.pick', ['token' => $token, 'sortBy' => 'economyPrice']) }}" class="button @if ($activeSort == 'economyPrice') is-info @endif">EEENConomy Price</a>
                        <a href="{{ route('flights.pick', ['token' => $token, 'sortBy' => 'firstPrice']) }}" class="button @if ($activeSort == 'firstPrice') is-info @endif">First Price</a>
                        <a href="{{ route('flights.pick', ['token' => $token, 'sortBy' => 'departureTime']) }}" class="button @if ($activeSort == 'departureTime') is-info @endif">Departure Time</a>
                        <a href="{{ route('flights.pick', ['token' => $token, 'sortBy' => 'arrivalTime']) }}" class="button @if ($activeSort == 'arrivalTime') is-info @endif">Arrival Time</a>
                        <a href="{{ route('flights.pick', ['token' => $token, 'sortBy' => 'totalDuration']) }}" class="button @if ($activeSort == 'totalDuration') is-info @endif">Duration</a>
                    </div>
                </div>
                <div class="column class-desc economyback">
                    <h1>EEENConomy Class</h1>
                </div>
                <div class="column class-desc firstback">
                    <h1>First Class</h1>
                </div>
            </div>
            @foreach ($results['searchResults'] as $trip)
                <article class="box">
                    <div class="columns">
                        <div class="column is-half" style="border-right: 1px solid gray;">
                            <div class="columns">
                                <div class="column center">
                                    <p><strong>{{ $trip['flight'][0]->sourceAirport }}</strong></p>
                                    <p>{{ $trip['flight'][0]->departureTime->format('h:i A') }}</p>
                                </div>
                                @if ($trip['legs'] == 1)
                                    <div class="column center">
                                        <p>. . . . . . . . .</p>
                                        <p></p>
                                        <p class="small"><i class="fa fa-plane"></i>{{ $trip['flight'][0]->aircraftModel()->first()->name }}</p>
                                        <p>
                                            @if ($trip['flight'][0]->wifi)
                                                <i class="fa fa-wifi" title="Wifi is offered onboard this flight"></i>
                                            @endif
                                            @if ($trip['flight'][0]->meals)
                                                <i class="fa fa-cutlery" title="A meal is offered onboard this flight"></i>
                                            @endif
                                        </p>
                                    </div>
                                @elseif ($trip['legs'] == 2)
                                    <div class="column center">
                                        <p>. . . . | . . . .</p>
                                        <p class="small">{{ $trip['flight'][1]->departureTime->diff($trip['flight'][0]->arrivalTime)->format('%h h %i min') }} Layover in <strong>{{ $trip['flight'][0]->destinationAirport }}</strong></p>
                                        <button class="button showDetails">More Details <i class="fa fa-arrow-down"></i></button>
                                    </div>
                                @elseif ($trip['legs'] == 3)
                                    <div class="column center">
                                        <p>. . | . . . | . .</p>
                                        <p class="small">{{ $trip['flight'][1]->departureTime->diff($trip['flight'][0]->arrivalTime)->format('%h h %i min') }} Layover in <strong>{{ $trip['flight'][0]->destinationAirport }}</strong></p>
                                        <p class="small">{{ $trip['flight'][2]->departureTime->diff($trip['flight'][1]->arrivalTime)->format('%h h %i min') }} Layover in <strong>{{ $trip['flight'][1]->destinationAirport }}</strong></p>
                                        <button class="button showDetails">More Details <i class="fa fa-arrow-down"></i></button>
                                    </div>
                                @elseif ($trip['legs'] == 4)
                                    <div class="column center">
                                        <p>. . | . . | . . | . .</p>
                                        <p class="small">{{ $trip['flight'][1]->departureTime->diff($trip['flight'][0]->arrivalTime)->format('%h h %i min') }} Layover in <strong>{{ $trip['flight'][0]->destinationAirport }}</strong></p>
                                        <p class="small">{{ $trip['flight'][2]->departureTime->diff($trip['flight'][1]->arrivalTime)->format('%h h %i min') }} Layover in <strong>{{ $trip['flight'][1]->destinationAirport }}</strong></p>
                                        <p class="small">{{ $trip['flight'][3]->departureTime->diff($trip['flight'][2]->arrivalTime)->format('%h h %i min') }} Layover in <strong>{{ $trip['flight'][2]->destinationAirport }}</strong></p>
                                        <button class="button showDetails">More Details <i class="fa fa-arrow-down"></i></button>
                                    </div>
                                @else
                                    <div class="column center">
                                        <p>More than 4 legs. No.</p>
                                    </div>
                                @endif
                                <div class="column center">
                                    <p><strong>{{ $trip['flight'][$trip['legs'] - 1]->destinationAirport }}</strong></p>
                                    <p>{{ $trip['flight'][$trip['legs'] - 1]->arrivalTime->format('h:i A') }}</p>
                                    @if ($trip['flight'][$trip['legs'] - 1]->arrivalTime->format('d') != $trip['flight'][0]->departureTime->format('d'))
                                        <p><span class="tag is-light">+1 Day</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="column center">
                            <p class="small">Total Duration:</p>
                            @php
                                $diff = $trip['flight'][$trip['legs'] - 1]->arrivalTime->diff($trip['flight'][0]->departureTime);
                                $totalHours = ($diff->d * 24) + $diff->h;
                            @endphp
                            <p>{{ $totalHours }} h, {{ $diff->format('%i') }} min</p>
                            @if ($trip['legs'] == 1)
                                <p><span class="tag is-info">Non-Stop</span></p>
                            @elseif ($trip['legs'] == 2)
                                <p><span class="tag is-warning">1 Stop</span></p>
                            @else
                                <p><span class="tag is-danger">{{ $trip['legs'] - 1 }} Stops</span></p>
                            @endif
                        </div>
                        <div class="column economytext center">
                            <p>${{ $trip['totalEconomy'] }}</p>
                        </div>
                        <div class="column firsttext center">
                            <p>${{ $trip['totalFirst'] }}</p>
                        </div>
                    </div>
                </article>
                @if ($trip['legs'] > 1)
                <div class="box box-addon">
                    @foreach ($trip['flight'] as $leg)
                        <div class="columns">
                            <div class="column center">
                                <p><strong>{{ $leg->sourceAirport }}</strong></p>
                                <p class="small">{{ $leg->sourceAirport()->first()->name }}</p>
                                <p>{{ $leg->departureTime->format('h:i A T') }}</p>
                                <p class="small">{{ $leg->departureTime->format('M j') }}</p>
                            </div>
                            <div class="column center is-narrow"><p>. . . .</p></div>
                            <div class="column center">
                                <p class="small"><i class="fa fa-plane"></i>{{ $leg->aircraftModel()->first()->name }}</p>
                                <p><i class="fa fa-clock-o"></i>{{ $leg->arrivalTime->diff($leg->departureTime)->format('%h h, %i min') }}</p>
                                <p>
                                    @if ($leg->wifi)
                                        <i class="fa fa-wifi"></i>
                                    @endif
                                    @if ($leg->meals)
                                        <i class="fa fa-cutlery"></i>
                                    @endif
                                </p>
                            </div>
                            <div class="column center is-narrow"><p>. . . .</p></div>
                            <div class="column center">
                                <p><strong>{{ $leg->destinationAirport }}</strong></p>
                                <p class="small">{{ $leg->destinationAirport()->first()->name }}</p>
                                <p>{{ $leg->arrivalTime->format('h:i A T') }}</p>
                                <p class="small">{{ $leg->arrivalTime->format('M j') }}</p>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <div class="columns">
                                <div class="column">
                                    <p class="small">
                                        @if ($trip['flight'][$loop->iteration]->departureTime->diff($leg->arrivalTime)->h == 0)
                                            <span class="tag is-danger">
                                                {{ $trip['flight'][$loop->iteration]->departureTime->diff($leg->arrivalTime)->format('%h h %i min') }} Layover in {{ $leg->destinationAirport }}
                                                (Short Layover)
                                        @elseif ($trip['flight'][$loop->iteration]->departureTime->format('d') != $leg->arrivalTime->format('d'))
                                            <span class="tag is-warning">
                                                {{ $trip['flight'][$loop->iteration]->departureTime->diff($leg->arrivalTime)->format('%h h %i min') }} Layover in {{ $leg->destinationAirport }}
                                                (Overnight Layover)
                                        @else
                                            <span class="tag is-info">
                                                {{ $trip['flight'][$loop->iteration]->departureTime->diff($leg->arrivalTime)->format('%h h %i min') }} Layover in {{ $leg->destinationAirport }}
                                        @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @endif
            @endforeach
        </section>
        <section class="shopping-cart column">
            <h1>Your Itinerary:</h1>
        </section>
    </div>
    @endif
@endsection