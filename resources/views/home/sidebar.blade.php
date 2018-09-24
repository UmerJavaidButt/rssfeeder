<html lang="en">

<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content="flat ui, admin , Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar/icofont.css')}}">

    
    <!-- color .css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sidebar/color-1.css')}}" id="color"/>
   </head>

<body>

<nav class="navbar header-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
            	<i class="ti-menu"></i>
            </a>
        </div>
    </div>
</nav>

<div class="main-menu">
    <div class="main-menu-header">
        <img class="img-40" src="{{asset('images/user.png')}}" alt="User-Profile-Image">
        <div class="user-details">
            <span>John Doe</span>
            <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
        </div>
    </div>

    <div class="main-menu-content">
        <ul class="main-navigation">
	        <li class="nav-title" data-i18n="nav.category.navigation">
	            <i class="ti-line-dashed"></i>
	            <span>Navigation</span>
	        </li>
            <li class="nav-item single-item">
                
            </li>
       </ul>
    </div>
</div>

<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
    	    <div class="page-header-title">
                <h4>Project Dashboard</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            //
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Project</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <!-- Documents card start -->
                <div class="col-md-12 col-xl-12">
                    <div class="card client-blocks dark-primary-border">
                        <div class="card-block">
                            <h5>New Documents</h5>
                            <ul>
                                <li>
                                    //
                                </li>
                                <li class="text-right">
                                    133
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- SideNavbar -->
    <!-- <div class="sidenav">
        <div class="search-container row">
            <form action="/feed" method="post">
            {{csrf_field()}}
                <div class="form-group col-md-12">
                        <input class="form-control" type="text" placeholder="https://example.com" name="url">
                </div>
            </form>

            <div class="form-group col-md-12">
              <div class="heading text-white"><strong>Subscribed URL's</strong></div>
              <div class="form-control col-md-11">
              <form action="/feed" method="post" class="form">
              {{csrf_field()}}
                <input type="hidden" name="url" value="https://thehalloweenspirit.com">
                <a href="javascript:void(0)" class="sidenav_link">https://thehalloweenspirit.com</a>
              </form>
                <a href="#" class="sidenav_link">https://thepetschool.com</a>
                <a href="#" class="sidenav_link">https://thepetschool.com</a>
                <a href="#" class="sidenav_link">https://thepetschool.com</a>
              </div>
            </div>
        </div>
    </div> -->

    <main class="py-4">

    <!-- @if(!empty($data))
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
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-{{$i}}">
                            <a data-parent="#accordion" data-toggle="collapse" href="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
                              <h5 class="mb-0">{{ $item->get_title() }}</h5>
                            </a>
                        </div>

                        <div id="collapse{{$i}}" class="collapse" role="tabpanel" aria-labelledby="heading-{{$i}}" data-parent="#accordion">
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
    </main> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/sidebar/jquery-ui.min.js') }}" defer></script>

<!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('js/sidebar/jquery.slimscroll.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('js/sidebar/scsript.js') }}" defer></script>


</body>
</html>