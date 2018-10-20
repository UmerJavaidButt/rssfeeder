<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('APPLICATION') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Required Framework -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font awesome star css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.css')}}">
    <!-- Font awesome star css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <!-- star theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/bars-1to10.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/bars-horizontal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/bars-movie.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/bars-pill.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/bars-reversed.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/bars-square.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="../../bower_components/jquery-bar-rating/dist/themes/bootstrap-stars.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/css-stars.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="../../bower_components/jquery-bar-rating/dist/themes/fontawesome-stars.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-bar-rating/dist/themes/fontawesome-stars-o.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('icofont/css/icofont.css') }}" rel="stylesheet">
    <link href="{{ asset('masonry/masonry.css') }}" rel="stylesheet">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar/style.css')}}">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="navbar-wrapper container text-center">
        <span class="sitename text-center">Site name</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav text-center">
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <!-- <ul class="navbar-nav ml-auto"> -->
                    <!-- Authentication Links -->
                    <!-- @guest
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
                </ul> -->
            </div>
        </div>
    </nav>

    <!-- Sidebar starts -->

  <div class="main-menu">
    <div class="main-menu-header">
        <img class="img-40" src="{{asset('images/user.png')}}" alt="User-Profile-Image">
          <div class="user-details">
              <span>{{ Auth::user()->name }}</span>
              <a id="more-details">Managae Account<i class="ti-angle-down"></i></a>
          </div>
    </div>
    <div class="main-menu-content">
        <ul class="main-navigation">
          <li class="nav-title" data-i18n="nav.category.navigation">
              <i class="ti-line-dashed"></i>
              <span>All Subscribed URLs</span>
          </li>
            <li class="nav-item single-item">
                <div>
                <a href="{{url('/')}}">
                  <ul>
                    <li>
                      <span>Your Agent List</span>
                    </li>
                  </ul>
                </a>

                <a href="{{route('competitors')}}">
                  <ul class="active">
                    <li>
                      <span>Competitors</span>
                    </li>
                  </ul>
                </a>

                <a href="{{route('savedProducts')}}">  
                  <ul>
                    <li>
                      <span>Saved Products</span>
                    </li>
                  </ul>
                </a>
              </div>
            </li>
        </ul>

      <div class="signout">
            <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="icofont icofont-logout"></i>
              <span>Signout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
      </div>  
    </div>
  </div>

    <!-- Sidebar Ends-->

    <!-- Main Body -->

  <div class="main-body">
    <div class="page-wrapper">
        <div class="page-header row">
           <nav class="navbar header-navbar">
              <div class="navbar-wrapper">
                  
                  <div class="navbar-container">
                      <div class="row">
                          <ul class="nav-left col-md-8 col-sm-12 col-xs-12">
                               <div class=" ">
                                  <form action="/subscribeURL" method="post">
                                      {{csrf_field()}}
                                    <div class="item-left-search">
                                        <input class="form-control search-bar-main" type="text" placeholder="https://example.com" aria-label="Search">
                                    </div>
                                    <div class="left-item-btn">
                                      <button class="btn btn-default btn-add btn-md">Add</button>
                                    </div>
                                  </form>
                                </div> 
                          </ul>
                          <ul class="nav-right col-md-4 col-sm-12 col-xs-12">
                              <div class=" ">
                                  <form action="/subscribeURL" method="post">
                                      {{csrf_field()}}
                                    <div class="item-left-search">
                                        <input class="form-control search-bar-main" type="text" placeholder="Input" aria-label="Search">
                                    </div>
                                    <div class="left-item-btn">
                                      <button class="btn btn-default btn-add btn-md">Search</button>
                                    </div>
                                  </form>
                                </div> 
                          </ul>
                      </div>
                  </div>
              </div>
          </nav>
        </div>
        <div class="page-body">
       
        <div class="row">
            <!-- Documents card start -->
            <div class="col-md-12 col-xl-12 col-sm-12 col-xs-12">
              <div class="masonry">
               @if(!empty($subscriptions))
                    @foreach($subscriptions as $subscription)
                    <div class="item">{{$subscription->url}}</div>
                    @endforeach
               @endif
            </div>
            </div>
        </div>
    </div>
</div>

    <!-- Main Body -->

    <script type="text/javascript" src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tether/dist/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>

    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- rating js -->
    <script type="text/javascript" src="{{ asset('jquery-bar-rating/jquery.barrating.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js//rating.js') }}"></script>
    
    
    <script src="{{ asset('js/feed.js') }}"></script>
    <!--[if lte IE 9]>
    <script src="{{ asset('masonry/masonry.pkgd.min.js') }}"></script>
    <![endif]-->

    <!-- Custom JS -->
    <script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                return $('#primary-popover-content').html();
            }
        });
    });
    </script>
</body>
</html>
