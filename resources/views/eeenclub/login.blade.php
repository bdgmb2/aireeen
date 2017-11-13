@extends('layouts.airline')
@section('title', 'Login to EEENClub')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eeenclub.css') }}" />
@endsection

@section('scripts')
@endsection

@section('main-content')
    <section class="description">
        <h1>Fly higher with an <img src="{{ asset('images/eeenclub-blue.png') }}"> account.</h1>
        <p>EEENClub members can earn and redeem EEENPoints by flying with us.</p>
        <p><strong>Don't Have an EEENClub Account?</strong></p>
        <a class="button is-info" href="{{ route('eeenclub.registerpage') }}">Create One Here</a>
    </section>
    <section class="login">
        <div class="login-box">
            @if ($errors->any())
                <ul class="errors-login">
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('eeenclub.login') }}" method="post">
                {{ csrf_field() }}
                <input type="text" style="display: none" name="referrer" value="{{ Session::get('referrer')  }}" />
                <div class="field">
                    <label for="user" class="label">EEENClub ID:</label>
                    <div class="control">
                        <input type="text" placeholder="Enter your EEENClub ID Here" name="user" class="input">
                    </div>
                </div>
                <div class="field">
                    <label for="pass" class="label">Password:</label>
                    <div class="control">
                        <input type="password" placeholder="Passwords are transmitted securely" name="pass" class="input">
                    </div>
                </div>
                <div class="field">
                    <label for="remember" class="label checkbox"><input type="checkbox">Remember Me</label>
                </div>
                <div class="control">
                    <button type="submit" class="button is-info">Log In</button>
                </div>
            </form>
        </div>
    </section>
@endsection