<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Air EEEN - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/airline.css') }}" />
        @yield('css')
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Lato" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('js/airline.js') }}"></script>
    </head>
    <body>
        <header class="columns is-hidden-mobile">
            <div class="column left-fade"></div>
            <div class="column is-two-thirds">
                <nav class="navbar" role="navigation">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="{{ route('home') }}"><img src="{{ asset('images/eeenwhite.png') }}" alt="Air EEEN Logo" /></a>
                    </div>
                    <div class="navbar-menu navbar-end">
                        <a class="navbar-item" href="{{ route('about') }}">About</a>
                        <a class="navbar-item" href="{{ route('about.travelinfo') }}">Travel Information</a>
                        @isset ($account)
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="{{ route('eeenclub.home') }}"><img src="{{ asset('images/eeenclub-white.png') }}" alt="EEEN Club"><i class="down-arrow"></i></a>
                                <div class="navbar-dropdown">
                                    <div class="eeenclub-status">
                                        <p><strong>{{ $passenger->firstName }} {{ $passenger->lastName }}</strong></p>
                                        <p><strong>{{ number_format($account->miles) }}</strong> EEENPoints</p>
                                        @if ($account->status != 0)
                                            <p>Status: {{ App\Account::$statusEnum[$account->status] }}</p>
                                        @endif
                                        <a class="button is-info" id="logout" href="{{ route('eeenclub.logout') }}">Logout</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a class="navbar-item" href="{{ route('eeenclub.home') }}"><img src="{{ asset('images/eeenclub-white.png') }}" alt="EEEN Club"></a>
                        @endif
                    </div>
                </nav>
            </div>
            <div class="column right-fade"></div>
        </header>
        <nav class="navbar is-hidden-desktop is-hidden-tablet" role="navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}"><img src="{{ asset('images/eeenwhite.png') }}" alt="Air EEEN Logo" /></a>
                <div class="button navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>

        <main>
            @yield('main-content')
        </main>
        <footer>
            <div class="columns">
                <div class="column">
                    <h1>Help and Support</h1>
                    <div class="separator"></div>
                    <ul>
                        <li>Contact Air EEEN</li>
                        <li>Refund Policy</li>
                        <li>FAQ's</li>
                        <li>Agency Reference</li>
                        <li>Cargo and Shipping</li>
                        <li>Baggage and Service Fees</li>
                    </ul>
                </div>
                <div class="column">
                    <h1>About Air EEEN</h1>
                    <div class="separator"></div>
                    <ul>
                        <li><a href="{{ route('about') }}">The Project</a></li>
                        <li><a href="{{ route('about.destinations') }}">Where we fly</a></li>
                        <li>Careers</li>
                        <li>Gift Cards</li>
                        <li>Development Information</li>
                        <li>Legal and Copyright</li>
                    </ul>
                </div>
                <div class="column">
                    <h1>Partners and Press</h1>
                    <div class="separator"></div>
                    <ul>
                        <li>Business Programs</li>
                        <li>Partners and Subsidies</li>
                        <li>Newsroom</li>
                    </ul>
                </div>
            </div>
        </footer>
        @yield('scripts')
    </body>
</html>