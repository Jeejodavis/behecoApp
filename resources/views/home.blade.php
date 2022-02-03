
    @include('includes.header')

    <!-- -----------------------------------------------------------------Banner------------------------------------------------------------------>
    <section class="banner flx-v-cntr gs_reveal">
        <div class="container">
            <div class="search-bar-container">
                <div class="content">
                    <h2>Discover your</h2>
                    <h1 class="gs_reveal title-animate">
                        Amazing </h1>
                    <p class="gs_reveal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    <form id="searchForm" method="get" action="search-results">
                        <div class="search-bar">
                            <div class="row">
                                <div class="col-xl-5 col-md-5">
                                    <select class="form-selectdrpdown select2 js" name="city" aria-label="Default select example"
                                        data-live-search="true" required>
                                        <option value="{{ base64_encode(0) }}" selected>Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ base64_encode($city->id) }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-7 col-md-7">
                                    <div class="mb-3">
                                        <div class="search-bar-section">
                                            <input type="text" class="form-control" name="keyword" placeholder="Search Something" required>
                                            <button type="submit" class="btn btn-primary">
                                                <i class=" fas fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Categories------------------------------------------------------------->
    <section class="categories gs_reveal">
        <div class="container">
            <h2 class="common-h2">Find your <span>Needs</span> with ease!</h2>
            <div class="category-wrapper">
                <div class="category-row gs_reveal">
                    @foreach ($categories as $key => $category)
                        @if ($key == 18)
                        <div class="collapse w-100" id="collapseExample">
                        <div class="w-100 d-flex flex-wrap justify-content-center">
                        @endif
                        <?php $encodeId = base64_encode($category->id); ?>
                        <a href="{{ url('/search-results?category='.$encodeId) }}" class="category c1">
                            <div class="icon">
                                <img src="{{ asset('images/svg/categories/'.$category->icon) }}" alt="Emergency-Services">
                            </div>
                            <div class="heading">
                                <p>{!! str_contains($category->category_name, '&') ? str_replace('& ', "&<br>", $category->category_name) : str_replace(' ', "<br>", $category->category_name) !!}</p>
                            </div>
                        </a>
                        @if ($key >= 18 && $key+1 == count($categories))
                        </div>
                        </div>
                        <a class="text-primary fw-bold mt-2 w-100 text-center" data-bs-toggle="collapse"
                        href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        View More
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Featured------------------------------------------------------------->
    <section class="featured slider-wrapper gs_reveal">
        <div class="container">
            <div class="hs__header">
                <h2 class="hs__headline gs_reveal">Featured
                </h2>
                <div class="navigation-btns hs__arrows gs_reveal">
                    @if (count($featuredBusiness) > 3)
                        <button type="button" class="btn btn-secondary arrow disabled arrow-prev mgn-rgt-20">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                                style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                                <path id="Path_30" class="arrow-prev"
                                    d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                            </svg>
                        </button>
                        <button htype="button" class="btn btn-primary arrow arrow-next" aria-label="Next">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                                style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                                <path id="Path_30" class="arrow-next"
                                    d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
            <div class="hs__wrapper">
                <ul class="hs" style="float: left;">
                    @foreach ($featuredBusiness as $featured)
                        <li class="hs__item gs_reveal">
                            <div class="content-box">
                                <div class="image-wrapper">
                                    @if (!empty($featured['profile_photo']))
                                        <img src="{{ asset('images/business/' . $featured['id'] . '/' . $featured['profile_photo']) }}" alt="image">
                                    @else
                                        <img src="{{ asset('images/default-business.png') }}" alt="image">
                                    @endif
                                </div>
                                <div class="txt-section">
                                    <div class="flex-container top-section">
                                        <h5>{{ $featured['business_name'] }}</h5>
                                        <div class="right-align">
                                            <a href=""><i class="fas fa-heart"></i></a>

                                        </div>

                                    </div>
                                    <p>{{ $featured['category'] }}</p>
                                    <p>{{ $featured['city'] . ', ' . $featured['state'] }}</p>
                                    <div class="flex-container bottom-section">
                                        <div class="btn-warpper">
                                            <a href="detail/{{ $featured['id'] }}" type="button" class="btn btn-view-more">View More</a>
                                        </div>
                                        <div class="overall-rating">
                                            @if ($featured['rating'] == 0)
                                                <i class="far fa-star"></i>
                                            @elseif ($featured['rating'] > 4.6)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="fas fa-star-half-alt"></i>
                                            @endif
                                            <p>{{ $featured['rating'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Counter------------------------------------------------------------->
    <div class="bg-pad"></div>
    <section class="counter">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <div class="text-wrapper gs_reveal">
                                <h4>10,000+</h4>
                                <p>Facilities Listed</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="text-wrapper gs_reveal">
                                <h4>200K+</h4>
                                <p>Users</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="text-wrapper gs_reveal">
                                <h4>2000+</h4>
                                <p>Featured Listings</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgn-top-30">
                        <button type="button" class="btn btn-view-all gs_reveal">List Your Business Now</button>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <img src="{{ asset('images/svg/counter-banner.svg') }}" class="media-show" alt="statistics-image">
                </div>
            </div>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Near You------------------------------------------------------------->
    <section class="near-you slider-wrapper gs_reveal">
        <div class="container">
            <div class="hs__header">
                <h2 class="hs__headline common-h2 gs_reveal">Explore places <span>Near you</span>
                </h2>
                <div class="navigation-btns hs__arrows gs_reveal">
                    <button type="button" class="btn btn-secondary arrow disabled arrow-prev mgn-rgt-20">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                            style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                            <path id="Path_30" class="arrow-prev"
                                d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                        </svg>
                    </button>
                    <button htype="button" class="btn btn-primary arrow arrow-next" aria-label="Next">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                            style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                            <path id="Path_30" class="arrow-next"
                                d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="hs__wrapper">
                <ul class="hs">
                    <li class="hs__item gs_reveal">
                        <div class="content-box">
                            <div class="image-wrapper">
                                <img src="https://images.pexels.com/photos/2662116/pexels-photo-2662116.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                    alt="image">
                            </div>
                            <div class="txt-section">
                                <div class="flex-container top-section">
                                    <h5>This is a heading</h5>
                                    <div class="right-align">
                                        <a href=""><i class="fas fa-heart"></i></a>

                                    </div>

                                </div>
                                <p>Sub Heading</p>
                                <div class="flex-container bottom-section">
                                    <div class="btn-warpper">
                                        <button type="button" class="btn btn-view-more">View More</button>
                                    </div>
                                    <div class="overall-rating">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="hs__item gs_reveal">
                        <div class="content-box">
                            <div class="image-wrapper">
                                <img src="https://cdn.vox-cdn.com/thumbor/0pAzN6LdawcEO1pxZXy-78_VgVU=/7x0:633x417/1400x1050/filters:focal(7x0:633x417):format(jpeg)/cdn.vox-cdn.com/assets/1311169/mslogo.jpg"
                                    alt="image">
                            </div>
                            <div class="txt-section">
                                <div class="flex-container top-section">
                                    <h5>This is a heading</h5>
                                    <div class="right-align">
                                        <a href=""><i class="fas fa-heart"></i></a>

                                    </div>

                                </div>
                                <p>Sub Heading</p>
                                <div class="flex-container bottom-section">
                                    <div class="btn-warpper">
                                        <button type="button" class="btn btn-view-more">View More</button>
                                    </div>
                                    <div class="overall-rating">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="hs__item gs_reveal">
                        <div class="content-box">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/vg.jpg') }}" alt="image">
                            </div>
                            <div class="txt-section">
                                <div class="flex-container top-section">
                                    <h5>This is a heading</h5>
                                    <div class="right-align">
                                        <a href=""><i class="fas fa-heart"></i></a>

                                    </div>

                                </div>
                                <p>Sub Heading</p>
                                <div class="flex-container bottom-section">
                                    <div class="btn-warpper">
                                        <button type="button" class="btn btn-view-more">View More</button>
                                    </div>
                                    <div class="overall-rating">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="hs__item gs_reveal">
                        <div class="content-box">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/chera.jpg') }}" alt="image">
                            </div>
                            <div class="txt-section">
                                <div class="flex-container top-section">
                                    <h5>This is a heading</h5>
                                    <div class="right-align">
                                        <a href=""><i class="fas fa-heart"></i></a>

                                    </div>

                                </div>
                                <p>Sub Heading</p>
                                <div class="flex-container bottom-section">
                                    <div class="btn-warpper">
                                        <button type="button" class="btn btn-view-more">View More</button>
                                    </div>
                                    <div class="overall-rating">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="hs__item gs_reveal">
                        <div class="content-box">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/mun.jpg') }}" alt="image">
                            </div>
                            <div class="txt-section">
                                <div class="flex-container top-section">
                                    <h5>This is a heading</h5>
                                    <div class="right-align">
                                        <a href=""><i class="fas fa-heart"></i></a>

                                    </div>

                                </div>
                                <p>Sub Heading</p>
                                <div class="flex-container bottom-section">
                                    <div class="btn-warpper">
                                        <button type="button" class="btn btn-view-more">View More</button>
                                    </div>
                                    <div class="overall-rating">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="hs__item gs_reveal">
                        <div class="content-box">
                            <div class="image-wrapper">
                                <img src="{{ asset('images/chera.jpg') }}" alt="image">
                            </div>
                            <div class="txt-section">
                                <div class="flex-container top-section">
                                    <h5>This is a heading</h5>
                                    <div class="right-align">
                                        <a href=""><i class="fas fa-heart"></i></a>

                                    </div>

                                </div>
                                <p>Sub Heading</p>
                                <div class="flex-container bottom-section">
                                    <div class="btn-warpper">
                                        <button type="button" class="btn btn-view-more">View More</button>
                                    </div>
                                    <div class="overall-rating">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>4.6</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="center-align">
                <button type="button" class="btn btn-view-all gs_reveal">View All</button>
            </div>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Full screen ad---------------------------------------------------------->
    <section class="full-screen-ad  wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/2387873/pexels-photo-2387873.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/507410/pexels-photo-507410.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/3155666/pexels-photo-3155666.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Top Picks--------------------------------------------------------------->
    <section class="top-picks gs_reveal">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="top-pick-card tc1">
                        <div class="tpc1">
                            <div class="card-description">
                                <div class="text-portion">
                                    <h6 class="gs_reveal">Top Wedding Services</h6>
                                    <p class="gs_reveal">Wedding Dress, Bridal Makeup, Groom makeup, Wedding
                                        Photographers, Mehndi Artist,
                                        Wedding Sarees, Jewelleries</p>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="button" class="btn btn-white-outline gs_reveal">Explore Now</button>
                                </div>
                            </div>
                        </div>
                        <!-- -----------------------------------------------------------------SVG Filter------------------------------------------->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <filter id="svgfilter">
                                <feGaussianBlur stdDeviation="8" />
                                <!-- comment out feComponentTransfer to remove the darkness -->
                                <feComponentTransfer>
                                    <feFuncR type="linear" slope="0.9" />
                                    <feFuncG type="linear" slope="0.9" />
                                    <feFuncB type="linear" slope="0.9" />
                                </feComponentTransfer>
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="top-pick-card tc2">
                        <div class="tpc2">
                            <div class="card-description">
                                <div class="text-portion">
                                    <h6 class="gs_reveal">Top in Health & Fitness</h6>
                                    <p class="gs_reveal">Fitness Centres, Gym, Zumba Centres, Yoga Centres, Body Massage
                                        centres, Fitness
                                        Equipment and Accessories</p>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="button" class="btn btn-white-outline gs_reveal">Explore Now</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="top-pick-card tc3">
                        <div class="tpc3">
                            <div class="card-description">
                                <div class="text-portion">
                                    <h6 class="gs_reveal">Top in Travel & Tourism</h6>
                                    <p class="gs_reveal">Best Travel Agencies, Travel Packagers, Tours and Travels, Taxy
                                        Services, Vehicle
                                        Rental Services, Travel Consultancies</p>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="button" class="btn btn-white-outline gs_reveal">Explore Now</button>
                                </div>
                            </div>
                        </div>
                        <!-- -----------------------------------------------------------------SVG Filter------------------------------------------->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <filter id="svgfilter">
                                <feGaussianBlur stdDeviation="8" />
                                <!-- comment out feComponentTransfer to remove the darkness -->
                                <feComponentTransfer>
                                    <feFuncR type="linear" slope="0.9" />
                                    <feFuncG type="linear" slope="0.9" />
                                    <feFuncB type="linear" slope="0.9" />
                                </feComponentTransfer>
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="top-pick-card tc4">
                        <div class="tpc4">
                            <div class="card-description">
                                <div class="text-portion">
                                    <h6 class="gs_reveal">Top in Food & Beavarages</h6>
                                    <p class="gs_reveal">Restaurants, Hotels, Food Courts, Food Truck, Ice cream
                                        Parlours, Juice Parlours,
                                        Bakery, Cakes and Pastries,.....</p>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="button" class="btn btn-white-outline gs_reveal">Explore Now</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="top-pick-card tc5 ">
                        <div class="tpc5">
                            <div class="card-description">
                                <div class="text-portion">
                                    <h6 class="gs_reveal">Top in Room & Rentals</h6>
                                    <p class="gs_reveal">Flats, Apartments, Rental Buildings, Rental Homes, Houses,
                                        Hostels, Hotels, PGs,
                                        Resorts, Home Stay,...….</p>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="button" class="btn btn-white-outline gs_reveal">Explore Now</button>
                                </div>
                            </div>
                        </div>
                        <!-- -----------------------------------------------------------------SVG Filter------------------------------------------->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <filter id="svgfilter">
                                <feGaussianBlur stdDeviation="8" />
                                <!-- comment out feComponentTransfer to remove the darkness -->
                                <feComponentTransfer>
                                    <feFuncR type="linear" slope="0.9" />
                                    <feFuncG type="linear" slope="0.9" />
                                    <feFuncB type="linear" slope="0.9" />
                                </feComponentTransfer>
                            </filter>
                        </svg>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="top-pick-card tc6">
                        <div class="tpc6">
                            <div class="card-description">
                                <div class="text-portion">
                                    <h6 class="gs_reveal">Top in Healthcare</h6>
                                    <p class="gs_reveal">Hospitals, Clinics, Baby Care, Laboratories, Eye Care, Scanning
                                        Centres, Home
                                        Nursing Services, Home Care Services, ….</p>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="button" class="btn btn-white-outline gs_reveal">Explore Now</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <!-- -----------------------------------------------------------------Full screen ad---------------------------------------------------------->
    <section class="full-screen-ad">
        <div id="carouselExampleDark1" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/2387873/pexels-photo-2387873.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/507410/pexels-photo-507410.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/3155666/pexels-photo-3155666.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark1"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark1"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- -------------------------------------------------------------------Suggestd Freelancers---------------------------------------------------------->
    <section class=" freelancers slider-wrapper gs_reveal">
        <div class="container">
            <div class="hs__header">
                <h2 class="hs__headline common-h2 gs_reveal">Suggested <span>Freelancers</span>
                </h2>
                <div class="navigation-btns hs__arrows">
                    @if (count($freelancers) > 3)
                        <button type="button" class="btn btn-secondary arrow disabled arrow-prev mgn-rgt-20">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                                style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                                <path id="Path_30" class="arrow-prev"
                                    d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                            </svg>
                        </button>
                        <button htype="button" class="btn btn-primary arrow arrow-next" aria-label="Next">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                                style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                                <path id="Path_30" class="arrow-next"
                                    d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
            <div class="hs__wrapper">
                <ul class="hs" style="float: left;">
                    @foreach($freelancers as $freelancer)
                        <li class="hs__item gs_reveal">
                            <a href="" class="content-box box-sm">
                                <div class="cover-image">
                                    @if (!empty($freelancer['cover_photo']))
                                        <img src="{{ asset('images/freelancer/' . $freelancer['id'] . '/' . $freelancer['cover_photo']) }}" alt="image">
                                    @else
                                        <img src="{{ asset('images/detail-cover.jpeg') }}" alt="image">
                                    @endif

                                </div>
                                <div class="profile-image">
                                    @if (!empty($freelancer['profile_photo']))
                                        <img src="{{ asset('images/freelancer/' . $freelancer['id'] . '/' . $freelancer['profile_photo']) }}" alt="image">
                                    @else
                                        <img src="{{ asset('images/default-business.png') }}" alt="image">
                                    @endif
                                    <button class="save-btn btn nopad">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                                <div class="freelancer-info">
                                    <div class="info-content">
                                        <div class="content">
                                            <h5>{{ $freelancer['freelancer_name'] }}</h5>
                                            <p>{{ $freelancer['category'] }}</p>
                                            <p>{{ $freelancer['city'] . ', ' . $freelancer['state'] }}</p>
                                            <div class="overall-rating">
                                                @if ($freelancer['rating'] == 0)
                                                    <i class="far fa-star"></i>
                                                @elseif ($freelancer['rating'] > 4.6)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                <p>{{ $freelancer['rating'] }}</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- <div class="center-align">
                <button type="button" class="btn btn-view-all gs_reveal">View All</button>
            </div> -->
        </div>
    </section>
    <!-- -----------------------------------------------------------------Full screen ad---------------------------------------------------------->
    <section class="full-screen-ad">
        <div id="carouselExampleDark2" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/2387873/pexels-photo-2387873.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/507410/pexels-photo-507410.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <a href="">
                        <img src="https://images.pexels.com/photos/3155666/pexels-photo-3155666.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Upcoming Events---------------------------------------------------------->
    <section class="upcoming-events gs_reveal">
        <div class="container">
            <h2 class="common-h2 gs_reveal">Upcoming <span>Events</span> Near you</h2>
            <div class="event-container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <a href="" class="event-card gs_reveal">
                            <div class="img-section event1">
                                <img src="{{ asset('images/cochin-carnival.png') }}" alt="cochin-carnival">
                            </div>
                            <div class="text-section">
                                <h5>Cochin Carnival 2022</h5>
                                <p class="nopad">Festive Event</p>
                                <div class="icon-text-container location-icon">
                                    <img src="{{ asset('images/svg/event-location.svg') }}" alt="icon">
                                    <p>Fort Kochi</p>
                                </div>
                                <div class="icon-text-container calendar-icon">
                                    <img src="{{ asset('images/svg/event-calendar.svg') }}" alt="icon">
                                    <p>25-Dec-2021 to 01-Jan-2022</p>
                                </div>
                                <div class="description-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco
                                        laboris nisi ut </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <a href="" class="event-card gs_reveal">
                            <div class="img-section event1">
                                <img src="{{ asset('images/cochin-carnival.png') }}" alt="cochin-carnival">
                            </div>
                            <div class="text-section">
                                <h5>Cochin Carnival 2022</h5>
                                <p class="nopad">Festive Event</p>
                                <div class="icon-text-container location-icon">
                                    <img src="{{ asset('images/svg/event-location.svg') }}" alt="icon">
                                    <p>Fort Kochi</p>
                                </div>
                                <div class="icon-text-container calendar-icon">
                                    <img src="{{ asset('images/svg/event-calendar.svg') }}" alt="icon">
                                    <p>25-Dec-2021 to 01-Jan-2022</p>
                                </div>
                                <div class="description-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco
                                        laboris nisi ut </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <a href="" class="event-card gs_reveal">
                            <div class="img-section event1">
                                <img src="{{ asset('images/cochin-carnival.png') }}" alt="cochin-carnival">
                            </div>
                            <div class="text-section">
                                <h5>Cochin Carnival 2022</h5>
                                <p class="nopad">Festive Event</p>
                                <div class="icon-text-container location-icon">
                                    <img src="{{ asset('images/svg/event-location.svg') }}" alt="icon">
                                    <p>Fort Kochi</p>
                                </div>
                                <div class="icon-text-container calendar-icon">
                                    <img src="{{ asset('images/svg/event-calendar.svg') }}" alt="icon">
                                    <p>25-Dec-2021 to 01-Jan-2022</p>
                                </div>
                                <div class="description-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco
                                        laboris nisi ut </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <a href="" class="event-card gs_reveal">
                            <div class="img-section event1">
                                <img src="{{ asset('images/cochin-carnival.png') }}" alt="cochin-carnival">
                            </div>
                            <div class="text-section">
                                <h5>Cochin Carnival 2022</h5>
                                <p class="nopad">Festive Event</p>
                                <div class="icon-text-container location-icon">
                                    <img src="{{ asset('images/svg/event-location.svg') }}" alt="icon">
                                    <p>Fort Kochi</p>
                                </div>
                                <div class="icon-text-container calendar-icon">
                                    <img src="{{ asset('images/svg/event-calendar.svg') }}" alt="icon">
                                    <p>25-Dec-2021 to 01-Jan-2022</p>
                                </div>
                                <div class="description-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco
                                        laboris nisi ut </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="center-align mgn-top-20 gs_reveal">
                <button type="button" class="btn btn-view-all">View All</button>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Coming Soon------------------------------------------------------------->
    <section class="coming-soon ">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="coming-soon-card gs_reveal">
                        <div class="content">
                            <h3>COMING SOON</h3>
                            <h6>Everything</h6>
                            <p>At Your <span>FINGERTIPS</span></p>
                            <p class="dload-app">Download <span>App</span></p>
                            <a href="" class="mgn-rgt-30">
                                <img src="{{ asset('images/svg/google_play.svg') }}" alt="play-store">
                            </a>
                            <a href="">
                                <img src="{{ asset('images/svg/app_store.svg') }}" alt="app-store">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="slider-content gs_reveal">
                        <div class="slider">
                            <div class="imgs">
                                <div class="img" style="left: 0;">

                                </div>
                                <div class="img">

                                </div>
                                <div class="img">

                                </div>
                                <div class="img">

                                </div>
                            </div>
                            <div class="dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Testimonials------------------------------------------------------------->
    <section class="testimonials slider-wrapper">
        <div class="container">
            <div class="hs__header ">
                <h2 class="hs__headline common-h2 gs_reveal">What others <span>say about Beheco</span>
                </h2>
                <div class="navigation-btns hs__arrows gs_reveal">
                    <button type="button" class="btn btn-secondary arrow disabled arrow-prev mgn-rgt-20">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                            style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                            <path id="Path_30" class="arrow-prev"
                                d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                        </svg>
                    </button>
                    <button htype="button" class="btn btn-primary arrow arrow-next" aria-label="Next">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.6 18.3"
                            style="enable-background:new 0 0 31.6 18.3;" xml:space="preserve" width="30px">

                            <path id="Path_30" class="arrow-next"
                                d="M22.5,0.7l-1.4,1.4l6.1,6.1H0.5v1.9h26.7l-6.1,6.1l1.4,1.4l8.4-8.4L22.5,0.7z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="hs__wrapper gs_reveal">
                <ul class="hs">
                    <li class="hs__item">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <img src="{{ asset('images/svg/quote.svg') }}" class="quote-icon">
                            </div>
                            <div class="auther-img">
                                <img src="https://i.pinimg.com/236x/77/fc/a9/77fca9754a11fbd15aee50d44bd317e9--doctor-of-dental-surgery-dental-services.jpg"
                                    class="auther-dp">
                            </div>
                            <div class="txt-section">
                                <p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="right-align">
                                    <h5>Sam Issac</h5>
                                    <p>Sr.Consultant, EY</p>
                                </div>
                            </div>
                    </li>
                    <li class="hs__item">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <img src="{{ asset('images/svg/quote.svg') }}" class="quote-icon">
                            </div>
                            <div class="auther-img">
                                <img src="https://i.pinimg.com/236x/77/fc/a9/77fca9754a11fbd15aee50d44bd317e9--doctor-of-dental-surgery-dental-services.jpg"
                                    class="auther-dp">
                            </div>
                            <div class="txt-section">
                                <p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="right-align">
                                    <h5>Sam Issac</h5>
                                    <p>Sr.Consultant, EY</p>
                                </div>
                            </div>
                    </li>
                    <li class="hs__item">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <img src="{{ asset('images/svg/quote.svg') }}" class="quote-icon">
                            </div>
                            <div class="auther-img">
                                <img src="https://i.pinimg.com/236x/77/fc/a9/77fca9754a11fbd15aee50d44bd317e9--doctor-of-dental-surgery-dental-services.jpg"
                                    class="auther-dp">
                            </div>
                            <div class="txt-section">
                                <p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="right-align">
                                    <h5>Sam Issac</h5>
                                    <p>Sr.Consultant, EY</p>
                                </div>
                            </div>
                    </li>
                    <li class="hs__item">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <img src="{{ asset('images/svg/quote.svg') }}" class="quote-icon">
                            </div>
                            <div class="auther-img">
                                <img src="https://i.pinimg.com/236x/77/fc/a9/77fca9754a11fbd15aee50d44bd317e9--doctor-of-dental-surgery-dental-services.jpg"
                                    class="auther-dp">
                            </div>
                            <div class="txt-section">
                                <p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="right-align">
                                    <h5>Sam Issac</h5>
                                    <p>Sr.Consultant, EY</p>
                                </div>
                            </div>
                    </li>
                    <li class="hs__item">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <img src="{{ asset('images/svg/quote.svg') }}" class="quote-icon">
                            </div>
                            <div class="auther-img">
                                <img src="https://i.pinimg.com/236x/77/fc/a9/77fca9754a11fbd15aee50d44bd317e9--doctor-of-dental-surgery-dental-services.jpg"
                                    class="auther-dp">
                            </div>
                            <div class="txt-section">
                                <p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="right-align">
                                    <h5>Sam Issac</h5>
                                    <p>Sr.Consultant, EY</p>
                                </div>
                            </div>
                    </li>
                    <li class="hs__item">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <img src="{{ asset('images/svg/quote.svg') }}" class="quote-icon">
                            </div>
                            <div class="auther-img">
                                <img src="https://i.pinimg.com/236x/77/fc/a9/77fca9754a11fbd15aee50d44bd317e9--doctor-of-dental-surgery-dental-services.jpg"
                                    class="auther-dp">
                            </div>
                            <div class="txt-section">
                                <p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="right-align">
                                    <h5>Sam Issac</h5>
                                    <p>Sr.Consultant, EY</p>
                                </div>
                            </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Contact Form------------------------------------------------------------->
    <section class="contact-form">
        <div class="container">
            <h2 class="common-h2 gs_reveal">Personalised <span>Suggestions</span></h2>
            <div class="row">
                <div class="col-xl-7">
                    <div class="form-section gs_reveal">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your First Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter your Email (Optional)">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" placeholder="Enter your Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Write your Comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <button type="button" class="btn btn-view-all">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="faq gs_reveal">
                        <div class="content ">
                            <h5 class="gs_reveal">We're here to help</h5>
                            <p class="gs_reveal">Find clear FAQs online and customer service available at the end of the
                                phone seven days
                                a week</p>
                            <button type="button" class="btn btn-view-all gs_reveal"
                                onclick="location.href = 'faq.html'">View
                                More</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Subscribe Newsletter---------------------------------------------------->
    <section class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="img-container gs_reveal">
                        <img src="{{ asset('images/svg/subscribe.svg') }}" alt="subs-image">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="input-wrapper">
                        <h5 class="gs_reveal">Subscribe Our <span>Newsletter</span></h5>
                        <div class="newletter-input gs_reveal">
                            <input type="email" class="form-control" placeholder="Enter your email address">
                            <button type="button" class="btn btn-primary"><span class="media-hide">Subscribe</span><span
                                    class="media-show"><i class="fas fa-paper-plane"></i></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Popular Content--------------------------------------------------------->
    <section class="popular-content">
        <div class="container">
            <h5 class="gs_reveal">Popular Links</h5>
            <p class="gs_reveal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor
                sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
            </p>
            <h5 class="gs_reveal">Popular Cities</h5>
            <p class="gs_reveal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor
                sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
            </p>
            <h5 class="gs_reveal">Popular searches</h5>
            <p class="gs_reveal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor
                sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
            </p>
        </div>
    </section>
    

    @include('includes.footer')
