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
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar/style.css')}}">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="navbar-wrapper container">
            <a class="navbar-brand" href="{{ route('subscribe') }}">
                {{ ('Subscribe') }}
            </a>

            <span class="navbar-brand">|</span>

            <a class="navbar-brand" href="{{route('pricing')}}">
                Pricing
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

    <!-- Sidebar starts -->

  <div class="main-menu">
    <!-- <div class="main-menu-header">
        <img class="img-40" src="{{asset('images/user.png')}}" alt="User-Profile-Image">
        <div class="user-details">
            <span>Welcome {{ Auth::user()->name }}</span>
        </div>
    </div> -->

    <div class="main-menu-content">
        <ul class="main-navigation">
          <li class="nav-title" data-i18n="nav.category.navigation">
              <i class="ti-line-dashed"></i>
              <span>All Subscribed URLs</span>
          </li>
            <li class="nav-item single-item">
                <div class="row">
                  <!-- <form action="/feed" method="post">
                  {{csrf_field()}}
                      <div class="form-group col-md-12">
                          <input class="form-control" type="text" placeholder="https://example.com" name="url">
                      </div>
                  </form> -->

                  <div class="form-group col-md-12">
                    <div class="form-control col-md-11 main_menu">
                    <form action="/feed" method="post" class="form">
                    {{csrf_field()}}
                      <input type="hidden" name="url" value="https://thehalloweenspirit.com">
                      <a href="javascript:void(0)" class="sidenav_link">https://thehalloweenspirit.com</a>
                    </form>
                    <form action="/feed" method="post" class="form">
                    {{csrf_field()}}
                      <input type="hidden" name="url" value="https://schoolofpets.com">
                      <a href="javascript:void(0)" class="sidenav_link">https://schoolofpets.com</a>
                    </form>
                      <a href="#" class="sidenav_link">https://thepetschool.com</a>
                      <a href="#" class="sidenav_link">https://thepetschool.com</a>
                      <a href="#" class="sidenav_link">https://thepetschool.com</a>
                    </div>
                  </div>
              </div>
            </li>
       </ul>
    </div>
  </div>

    <!-- Sidebar Ends-->

    <!-- Main Body -->

  <div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
          <div class="page-header-title">
                <h4>Feeds</h4>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <!-- Documents card start -->
                <div class="col-md-12 col-xl-12">
                @if(!empty($data))
                  @if (empty($data['items']))
                      <div class="alert">
                        {{('Please Enter a valid URL')}} 
                      </div>
                  @else
                      @php
                          $i = 0;
                      @endphp
                      <div class="accordion md-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      @foreach ($data['items'] as $item)
                            <!-- <div class="item"> -->
                                <div class="cardclient-blocks dark-primary-border">
                                  <div class="card-header" role="tab" id="heading-{{$i}}">
                                      <a data-parent="#accordion" data-toggle="collapse" href="{{ $item->get_permalink() }}" aria-expanded="true" aria-controls="collapse{{$i}}">
                                        <h5 class="mb-0">{{ $item->get_title() }}</h5>
                                      </a>
                                  </div>

                                  <div id="collapse{{$i}}" class="collapse show" role="tabpanel" aria-labelledby="heading-{{$i}}" data-parent="#accordion">
                                    <div class="card-body">
                                      <p>{!! $item->get_content() !!}</p>
                                      <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
                                    </div>
                                  </div>
                                </div>
                                @php 
                                  $i++;
                              @endphp
                      @endforeach
                              </div>
                      @endif
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Main Body -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/feed.js') }}" defer></script>
</body>
</html>
