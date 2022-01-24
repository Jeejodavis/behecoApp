<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://foliotek.github.io/Croppie/croppie.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/innerpages/innerpages.css') }}" type="text/css" rel="stylesheet">
    
    <script src="{{ asset('js/jquery3.5.1/jquery.min.js') }}"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Beheco | Home</title>
</head>

<body>
    <!-- <div class="loader">
        <div class="loader-content">
        </div>
    </div> -->
    <!-- -----------------------------------------------------------------Navbar------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg nb fixed-top">
        <div class="top-menu">
            <div class="container">
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
                                <a href="" class="name-link  ">Download App</a>
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
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="{{ asset('images/svg/menu_icon.svg') }}" alt=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown media-hide">
                        <div class="mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                                <i class="fas fa-chevron-down on-h"></i>
                            </a>
                            <div class="dropdown-content">
                                <div class="content">
                                    <div class="row">
                                        <?php $catCount = count($categories); ?>
                                        @foreach ($categories as $catKey => $category)
                                            @if ($catKey == 0 || (($catKey-1) > 0 && ($catKey-1)%7 == 0))
                                            <div class="col-xl-4">
                                                <div class="column">
                                            @endif
                                            <?php $encodeId = base64_encode($category->id); ?>
                                                    <a href="{{ url('/search-results?category='.$encodeId) }}">{{ $category->category_name }}</a>
                                            @if (($catKey != 0 && $catKey%7 == 0) || $catKey+1 == $catCount)
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item media-show">
                        <a class="nav-link" aria-current="page" href="#" data-bs-toggle="modal"
                            data-bs-target="#advertise">Advertise Here</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/offers') }}">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @auth
                        <div class="signin-box">
                            <div class="dropdown">
                                <button class="btn btn-user dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="img-wrapper">
                                        @if (!empty( auth()->user()->profile_img ))
                                            <img src="{{ asset('images/user/'. auth()->user()->id . '/profile/'.auth()->user()->profile_img) }}"
                                            alt="user-icon">
                                        @else
                                            <img src="{{ asset('images/svg/user.svg') }}" alt="user-icon">
                                        @endif
                                    </div>
                                    <span>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
                                    <span>
                                        <p class="badge bg-primary">New</p>
                                    </span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item flx-v-cntr" href="#">
                                            <div class="content-count">
                                                <span>Notifications</span>
                                                <span>
                                                    <h6 class="badge bg-primary">1</h6>
                                                </span>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="#">Saved Items</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                            <button class="btn btn-black" data-bs-toggle="modal" data-bs-target="#newListing"><img
                            src="{{ asset('images/svg/plus-icon.svg') }}" alt="plus-icon"><span>Add
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
        </div>
    </nav>

    <meta name="csrf-token" content="{{ csrf_token() }}">