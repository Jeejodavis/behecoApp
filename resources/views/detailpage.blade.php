    
    @include('includes.header')

    <style type="text/css">
        a.disabled {
          pointer-events: none;
          cursor: default;
        }
    </style>

    <link rel='stylesheet' href="{{ asset('css/lightgallery.css') }}">


    <!------------------------------------------------------------------Profile Top------------------------------------------------------------------>
    <section class="profile">
        <div class="cover-bg">
            @if (!empty($detail->cover_photo))
                <img src="{{ asset('images/business/' . $detail->id . '/' . $detail->cover_photo) }}" alt="cover-img">
            @else
                <img src="{{ asset('images/detail-cover.jpeg') }}" alt="cover-img">
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="profile-pic">
                        @if (!empty($detail->profile_photo))
                            <img src="{{ asset('images/business/' . $detail->id . '/' . $detail->profile_photo) }}"
                            alt="profile-image">
                        @else
                            <img src="{{ asset('images/default-business.png') }}" alt="profile-image">
                        @endif
                    </div>
                    <div class="general-info">
                        <div class="title">
                            <h2>{{ $detail->business_name }}<i class="fas fa-check-circle"></i></h2>

                        </div>
                        <p>{{ $category }}</p>
                        <p>{{ $city }}, {{ $state }}</p>
                        <p>Year of established: {{ $detail->year_of_establishment }}</p>
                        <p>Founded By: {{ $detail->name_of_founder }}</p>
                        @if ($rating->count == 0)
                            <div class="overall-rating">
                                <i class="far fa-star"></i>
                                <h6><span>(0 Votes)</span></h6>
                            </div>
                        @else
                            <div class="overall-rating">
                                @if ($rating->rating_avg > 4.6)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="fas fa-star-half-alt"></i>
                                @endif
                                <h6>{{ $rating->rating_avg }} <span>({{ $rating->count }} Votes)</span></h6>
                            </div>
                        @endif
                        <div class="social-media">
                            <div class="social-links">
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
                        <a href="#rateMe" class="rate-me">
                            <div class="stars">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <h6>Rate Me</h6>
                        </a>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="quick-action-wrapper">
                        <a href="" class="phone media-show" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Phone">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                        <a href="" class="dir" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Direction">
                            <img src="{{ asset('images/svg/directions.svg') }}" alt="dir">
                        </a>
                        <a href="" class="wa" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Whatsapp">
                            <img src="{{ asset('images/svg/whatsapp.svg') }}" alt="whatsapp">
                        </a>
                        <a href="" class="email" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email">
                            <img src="{{ asset('images/svg/email.svg') }}" alt="email">
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="highlighted-content timing">
                                <div class="row">
                                    @if (!empty($detail->timing))
                                        <div class="col-xl-5 col-5">
                                            <p>Monday</p>
                                            <p>Tuesday</p>
                                            <p>Wednesday</p>
                                            <p>Thursday</p>
                                            <p>Friday</p>
                                            <p>Saturday</p>
                                            <p class="nopad"> Sunday</p>
                                        </div>
                                        <div class="col-xl-7 col-7">
                                            <div class="align-right">
                                                <p>{{ $detail->timing_value }}</p>
                                                <p>{{ $detail->timing_value }}</p>
                                                <p>{{ $detail->timing_value }}</p>
                                                <p>{{ $detail->timing_value }}</p>
                                                <p>{{ $detail->timing_value }}</p>
                                                <p>{{ $detail->timing == 1 ? 'Holiday' : $detail->timing_value }}</p>
                                                <p class="nopad">{{ $detail->timing == 3 ? $detail->timing_value : 'Holiday' }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="highlighted-content contact-links">
                                <div class="inner-link">
                                    <div class="text-section">
                                        <?php
                                            $phone = !empty($detail->office_number) ? explode(',', $detail->office_number) : [];
                                            $email = !empty($detail->email_id) ? explode(',', $detail->email_id) : [];
                                            $website = !empty($detail->website) ? explode(',', $detail->website) : [];
                                        ?>
                                        @foreach ($phone as $num)
                                            <a href="">{{ $num }}</a>
                                        @endforeach
                                    </div>
                                    <div class="icon-section">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                                <div class="inner-link">
                                    <div class="text-section">
                                        @foreach ($email as $mail)
                                            <a href="">{{ $mail }}</a>
                                        @endforeach
                                    </div>
                                    <div class="icon-section">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="inner-link">
                                    <div class="text-section">
                                        @foreach ($website as $web)
                                            <a href="">{{ $web }}</a>
                                        @endforeach
                                    </div>
                                    <div class="icon-section">
                                        <i class="fas fa-globe-asia"></i>
                                    </div>
                                </div>
                                <div class="inner-link">
                                    <div class="text-section">
                                        <p>{{ $detail->building . ', ' . ( !empty($detail->landmark) ? $detail->landmark . ', ' : '') . $detail->street . ', ' . $detail->area . ', ' . $city . ', ' . $state . ', ' . $detail->pincode }} </p>
                                    </div>
                                    <div class="icon-section location-icn">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="added-photos">
                <div class="demo-gallery">
                    <ul id="lightgallery" class="row">
                        @foreach ($photos as $key => $photo)
                            <li class="col-xl-2 col-md-4 col-sm-4 col-6" data-src="{{ asset('images/business/' . $photo->business_id . '/photos/' . $photo->photo) }}">
                                <a href="">
                                    <img class="img-responsive"
                                        src="{{ asset('images/business/' . $photo->business_id . '/photos/' . $photo->photo) }}">
                                    <div class="demo-gallery-poster">
                                        <img src="{{ asset('images/zoom.png') }}">
                                    </div>
                                </a>
                            </li>
                            @if ($key == 5)
                                @break;
                            @endif
                        @endforeach
                    </ul>
                    @if ($photoCount > 6)
                        <div class="collapse-container">
                            <p>
                                <button class="btn btn-view-more" type="button" data-bs-toggle="modal"
                                    data-bs-target="#galleryViewMore">
                                    View More
                                </button>
                            </p>

                        </div>
                    @endif
                </div>


            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about-card card-default">
                        <h3>ABOUT </h3>
                        <p>{{ $detail->about }}</p>
                        <!-- <p class="nopad">
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudexercitation
                                    ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit
                                    in
                                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                    laborum.
                                    Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet,
                                    consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut
                                    enim
                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo
                                    consequat. Duis aute irure.Lorem ipsum dolor sit amet.</p>

                            </div>
                        </div>
                        <a class="view-more-link" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            View More
                        </a>
                        </p> -->

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="slider-content offer-slider">
                        <div class="slider">
                            <div class="imgs">
                                @foreach ($offers as $ofKey => $offer)
                                    <img src="{{ asset('images/business/' . $offer->business_id . '/offer/' . $offer->offer_image) }}" class="img" data-bs-toggle="modal"
                                    data-bs-target="#offerModal_{{ $offer->id }}">
                                    </img>
                                @endforeach
                                <!-- <a href="" class="img" data-bs-toggle="modal" data-bs-target="#offerModal">
                                </a>
                                <a href="" class="img" data-bs-toggle="modal" data-bs-target="#offerModal">
                                </a>
                                <a href="" class="img" data-bs-toggle="modal" data-bs-target="#offerModal">
                                </a> -->
                            </div>
                            <div class="dots"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row eq-height">
                @if (count($headlines) > 0)
                @foreach ($headlines as $headline)
                    <div class="col-xl-6 col-lg-6">
                        <div class="card-default specialities-card">
                            <h3>{{ $headline['headline_name'] }}</h3>
                            <div class="row">
                                <div class="col-xxl-6">
                                    <ul>
                                        <li>
                                            <p>{{ $headline['content'] }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                @endif
                <!-- <div class="col-xl-6 col-lg-6">
                    <div class="card-default specialities-card">
                        <h3>departments</h3>
                        <div class="row">
                            <div class="col-xxl-6 ">
                                <ul>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xxl-6">
                                <ul>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div> -->
            </div>
            <div class="review-rating" id="rateMe">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="custom-hdng">
                            <h3>REVIEWS & Ratings</h3>
                            <div class="separator"></div>
                        </div>
                        <div class="filters">
                            <div class="radio-button">
                                <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                                <label class="btn btn-primary-check" for="option1">Popular</label>
                            </div>
                            <div class="radio-button">
                                <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                <label class="btn btn-primary-check" for="option2">Recent</label>
                            </div>
                            <div class="radio-button">
                                <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                                <label class="btn btn-primary-check" for="option3">Positive</label>
                            </div>
                            <div class="radio-button">
                                <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                                <label class="btn btn-primary-check" for="option4">Negative</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="current-overall-rating">
                                    @if ($rating->count == 0)
                                        <i class="far fa-star"></i>
                                    @elseif ($rating->rating_avg > 4.6)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="fas fa-star-half-alt"></i>
                                    @endif
                                    <h3>{{ $rating->rating_avg }}</h3>
                                </div>
                                <div class="rating-text-wrpper">
                                    <p>{{ $rating->count }} Ratings</p>
                                    <p>{{ $rating->review_count }} Reviews</p>
                                </div>
                            </div>
                            <?php
                            $fivePercentage = $fourPercentage = $threePercentage = $twoPercentage = $onePercentage = 0;
                            if ($rating->count != 0) {
                                $fivePercentage = ($rating->five_rating/$rating->count)*100;
                                $fourPercentage = ($rating->four_rating/$rating->count)*100;
                                $threePercentage = ($rating->three_rating/$rating->count)*100;
                                $twoPercentage = ($rating->two_rating/$rating->count)*100;
                                $onePercentage = ($rating->one_rating/$rating->count)*100;
                            }
                            ?>
                            <div class="col-xl-6 col-md-6">
                                <div class="rating-progress">
                                    <div class="rt-container">
                                        <div class="star-type">
                                            <p>5</p><i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="<?= 'width: ' . $fivePercentage . '%' ?>"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="star-count">
                                            <p>{{ $rating->five_rating }}</p>
                                        </div>
                                    </div>
                                    <div class="rt-container">
                                        <div class="star-type">
                                            <p>4</p><i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="<?= 'width: ' . $fourPercentage . '%' ?>"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="star-count">
                                            <p>{{ $rating->four_rating }}</p>
                                        </div>
                                    </div>
                                    <div class="rt-container">
                                        <div class="star-type">
                                            <p>3</p><i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="<?= 'width: ' . $threePercentage . '%' ?>"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="star-count">
                                            <p>{{ $rating->three_rating }}</p>
                                        </div>
                                    </div>
                                    <div class="rt-container">
                                        <div class="star-type">
                                            <p>2</p><i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="<?= 'width: ' . $twoPercentage . '%' ?>"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="star-count">
                                            <p>{{ $rating->two_rating }}</p>
                                        </div>
                                    </div>
                                    <div class="rt-container">
                                        <div class="star-type">
                                            <p>1</p><i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="<?= 'width: ' . $onePercentage . '%' ?>"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="star-count">
                                            <p>{{ $rating->one_rating }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="rating-form">
                                    <form name="review_form" id="review_form" method="post" enctype="multipart/form-data" action="addReview">
                                        <input type="hidden" name="business_id" value="{{ $detail->id }}">
                                        <h4>Rate Me</h4>
                                        <div class="mb-3">
                                            <div class="star-rating">
                                                <span class="far fa-star" data-rating="1"></span>
                                                <span class="far fa-star" data-rating="2"></span>
                                                <span class="far fa-star" data-rating="3"></span>
                                                <span class="far fa-star" data-rating="4"></span>
                                                <span class="far fa-star" data-rating="5"></span>
                                                <input type="hidden" name="rating_value" class="rating-value" id="rating_value" value="3">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Remarks(Optional)</label>
                                            <textarea class="form-control review_remarks" id="exampleFormControlTextarea1" name="remarks" rows="3"
                                                placeholder="Write something"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Attach Photos</label>
                                            <div class="input-group file-upload">
                                                <input type="text" class="form-control file-input"
                                                    placeholder="Chose file(s) ..." readonly="readonly"
                                                    data-action="display" />
                                                <input type="file" id="review_photo" class="hidden-xs-up" name="photo">
                                                <button class="btn btn-primary-outline" type="button"
                                                    data-action="browse">Browse</button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @auth
                                                <button type="button" id="submit_review" class="btn btn-general">Post Review</button>
                                            @endauth
                                            @guest
                                                <button type="button" class="btn btn-general" data-bs-toggle="modal" data-bs-target="#SignIn">Post Review</button>
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="feedbacks">
                            <?php $i = 0; ?>
                            @foreach ($reviews as $review)
                                <div class="feedback-card">
                                    <div class="dp">
                                        @if (!empty($review->profile_img))
                                            <img src="{{ asset('images/user/' . $review->user_id . '/profile/' . $review->profile_img) }}"
                                            alt="user-img">
                                        @else
                                            <?php $imgLetter = strtoupper($review->first_name[0]) . (!empty($review->last_name) ? strtoupper($review->last_name[0]) : ''); ?>
                                            <p>{{ $imgLetter }}</p>
                                        @endif
                                    </div>
                                    <div class="main-content">
                                        <p>{{ $review->remarks }}</p>
                                        <div class="auther-info">
                                            <h6>{{ $review->first_name . ' ' . $review->last_name }}</h6>
                                            @if (!empty($review->city_name))
                                                <p> | </p>
                                                <p class="location">{{ $review->city_name . ', ' . $review->state_name }}</p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="right-portion">
                                        <div class="flex-container">
                                            @if ($review->rating > 4.6)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="fas fa-star-half-alt"></i>
                                            @endif
                                            <h3>{{ $review->rating }}</h3>
                                        </div>
                                        <!-- <div class="likes-wrapper">
                                            <a href="" class="like">
                                                <i class="fas fa-thumbs-up"></i>
                                                <p>122</p>
                                            </a>
                                            <a href="" class="dislike">
                                                <i class="fas fa-thumbs-down"></i>
                                                <p>122</p>
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                                <?php $i++; ?>
                                @if ($i == 5)
                                    @break
                                @endif
                            @endforeach
                            @if ($rating->review_count > 5)
                                <a href="" class="common-a a-animate" id="allReviewsBtn" data-bs-toggle="modal" data-bs-target="#allReviews" >View All
                                Reviews and comments</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="questions">
                <div class="custom-hdng">
                    <h3>QUESTIONS & ANSWERS</h3>
                    <div class="separator"></div>
                </div>
                <div class="question-form">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Write your Question</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"
                            placeholder="Write something"></textarea>
                        <span class="text-danger d-none" id="question_error">Please enter a question!</span>
                    </div>
                    <div class="mb-3">
                        @auth
                            <button type="button" id="add_question" class="btn btn-general">Ask Question</button>
                        @endauth
                        @guest
                            <button type="button" class="btn btn-general" data-bs-toggle="modal" data-bs-target="#SignIn">Ask Question</button>
                        @endguest
                    </div>
                </div>
                <div class="answer-wrapper">
                    <div class="row">
                        <?php 
                            $allQuesCount = count($questions);
                            $allQuesCountHalf = floor($allQuesCount/2);
                            $quesCountHalf = $allQuesCount > 6 ? 3 : $allQuesCountHalf; 
                        ?>
                        @foreach($questions as $qKey => $question)
                            @if ($qKey == 0 || $qKey == $quesCountHalf)
                            <div class="col-xl-6">
                            @endif
                                <div class="answer-card">
                                    <div class="main-content">
                                        <span id="ques_{{ $question['ques_id'] }}"><h5>{{ $i = $qKey+1 . '.  ' . $question['question'] }}</h5></span>
                                        <p>{{ $question['answer'] }}</p>
                                        <div class="auther-info">
                                            <h6>{{ $question['first_name'] . ' ' . $question['last_name'] }}</h6> 
                                            @if (empty($question['answer']) && isset(auth()->user()->id) && $detail->user_id == auth()->user()->id)
                                                <a class="a-animate reply-qn qnReply" quesId="{{ $question['ques_id'] }}" >Reply</a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @if ($qKey == 5 || $qKey == $allQuesCount-1 || $qKey == $quesCountHalf-1)
                            </div>
                            @endif
                            @if ($qKey == 5)
                                @break;
                            @endif
                        @endforeach
                        @if ($questionCount > 6)
                            <div class="col-xl-12">
                                <a href="" class="common-a a-animate" data-bs-toggle="modal" data-bs-target="#allQuestions">
                                    View All Questions and Answers
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- -----------------------------------------------------------------Similar Items------------------------------------------------------------->
    <section class="similar-result slider-wrapper">
        <div class="container">
            <div class="hs__header">
                <h2 class="hs__headline common-h2">Similar <span>Business</span>
                </h2>
                <div class="navigation-btns hs__arrows">
                    @if (count($similarBusiness) > 3)
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
                    @foreach ($similarBusiness as $sKey => $similar)
                        <li class="hs__item">
                            <div class="content-box">
                                <div class="image-wrapper">
                                    @if (!empty($similar['profile_photo']))
                                        <img src="{{ asset('images/business/' . $similar['id'] . '/' . $similar['profile_photo']) }}" alt="image">
                                    @else
                                        <img src="{{ asset('images/default-business.png') }}" alt="image">
                                    @endif
                                </div>
                                <div class="txt-section">
                                    <div class="flex-container top-section">
                                        <h5>{{ $similar['business_name'] }}</h5>
                                        <div class="right-align">
                                            <a href=""><i class="fas fa-heart"></i></a>
                                        </div>

                                    </div>
                                    <p>{{ $similar['category'] }}</p>
                                    <p>{{ $similar['city'] . ', ' . $similar['state'] }}</p>
                                    <div class="flex-container bottom-section">
                                        <div class="btn-warpper">
                                            <a href="detail/{{ $similar['id'] }}" type="button" class="btn btn-view-more">View More</a>
                                        </div>
                                        <div class="overall-rating">
                                            @if ($similar['rating'] == 0)
                                                <i class="far fa-star"></i>
                                            @elseif ($similar['rating'] > 4.6)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="fas fa-star-half-alt"></i>
                                            @endif
                                            <p>{{ $similar['rating'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            @if (count($similarBusiness) > 5)
                <div class="center-align">
                    <button type="button" class="btn btn-view-all">View All</button>
                </div>
            @endif
        </div>
    </section>

    <!------------------------------------------------------------------All Reviews Modal------------------------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="allReviews" tabindex="-1" aria-labelledby="allReviews" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="flex-heading">
                        <h3 class="custom-h">All <span>Reviews</span></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <div class="content" id="reviewContent">
                    @foreach ($reviews as $review)
                        <div class="feedback-card">
                            <div class="dp">
                                @if (!empty($review->profile_img))
                                    <img src="{{ asset('images/user/' . $review->user_id . '/profile/' . $review->profile_img) }}"
                                    alt="user-img">
                                @else
                                    <?php $imgLetter = strtoupper($review->first_name[0]) . (!empty($review->last_name) ? strtoupper($review->last_name[0]) : ''); ?>
                                    <p>{{ $imgLetter }}</p>
                                @endif
                            </div>
                            <div class="main-content">
                                <p>{{ $review->remarks }}</p>
                                <div class="auther-info">
                                    <h6>{{ $review->first_name . ' ' . $review->last_name }}</h6>
                                    <p> | </p>
                                    <p class="location">{{ $review->city_name . ', ' . $review->state_name }}</p>
                                </div>

                            </div>
                            <div class="right-portion">
                                <div class="flex-container">
                                    @if ($review->rating > 4.6)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="fas fa-star-half-alt"></i>
                                    @endif
                                    <h3>{{ $review->rating }}</h3>
                                </div>
                                <div class="likes-wrapper">
                                    <a href="" class="like">
                                        <i class="fas fa-thumbs-up"></i>
                                        <p>122</p>
                                    </a>
                                    <a href="" class="dislike">
                                        <i class="fas fa-thumbs-down"></i>
                                        <p>122</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <div class="flex-h-cntr pagination-wrapper">
                        @if ($rating->review_count > 10)
                            <div class="pagination">
                            <?php
                            $pages = ceil($rating->review_count/10);
                            ?>
                                <input type="hidden" id="reviewCurrent" value="1">
                                <a class="prev page-numbers disabled" id="reviewPrev" ><i class="fas fa-angle-double-left"></i>
                                        <span>Prev</span></a>
                                @for ($i=1; $i<=$pages; $i++)
                                    <a class="page-numbers review_pages {{ $i==1 ? 'current disabled' : '' }}" id="reviewPage_{{ $i }}" >{{ $i }}</a>
                                @endfor
                                <a class="next page-numbers" id="reviewNext"><span>Next</span> <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------Gallery View More------------------------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="galleryViewMore" tabindex="-1" aria-labelledby="galleryViewMoreLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="content text-left">
                        <div class="flex-heading">
                            <h2 class="common-h2"><span>Image</span> Gallery</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="added-photos">
                            <div class="demo-gallery">
                                <ul id="lightgallery1" class="row photoContent">
                                    @foreach ($photos as $photo)
                                        <li class="col-xl-2 col-md-4 col-sm-4 col-6" data-src="{{ asset('images/business/' . $photo->business_id . '/photos/' . $photo->photo) }}">
                                            <a href="">
                                                <img class="img-responsive"
                                                    src="{{ asset('images/business/' . $photo->business_id . '/photos/' . $photo->photo) }}">
                                                <div class="demo-gallery-poster">
                                                    <img src="{{ asset('images/zoom.png') }}">
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <div class="row">
                            <div class="flex-h-cntr pagination-wrapper">
                                @if ($photoCount > 18)
                                    <div class="pagination">
                                    <?php
                                    $photoPages = ceil($photoCount/18);
                                    ?>
                                        <input type="hidden" id="photoCurrent" value="1">
                                        <a class="prev page-numbers disabled" id="photoPrev" ><i class="fas fa-angle-double-left"></i>
                                                <span>Prev</span></a>
                                        @for ($i=1; $i<=$photoPages; $i++)
                                            <a class="page-numbers photo_pages {{ $i==1 ? 'current disabled' : '' }}" id="photoPage_{{ $i }}" >{{ $i }}</a>
                                        @endfor
                                        <a class="next page-numbers" id="photoNext"><span>Next</span> <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------All Questions Modal------------------------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="allQuestions" tabindex="-1" aria-labelledby="allQuestions" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="flex-heading">
                        <h3 class="custom-h">All <span>Questions & Answers</span></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <div class="content">
                    <div class="row" id="quesContent">
                        @foreach ($questions as $qKey => $question)
                            @if ($qKey == 0 || $qKey == $allQuesCountHalf)
                            <div class="col-xl-6">
                            @endif
                                <div class="answer-card">
                                    <div class="main-content">
                                        <h5>{{ $i = $qKey+1 . '. ' . $question['question'] }}</h5>
                                        <p>{{ $question['answer'] }}</p>
                                        <div class="auther-info">
                                            <h6>{{ $question['first_name'] . ' ' . $question['last_name'] }}</h6>
                                            @if (empty($question['answer']))
                                                <a class="a-animate reply-qn" href="" data-bs-toggle="modal" data-bs-target="#replyQn">Reply</a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @if ($qKey == $allQuesCount-1 || $qKey == $allQuesCountHalf-1)
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="flex-h-cntr pagination-wrapper">
                        @if ($questionCount > 10)
                            <div class="pagination">
                            <?php
                            $quesPages = ceil($questionCount/10);
                            ?>
                                <input type="hidden" id="quesCurrent" value="1">
                                <a class="prev page-numbers disabled" id="quesPrev" ><i class="fas fa-angle-double-left"></i>
                                        <span>Prev</span></a>
                                @for ($i=1; $i<=$quesPages; $i++)
                                    <a class="page-numbers ques_pages {{ $i==1 ? 'current disabled' : '' }}" id="quesPage_{{ $i }}" >{{ $i }}</a>
                                @endfor
                                <a class="next page-numbers" id="quesNext"><span>Next</span> <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------Offer Modal------------------------------------------------------------->
    <!-- Modal -->
    @foreach ($offers as $ofKey => $offer)
        <div class="modal fade" id="offerModal_{{ $offer->id }}" tabindex="-1" aria-labelledby="offerModalLabel" aria-hidden="true">
            <div class="modal-dialog offer-modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ asset('images/business/' . $offer->business_id . '/offer/' . $offer->offer_image) }}">
                        <div class="offer-description">
                            <h3 class="custom-h">{{ $offer->heading }}</h3>
                            <p>{{ $offer->description }}</p>
                            <div class="btn-wrapper">
                                <button type="button" class="btn btn-submit-outline" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-submit-primary">Grab Now</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!------------------------------------------------------------------Reply Qn Modal------------------------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="replyQn" tabindex="-1" aria-labelledby="replyQnLabel" aria-hidden="true">
        <div class="modal-dialog offer-modal">
            <div class="modal-content">
                <div class="modal-body text-left">
                    <div class="flex-heading">
                        <h3 class="custom-h">Reply <span>Question</span></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <p id="modalQues">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua?</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label">Reply</label>
                                <textarea class="form-control" rows="3" name="quesAnswer"></textarea>
                                <span class="text-danger d-none" id="answer_error">Please enter the answer!</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="btn-wrapper">
                                <button type="button" class="btn btn-submit-outline" data-bs-dismiss="modal">Discard</button>
                                <button type="button" class="btn btn-submit-primary" id="submitReply">Reply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/lightgallery.js') }}"></script>
    <script src="{{ asset('js/lg-pager.js') }}"></script>
    <script src="{{ asset('js/lg-autoplay.js') }}"></script>
    <script src="{{ asset('js/lg-share.js') }}"></script>
    <script src="{{ asset('js/lg-fullscreen.js') }}"></script>
    <script src="{{ asset('js/lg-zoom.js') }}"></script>
    <script src="{{ asset('js/lg-hash.js') }}"></script>
    <script src="{{ asset('js/picturefill.min.js') }}"></script>

    <script type="text/javascript">
        var base_url = '<?= url('/'); ?>';
        var business_id = '<?= $detail->id; ?>';
        var reviewPages = '<?= ceil($rating->review_count/10); ?>';
        var photoPages = '<?= ceil($photoCount/18); ?>';
        var quesPages = '<?= ceil($questionCount/10); ?>';
    </script>
    <script src="{{ asset('js/custom/detail.js') }}"></script>

    @include('includes.footer')
    