@extends('layouts.airline')
@section('title', 'EEENClub')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eeenclub.css') }}" />
@endsection

@section('scripts')
@endsection

@section('main-content')
    <section class="description">
        <h1>Hello, {{ $passenger->firstName }}!</h1>
        <p>Welcome to your EEENClub Status Page!</p>
    </section>
    <section class="columns">
        <div class="column">
            <p>You Have <strong>{{ $account->miles }}</strong> EEENPoints.</p>
            <div class="separator"></div>
            @if ($passenger->status == 1)
                <p>Your status is: EEENSilver</p>
                <p>You only need to earn another {{ number_format(App\Account::$pointCalc[2] - $account->accumulatedMiles) }} EEENPoints to achieve the next EEENClub status.</p>
            @elseif ($passenger->status == 2)
                <p>Your status is: EEENGold</p>
                <p>You only need to earn another {{ number_format(App\Account::$pointCalc[3] - $account->accumulatedMiles) }} EEENPoints to achieve the next EEENClub status.</p>
            @elseif ($passenger->status == 3)
                <p>Your status is: EEENPlatinum</p>
                <p>Congratulations! You've achieved the highest EEENClub status level! Thank you for your loyalty!</p>
            @else
                <p>Although you aren't an EEENClub Elite member, you only need {{ number_format(App\Account::$pointCalc[1] - $account->accumulatedMiles) }} EEENPoints until you reach EEENSilver Status!</p>
            @endif
        </div>
        <div class="column">
            <h1>Your Upcoming Trips:</h1>
        </div>
    </section>
@endsection