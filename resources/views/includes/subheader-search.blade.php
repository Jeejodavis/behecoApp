<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/innerpages/innerpages.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/jquery3.5.1/jquery.min.js') }}"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <title>Beheco | Search Results</title>
</head>

<body>
    <!-- -----------------------------------------------------------------Navbar------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg inner-nb results-page nb fixed-top">
        <div class="top-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-sm-7">
                        <div class="left-portion">
                            <div class="phone">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <a href="">+91 1800 234 567</a>
                            </div>
                            <div class="email">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="">mail@beheco.in</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-sm-5">
                        <div class="right-portion ml-auto">
                            <div class="common-links">
                                <a href="" data-bs-toggle="modal" data-bs-target="#advertise"><span
                                        class="badge bg-primary">Advertise Here</span></a>
                                <div class="separator  "></div>
                                <a href="{{ url('/careers') }}" class="name-link  ">Careers</a>
                                <div class="separator name-link  "></div>
                                <a href="{{ url('/help') }}" class="name-link  ">Help</a>
                                <div class="separator name-link  "></div>
                                <a href="popup.html" class="name-link  ">Download App</a>
                                <div class="separator name-link  "></div>
                            </div>
                            <div class="social-links  ">
                                <a href="" class="icon fb">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="" class="icon tw">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="" class="icon insta">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="" class="icon tw">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="{{ asset('images/svg/menu_icon.svg') }}" alt=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form id="searchForm" method="get" action="search-results">
                    <div class="search-bar ms-auto me-auto media-hide">
                        <div class="content">
                            <select class="form-select select2 js" aria-label="Default select example" name="city">
                                <option value="{{ base64_encode(0) }}" 
                                @if ($selected_city == 0)
                                    selected
                                @endif 
                                >City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ base64_encode($city->id) }}" 
                                    @if ($selected_city == $city->id) 
                                        selected
                                    @endif 
                                    >{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" name="keyword" placeholder="Search Something" value="{{ $selected_keyword }}">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div class="d-flex">
                    @auth
                        <div class="signin-box">
                            <div class="dropdown">
                                <button class="btn btn-user dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="img-wrapper">
                                        @if (!empty(auth()->user()->profile_img))
                                            <img src="{{ asset('images/user/'. auth()->user()->id . '/profile/'.auth()->user()->profile_img) }}"
                                            alt="user-icon">
                                        @else
                                            <img src="{{ asset('images/svg/user.svg') }}" alt="user-icon">
                                        @endif
                                    </div>
                                    <span>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
                                    <!-- <span>
                                        <p class="badge bg-primary">New</p>
                                    </span> -->
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item flx-v-cntr" href="{{ url('/profile#notifications') }}">
                                            <div class="content-count">
                                                <span>Notifications</span>
                                                <!-- <span>
                                                    <h6 class="badge bg-primary">1</h6>
                                                </span> -->
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="{{ url('/profile#savedItems') }}">Saved Items</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-black" data-bs-toggle="modal" data-bs-target="#newListing"><img src="{{ asset('images/svg/plus-icon.svg') }}" alt="plus-icon"><span>Add
                            Free Listing</span></button>
                    @endauth
                    @guest
                        <div class="signin-box">
                            <div class="dropdown">
                                <button class="btn btn-user" type="button" data-bs-toggle="modal" data-bs-target="#SignIn">
                                    <div class="img-wrapper">
                                        <img src="{{ asset('images/svg/user.svg') }}" alt="user-icon">
                                    </div>
                                    <span>Signin / Register</span>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-black" type="button" data-bs-toggle="modal" data-bs-target="#SignIn"><img
                            src="{{ asset('images/svg/plus-icon.svg') }}" alt="plus-icon"><span>Add
                            Free Listing</span></button>
                    @endguest
                    
                </div>
            </div>
            <div class="search-bar responsive-search-bar media-show">
                <div class="content">
                    <form id="searchForm" method="get" action="search-results">
                        <select class="form-select select2 js" aria-label="Default select example">
                            <option value="{{ base64_encode(0) }}" 
                                    @if ($selected_city == 0)
                                        selected
                                    @endif 
                                    >City</option>
                            @foreach ($cities as $city)
                                <option value="{{ base64_encode($city->id) }}" 
                                @if ($selected_city == $city->id) 
                                    selected
                                @endif 
                                >{{ $city->city_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" name="keyword" placeholder="Search Something" value="{{ $selected_keyword }}">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <meta name="csrf-token" content="{{ csrf_token() }}">