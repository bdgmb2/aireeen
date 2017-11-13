@extends('layouts.airline')
@section('title', 'Thanks for Registering!')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eeenclub.css') }}" />
@endsection

@section('scripts')

@endsection

@section('main-content')
    <section class="description">
        <h1>Congratulations! You've created an <img src="{{ asset('images/eeenclub-blue.png') }}"> account!</h1>
    </section>
    <section class="register-details">
        <h1>Your new EEENClub ID is <strong>{{ $id }}</strong></h1>
        <p>A verification email has been sent to {{ $email }}. You must verify your email address before booking any flights or redeeming EEENPoints.</p>
        <p>This is your personal identifier when dealing with any matter related to Air EEEN.</p>
        <p>Your EEENPoints and special offers are also connected to this ID. Make sure not to lose it!</p>
        <p>You can now <a href="{{ route('eeenclub.loginpage') }}">return to the log in </a></p>
    </section>
@endsection