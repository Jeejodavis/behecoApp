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
                                        <div class="col-xl-4">
                                            <div class="column">
                                                <a href="#">Emergency
                                                    Services</a>
                                                <a href="#">Food &
                                                    Beverages</a>
                                                <a href="#">Rooms &
                                                    Rentals</a>
                                                <a href="#">Professionals</a>
                                                <a href="#">Experts</a>
                                                <a href="#">Healthcare</a>
                                                <a href="#">Public
                                                    Places</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="column">
                                                <a href="#">Home &
                                                    Office</a>
                                                <a href="#">Automobile</a>
                                                <a href="#">Educational
                                                    Institutions</a>
                                                <a href="#">Financial
                                                    institutions</a>
                                                <a href="#">Dress &
                                                    Accessories</a>
                                                <a href="#">Travel &
                                                    Tourism</a>
                                                <a href="#">Wedding &
                                                    Events</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="column">
                                                <a href="#">Electronics</a>
                                                <a href="#">Retail &
                                                    Wholesale</a>
                                                <a href="#">Media &
                                                    Entertainment</a>
                                                <a href="#">Telecom</a>
                                                <a href="#">Construction</a>
                                                <a href="#">Sports</a>
                                                <a href="#">Health &
                                                    Fitness</a>
                                            </div>
                                        </div>
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
                        <a class="nav-link" href="offers.html">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="signin-box">
                        <div class="dropdown">
                            <button class="btn btn-user" type="button" data-bs-toggle="modal" data-bs-target="#SignUp">
                                <div class="img-wrapper">
                                    <img src="{{ asset('images/svg/user.svg') }}" alt="user-icon">
                                </div>
                                <span>Signin / Register</span>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-black" data-bs-toggle="modal" data-bs-target="#newListing"><img
                            src="{{ asset('images/svg/plus-icon.svg') }}" alt="plus-icon"><span>Add
                            Free Listing</span></button>
                </div>
            </div>
        </div>
    </nav>