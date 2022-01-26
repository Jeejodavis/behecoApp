@include('includes.header')


<!------------------------------------------------------------------Inner-Page Banner------------------------------------------------------->
    <section class="offer-banner">
        <div class="slider">
            <a href=""><img src="assets/images/Image 7.png" /></a>
            <a href=""><img src="assets/images/Image 8.png" /></a>
            <a href=""><img src="assets/images/Image 13.png" /></a>
            <a href=""><img src="assets/images/Image 7.png" /></a>
            <a href=""><img src="assets/images/Image 8.png" /></a>
            <a href=""><img src="assets/images/Image 13.png" /></a>
            <a href=""><img src="assets/images/Image 7.png" /></a>
            <a href=""><img src="assets/images/Image 8.png" /></a>
            <a href=""><img src="assets/images/Image 13.png" /></a>
        </div>
    </section>
    <!------------------------------------------------------------------Inner-Page Banner------------------------------------------------------->
    <section class="results-content offers" id="offerContent">
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <div class="accordion no-bdr" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Select City
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="search-bar">
                                        <input type="text" class="form-control" placeholder="Search City" id="search_city">
                                        <button type="button" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <div class="option-wrapper">
                                        <?php $cityCount = count($cities); ?>
                                        @foreach ($cities as $cKey => $city)
                                            @if ($cKey == 6)
                                            <div class="collapse w-100" id="cityCollapse">
                                            @endif
                                            <div class="clearfix city_div">
                                                <div class="form-check">
                                                    <input class="form-check-input filterCheckbox" name="cityCheckbox" type="checkbox" value="{{ $city['id'] }}"
                                                        id="city_{{ $city['id'] }}">
                                                    <label class="form-check-label" id="city_label" for="city_{{ $city['id'] }}">{{ $city['city_name'] }}</label>
                                                </div>
                                                <div class="count">
                                                    <p>({{ $city['offer_count'] }})</p>
                                                </div>
                                            </div>
                                            @if ($cKey >= 6 && $cKey+1 == $cityCount)
                                            </div>
                                            <a class="text-primary exptBtn fw-bold mt-2 w-100 text-center" data-bs-toggle="collapse"
                                            href="#cityCollapse" role="button" aria-expanded="false" aria-controls="cityCollapse">View More</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    Categories
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="search-bar">
                                        <input type="text" class="form-control" placeholder="Search Category">
                                        <button type="button" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <?php $categoryCount = count($categories); ?>
                                    @foreach ($categories as $catKey => $category)
                                        @if ($catKey == 6)
                                        <div class="collapse w-100" id="categoryCollapse">
                                        @endif
                                        <div class="clearfix category_div">
                                            <div class="form-check">
                                                <input class="form-check-input filterCheckbox categoryCheckbox" name="categoryCheckbox" type="radio" name="flexRadioDefault" value="{{ $category->id }}" 
                                                    id="category_{{ $category->id }}">
                                                <label class="form-check-label" id="category_label" for="category_{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </label>
                                            </div>
                                            <div class="count">
                                                <p>({{ $category->offer_count }})</p>
                                            </div>
                                        </div>
                                        @if ($catKey >= 6 && $catKey+1 == $categoryCount)
                                        </div>
                                        <a class="text-primary exptBtn fw-bold mt-2 w-100 text-center" data-bs-toggle="collapse"
                                        href="#categoryCollapse" role="button" aria-expanded="false" aria-controls="categoryCollapse">View More</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    Discount
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">

                                    <div class="option-wrapper">
                                        <div class="clearfix">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault11">
                                                <label class="form-check-label" for="flexCheckDefault11">
                                                    Upto 20% OFF
                                                </label>
                                            </div>
                                            <div class="count">
                                                <p>(15559)</p>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault12">
                                                <label class="form-check-label" for="flexCheckDefault12">
                                                    Upto 40% OFF
                                                </label>
                                            </div>
                                            <div class="count">
                                                <p>(123)</p>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault13">
                                                <label class="form-check-label" for="flexCheckDefault13">
                                                    Upto 60% OFF
                                                </label>
                                            </div>
                                            <div class="count">
                                                <p>(1234)</p>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault14">
                                                <label class="form-check-label" for="flexCheckDefault14">
                                                    Upto 80% OFF
                                                </label>
                                            </div>
                                            <div class="count">
                                                <p>(15559)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFour">
                                    Sort By
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault10">
                                        <label class="form-check-label " for="flexRadioDefault10">
                                            Popularity
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault11" checked>
                                        <label class="form-check-label" for="flexRadioDefault11">
                                            Latest
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </nav>

            <!-- Page Content Holder -->
            <div class="container">
                <div id="content-section-wrapper">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Library</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                            </ol>
                        </nav>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="content-section">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="listing-wrapper" id="offerList">
                                    @if (count($offers) > 0)
                                        @foreach($offers as $ofKey => $offer)
                                            <a href="{{ url('detail/'.base64_encode($offer->business['id'])) }}" class="listing-card">
                                            <div class="content">
                                                <div class="image-wrapper">
                                                    <img src="{{ asset('images/business/' . $offer->business['id'] . '/offer/' . $offer->offer_image) }}" alt="image">
                                                </div>
                                                <div class="txt-section">
                                                    <div class="flex-container top-section">
                                                        <h5>{{ $offer->heading }}</h5>
                                                        <div class="right-align">
                                                            <button class="btn btn-save"><i
                                                                    class="fas fa-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="flex-container bottom-section">
                                                        <div class="btn-warpper">
                                                            <p>{{ $offer->business['business_name'] }}</p>
                                                            <p>{{ $offer->location }}</p>
                                                        </div>
                                                        <div class="overall-rating">
                                                            <img src="{{ asset('images/svg/offer.svg') }}" alt="offer-icon">
                                                            <p><b>{{ $offer->offer_amount }}% OFF</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        @endforeach
                                    @else
                                    No Offers are running
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="offer-ad-content">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div id="carouselExampleInterval1" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="3000">
                                                <a href=""><img
                                                        src="https://images.pexels.com/photos/2292953/pexels-photo-2292953.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                                        class="d-block w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="3000">
                                                <a href=""><img
                                                        src="https://images.pexels.com/photos/1114376/pexels-photo-1114376.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                                        class="d-block w-100" alt="..."></a>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="3000">
                                                <a href=""><img
                                                        src="https://images.pexels.com/photos/1086711/pexels-photo-1086711.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                                        class="d-block w-100" alt="..."></a>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleInterval1" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleInterval1" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-12">
                                <div class="right-align pagination-wrapper">
                                    <div class="pagination mgn-btm-30">
                                        <a class="prev page-numbers " href="javascript:;"><i
                                                class="fas fa-angle-double-left"></i>
                                            <span>Prev</span></a>
                                        <span aria-current="page" class="page-numbers current">1</span>
                                        <a class="page-numbers" href="javascript:;">2</a>
                                        <a class="page-numbers" href="javascript:;">3</a>
                                        <a class="page-numbers" href="javascript:;">4</a>
                                        <a class="page-numbers" href="javascript:;">5</a>
                                        <a class="page-numbers" href="javascript:;">6</a>
                                        <a class="page-numbers" href="javascript:;">7</a>
                                        <a class="page-numbers" href="javascript:;">8</a>
                                        <a class="page-numbers" href="javascript:;">9</a>
                                        <a class="page-numbers" href="javascript:;">10</a>
                                        <a class="next page-numbers" href="javascript:;"><span>Next</span> <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <nav class="navbar navbar-default">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>
                        </nav>
                        <div class="related-search">
                            <h3>Related <span>Searches</span></h3>
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="keyword-wrapper">
                                        <ul class="common-ul">
                                            <li><a href="">Flats in Kochi</a></li>
                                            <li><a href="">Apartments in Kochi</a></li>
                                            <li><a href="">Flat Rent in Kochi</a></li>
                                            <li><a href="">Hostels for Boys</a></li>
                                            <li><a href="">Hostels for Girls</a></li>
                                            <li><a href="">Paying Guest</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="keyword-wrapper">
                                        <ul class="common-ul">
                                            <li><a href="">Flats in Kochi</a></li>
                                            <li><a href="">Apartments in Kochi</a></li>
                                            <li><a href="">Flat Rent in Kochi</a></li>
                                            <li><a href="">Hostels for Boys</a></li>
                                            <li><a href="">Hostels for Girls</a></li>
                                            <li><a href="">Paying Guest</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="keyword-wrapper">
                                        <ul class="common-ul">
                                            <li><a href="">Flats in Kochi</a></li>
                                            <li><a href="">Apartments in Kochi</a></li>
                                            <li><a href="">Flat Rent in Kochi</a></li>
                                            <li><a href="">Hostels for Boys</a></li>
                                            <li><a href="">Hostels for Girls</a></li>
                                            <li><a href="">Paying Guest</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="keyword-wrapper">
                                        <ul class="common-ul">
                                            <li><a href="">Flats in Kochi</a></li>
                                            <li><a href="">Apartments in Kochi</a></li>
                                            <li><a href="">Flat Rent in Kochi</a></li>
                                            <li><a href="">Hostels for Boys</a></li>
                                            <li><a href="">Hostels for Girls</a></li>
                                            <li><a href="">Paying Guest</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Popular Content--------------------------------------------------------->
    <section class="popular-content">
        <div class="container">
            <h5>Popular Links</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
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
            <h5>Popular Cities</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
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
            <h5>Popular searches</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
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

    <script type="text/javascript">
        var base_url = '<?= url('/'); ?>';
    </script>
    <script src="{{ asset('js/custom/offers.js') }}"></script>

    @include('includes.footer')