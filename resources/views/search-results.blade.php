    
    @include('includes.subheader-search')

    <style type="text/css">
        a.disabled {
          pointer-events: none;
          cursor: default;
        }
    </style>
    
    <!------------------------------------------------------------------Inner-Page Banner------------------------------------------------------->
    <section class="mini-banner" id="bannerSection">
        <div class="slider">
            <a href=""><img src="{{ asset('images/Image 7.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 8.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 13.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 7.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 8.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 13.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 7.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 8.png') }}" /></a>
            <a href=""><img src="{{ asset('images/Image 13.png') }}" /></a>
        </div>
    </section>
    <!------------------------------------------------------------------Inner-Page Banner------------------------------------------------------->
    <section class="results-content" id="listContent">
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
                                        <input type="text" class="form-control" id="search_city" placeholder="Search City">
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
                                                    <input class="form-check-input filterCheckbox" name="cityCheckbox" type="checkbox" value="{{ $city->id }}"
                                                        id="city_{{ $city->id }}">
                                                    <label class="form-check-label" id="city_label" for="city_{{ $city->id }}">{{ $city->city_name }}</label>
                                                </div>
                                                <div class="count">
                                                    <p>({{ $city->user_business_count }})</p>
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
                                        <input type="text" class="form-control" id="search_category" placeholder="Search Category">
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
                                                <p>({{ $category->user_business_count }})</p>
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
                                    Sub Categories
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <div class="search-bar">
                                        <input type="text" class="form-control" id="search_subcategory" placeholder="Search Sub Category">
                                        <button type="button" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <div class="option-wrapper" id="subcategoryContent">
                                        <?php $subcategoryCount = count($subcategories); ?>
                                        @foreach ($subcategories as $sKey => $subcategory)
                                            @if ($sKey == 6)
                                            <div class="collapse w-100" id="subcategoryCollapse">
                                            @endif
                                            <div class="clearfix subcategory_div">
                                                <div class="form-check">
                                                    <input class="form-check-input filterCheckbox" name="subcategoryCheckbox" type="checkbox" value="{{ $subcategory->id }}"
                                                        id="subcategory_{{ $subcategory->id }}">
                                                    <label class="form-check-label" id="subcategory_label" for="subcategory_{{ $subcategory->id }}">
                                                        {{ $subcategory->subcategory_name }}
                                                    </label>
                                                </div>
                                                <div class="count">
                                                    <p>({{ $subcategory->user_business_count }})</p>
                                                </div>
                                            </div>
                                            @if ($sKey >= 6 && $sKey+1 == $subcategoryCount)
                                            </div>
                                            <a class="text-primary exptBtn fw-bold mt-2 w-100 text-center" data-bs-toggle="collapse"
                                            href="#subcategoryCollapse" role="button" aria-expanded="false" aria-controls="subcategoryCollapse">View More</a>
                                            @endif
                                        @endforeach
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Data</span>
                                </li>
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
                                <div class="listing-wrapper" id="businessList">
                                    @if (count($businesses) > 0)
                                        @foreach ($businesses as $business)
                                        <a href="{{ url('/detail/'.  base64_encode($business['id'])) }}" class="listing-card">
                                            <div class="content">
                                                <div class="image-wrapper">
                                                    @if (!empty($business['profile_photo']))
                                                        <img src="{{ asset('images/business/' . $business['id'] . '/' . $business['profile_photo']) }}"
                                                        alt="profile-image">
                                                    @else
                                                        <img src="{{ asset('images/default-business.png') }}" alt="profile-image">
                                                    @endif
                                                    <!-- <img src="https://images.pexels.com/photos/1020016/pexels-photo-1020016.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="image"> -->
                                                </div>
                                                <div class="txt-section">
                                                    <div class="flex-container top-section">
                                                        <h5>{{ $business['business_name'] }}</h5>
                                                        <div class="right-align">
                                                            <button class="btn btn-save"><i
                                                                    class="fas fa-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="flex-container bottom-section">
                                                        <div class="btn-warpper">
                                                            <p>{{ $business['category'] }}</p>
                                                            <p>{{ $business['city'] }}, {{ $business['state'] }}</p>
                                                        </div>
                                                        @if (!empty($business['rating']['rating_avg'] ))
                                                            <div class="overall-rating">
                                                                @if ($business['rating']['rating_avg'] > 4.6)
                                                                    <i class="fas fa-star"></i>
                                                                @else
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                @endif
                                                                <p>{{ $business['rating']['rating_avg'] }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    @else
                                        <span>No Data Found!</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="right-align pagination-wrapper">
                                    @if ($businessCount > 12)
                                        <div class="pagination mgn-btm-30">
                                            <?php
                                            $businessPages = ceil($businessCount/12);
                                            ?>
                                            <input type="hidden" id="current" value="1">
                                            <a class="prev page-numbers disabled" id="busPrev"><i
                                                    class="fas fa-angle-double-left"></i>
                                                <span>Prev</span></a>
                                            @for ($i=1; $i<=$businessPages; $i++)
                                                <a class="page-numbers bus_pages {{ $i==1 ? 'current disabled' : '' }}" id="busPage_{{ $i }}" >{{ $i }}</a>
                                            @endfor
                                            <a class="next page-numbers" id="busNext"><span>Next</span> <i
                                                    class="fas fa-angle-double-right"></i></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
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
                                <?php $relCount = count($relatedSearches); ?>
                                @foreach($relatedSearches as $relKey => $related)
                                    @if ($relKey == 0 || (($relKey-1) > 0 && ($relKey-1)%5 == 0))
                                    <div class="col-xl-3 col-md-6">
                                        <div class="keyword-wrapper">
                                            <ul class="common-ul">
                                    @endif
                                            <?php $encodeId = base64_encode($related->id); ?>
                                                <li><a href="{{ url('/search-results?subcategory='.$encodeId) }}">{{ $related->subcategory_name }}</a></li>

                                    @if (($relKey != 0 && $relKey%5 == 0) || $relKey+1 == $relCount)
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
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

    <script src="{{ asset('js/slick.js') }}"></script>
    
    <script type="text/javascript">
        var base_url = '<?= url('/'); ?>';
        var businessPages = '<?= ceil($businessCount/12) ?>';
        var city = '<?= $selected_city ?>';
        var keyword = '<?= $selected_keyword ?>';
    </script>
    <script src="{{ asset('js/custom/list.js') }}"></script>
    @include('includes.footer')