@extends('layouts.airline')
@section('title', 'Register with AirEEEN')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eeenclub.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/famfamfam-flags.css') }}" />
@endsection

@section('scripts')
    <script type="text/javascript">
        var flags = {
            "1": "us",
            "44": "uk",
            "52": "mx",
            "53": "cu",
            "61": "au",
            "242": "bs",
            "284": "vg",
            "345": "ky",
            "353": "ie",
            "506": "cr",
            "507": "pa",
            "509": "ht",
            "809": "do",
            "829": "do",
            "849": "do",
            "876": "jm"
        };
        $(document).ready(function() {
            for (var key in flags) {
                $("#countryselect").append('<option value=' + key + '>+' + key + '</option>');
            }

            $("#countryselect").change(function() {
                $("#countryicon").removeClass().addClass("famfamfam-flag-" + flags[$(this).val()]);
            });

            $(".datepick").datepicker({
                autoHide: true
            });

            $("input[name^=email]").on('input', function() {
                var email = $("input[name=email]");
                var confirm = $("input[name=email_confirmation]");
                if (email.val() !== confirm.val())
                {
                    email.addClass('is-danger');
                    confirm.addClass('is-danger');
                }
                else
                {
                    email.removeClass('is-danger').addClass('is-success');
                    confirm.removeClass('is-danger').addClass('is-success');
                }

            });
            $("input[name^=password]").on('input', function() {
                var password = $("input[name=password]");
                var confirm = $("input[name=password_confirmation]");
                if (password.val() !== confirm.val())
                {
                    password.addClass('is-danger');
                    confirm.addClass('is-danger');
                }
                else
                {
                    password.removeClass('is-danger').addClass('is-success');
                    confirm.removeClass('is-danger').addClass('is-success');
                }
            });

            $("#countryselect").change();
        });
    </script>
@endsection

@section('main-content')
    <section class="description">
        <h1>Fly higher with an <img src="{{ asset('images/eeenclub-blue.png') }}"> account.</h1>
        <p>In just a few minutes you'll have your own EEENClub account!</p>
        <p>Earn EEENPoints by flying with us - then redeem them for free upgrades, trips, and more!</p>
    </section>
    <section class="register">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <ul class="errors">
                    <li class="error">{{ $error }}</li>
                </ul>
            @endforeach
        @endif
        <form action=" {{ route('eeenclub.register') }}" method="post">
            {{ csrf_field() }}
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <label for="surname" class="label reg">Surname:</label>
                    <div class="control select">
                        <select name="surname">
                            <option></option>
                            @foreach (App\Passenger::$surnameValues as $val)
                                @if ($val == old('surname'))
                                    <option selected>{{ $val }}</option>
                                @else
                                    <option>{{ $val }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control">
                    <label for="firstname" class="label reg">First Name:</label>
                    <input type="text" class="input reg" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" />
                </div>
                <div class="control">
                    <label for="lastname" class="label reg">Last Name:</label>
                    <input type="text" class="input reg" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" />
                </div>
                <div class="control">
                    <label for="suffix" class="label reg">Suffix:</label>
                    <div class="control select">
                        <select name="suffix">
                            <option></option>
                            @foreach (App\Passenger::$suffixValues as $val)
                                @if ($val == old('suffix'))
                                    <option selected>{{ $val }}</option>
                                @else
                                    <option>{{ $val }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <label for="email" class="label reg">Email Address:</label>
                    <input type="text" name="email" class="input reg" placeholder="Email Address" value="{{ old('email') }}" />
                </div>

                <div class="control">
                    <label for="emailconfirm" class="label reg">Confirm Email Address:</label>
                    <input type="text" name="email_confirmation" class="input reg" placeholder="Please Confirm" />
                </div>

                <div class="control">
                    <label for="password" class="label reg">Password:</label>
                    <input type="password" name="password" class="input reg" placeholder="Password" />
                </div>

                <div class="control">
                    <label for="passwordconfirm" class="label reg">Confirm Password:</label>
                    <input type="password" class="input reg" name="password_confirmation" placeholder="Please Confirm" />
                </div>
            </div>
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <label for="phone" class="label reg">Phone Number:</label>
                    <div class="field has-addons">
                        <div class="control select">
                            <select name="countrycode" id="countryselect"></select>
                        </div>
                        <div class="control has-icons-left">
                            <input type="text" name="phone" class="input reg" placeholder="Phone Number" value="{{ old('phone') }}" />
                            <span class="icon is-left"><i id="countryicon"></i></span>
                        </div>
                    </div>
                </div>

                <div class="control">
                    <label for="gender" class="label reg">Gender:</label>
                    <div class="control select">
                        <select name="gender">
                            <option></option>
                            @if (old('gender') == 'm')
                                <option value="m" selected>Male</option>
                            @elseif (old('gender') == 'f')
                                <option value="f" selected>Female</option>
                            @else
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="control">
                    <label for="datebirth" class="label reg">Date of Birth:</label>
                    <div class="control">
                        <input type="text" class="input datepick" name="datebirth" placeholder="Date of Birth" value="{{ old('datebirth') }}" />
                    </div>
                </div>
            </div>
            <button type="submit" class="button is-info">Register for EEENClub</button>
        </form>
    </section>
@endsection