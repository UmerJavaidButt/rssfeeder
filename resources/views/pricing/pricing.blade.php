<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('RSS FEED READER') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ ('RSS FEED READER') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1>Pricing</h1>
                <p>Kindly choose a Subscription Plan of your choice!</p>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>


            <div class="container">
                <div class="card-deck mb-3 text-center">
                        <div class="card mb-3 shadow-sm">
                          <div class="card-header pricing-card_header">
                                <h4>Free first 3 Links</h4>
                          </div>

                          <div class="card-body">
                              <h1 class="card-title pricing-card-title">
                                  $0.00
                                  <p><small class="text-muted">first 3 links</small></p>
                              </h1>

                              <ul class="list-unstyled mt-3 mb-4">
                                  <li>First 4 Links</li>
                                  <li>No time limits</li>
                              </ul>

                              <a type="button" class="btn btn-lg btn-block btn-outline-primary">
                                  Get Offer!
                              </a>
                          </div>
                        </div>

                        <div class="card mb-3 shadow-sm">
                          <div class="card-header pricing-card_header">
                                <h4>10 Links</h4>
                          </div>

                          <div class="card-body">
                              <h1 class="card-title pricing-card-title">
                                  $4.99
                                  <p><small class="text-muted">next 10 Links</small></p>
                              </h1>

                              <ul class="list-unstyled mt-3 mb-4">
                                  <li>10 Links</li>
                                  <li>No time limits</li>
                              </ul>

                              <a href="/addmoney/stripe/4.99" type="button" class="btn btn-lg btn-block btn-outline-primary">
                                  Get Offer!
                              </a>
                          </div>
                        </div>

                        <div class="card mb-3 shadow-sm">
                          <div class="card-header pricing-card_header">
                                <h4>25 Links</h4>
                          </div>

                          <div class="card-body">
                              <h1 class="card-title pricing-card-title">
                                  $9.99
                                  <p><small class="text-muted">next 25 links</small></p>
                              </h1>

                              <ul class="list-unstyled mt-3 mb-4">
                                  <li>25 Links</li>
                                  <li>No time limits</li>
                              </ul>

                              <a href="/addmoney/stripe/9.99" type="button" class="btn btn-lg btn-block btn-outline-primary">
                                  Get Offer!
                              </a>
                          </div>
                        </div>

                        <div class="card mb-3 shadow-sm">
                          <div class="card-header pricing-card_header">
                                <h4>Unlimited Links</h4>
                          </div>

                          <div class="card-body">
                              <h1 class="card-title pricing-card-title">
                                  $19.99
                                  <p><small class="text-muted"><strong>Unlimited</strong> links</small></p>
                              </h1>

                              <ul class="list-unstyled mt-3 mb-4">
                                  <li>Unlimited Links</li>
                                  <li>No time limits</li>
                              </ul>

                              <a href="/addmoney/stripe/19.99" type="button" class="btn btn-lg btn-block btn-outline-primary">
                                  Get Offer!
                              </a>
                          </div>
                        </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
