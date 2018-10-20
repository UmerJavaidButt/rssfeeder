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
    <link href="{{ asset('css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('icofont/css/icofont.css') }}" rel="stylesheet">

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

    <!-- Main Body -->
    <div class="main-body">
        <div class="page-wrapper page_wrapper">

            <div class="page-header text-center">
                <h2>Manage Account</h2>
            </div>
            
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row justify-content-center">
                  <div class="col-md-8 offset-md-2">
                    <!-- Image upload card start -->
                    <div class="card upload_image_card">
                        <div class="card-header">
                            <h5>Settings</h5>
                        </div>
                        <div class="card-block">
                            <form method="post" action="{{url('account_settings')}}" id="update_user_settings">
                            {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Update Name') }}</label>

                                    <div class="col-md-7">
                                        <input id="name" placeholder="Name e.g John Doe" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="old_password" class="col-md-3 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="old_password" placeholder="Type Password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" autofocus>

                                       @if ($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Update Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="password" placeholder="Type Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autofocus>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('confirmpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="confirmpassword" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="confirmpassword" placeholder="Type Password" type="password" class="form-control{{ $errors->has('confirmpassword') ? ' is-invalid' : '' }}" name="confirmpassword">

                                        @if ($errors->has('confirmpassword'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('confirmpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Kindly choose a Profile Picture') }}</label>

                                    <div class="col-md-7">
                                    <input type="file" name="image" id="filer_input" multiple="multiple">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-7">
                                        <button class="btn btn_submit" onClick="validatePassword();">
                                            {{ __('Update Settings') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- Image upload card end -->
                  </div>
                </div>
            </div>
            <!-- Page-body end -->
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
    
    <script src="{{ asset('js/feed.js') }}"></script>


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
    <script>
    function rateProduct(item_id){
        var value =1 ;
        var pre_value = $('#rating'+item_id).data('value');
        if(pre_value == 1){
            $('#rating'+item_id).html('<i class="fa fa-star-o"></i>')
            value =0;
        }
        else{
            $('#rating'+item_id).html('<i class="fa fa-star"></i>')
        }
        $('#rating'+item_id).data('value', value);
        $.ajax({
            type: "GET",
            url: '/rate_product/'+item_id+'/'+value,
            success: function( msg ) {
                alert('Status Changed')
            }
        });
    }

    function validatePassword() {
        var validator = $("#update_user_settings").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            alert('Sucess');
        }
    }
    </script>
</body>
</html>
