
<script src="https://accounts.google.com/gsi/client" async defer></script>
<!------------------------------------------------------------------Footer------------------------------------------------------------------>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="">Featured</a></li>
                        <li><a href="">Trending</a></li>
                        <li><a href="">Events</a></li>
                        <li><a href="{{ url('/careers') }}">Careers</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <ul>
                        <li><a href="{{ url('/help') }}">Help</a></li>
                        <li><a href="{{ url('/faq') }}">FAQ's</a></li>
                        <li><a href="{{ url('/terms') }}">Terms and conditions</a></li>
                        <li><a href="">Privacy / Cookies</a></li>
                        <li><a href="">Security</a></li>

                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <ul>
                        <li><a href="">Emergency Services</a></li>
                        <li><a href="">Food and Beaverages</a></li>
                        <li><a href="">Rooms and Rentals</a></li>
                        <li><a href="">Health Care</a></li>
                        <li><a href="">Automobile</a></li>
                        <li><a href="">Dress & Accessories</a></li>
                        <li><a href="">Eductional Institutions</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <h6>Registered Address:</h6>
                    <p>3rd floor, 120 Holborn, London EC1N 2TD, United Kingdom. VAT number: 791 7261 06.</p>

                    <div class="contact-details">
                        <h6>Email:</h6>
                        <a href="">info@beheco.in</a><br>
                        <a href="">contact@beheco.in</a>
                    </div>
                    <div class="contact-details mgn-top-20">
                        <h6>Contact Number::</h6>
                        <a href="">+91 1800 123 456</a><br>
                        <a href="">+91 1800 987 654</a>
                    </div>

                </div>
            </div>
            <div class="copyright-section">
                <div class="row">
                    <div class="col-xl-6 col-md-7">
                        <p>Copyright © 2022 Beheco.in . All rights reserved.</p>
                    </div>
                    <div class="col-xl-6 col-md-5">
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
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="Success" tabindex="-1" aria-labelledby="SuccessLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="right-align">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="icon-wrapper">
                        <img src="{{ asset('images/svg/check.svg') }}" alt="success">
                    </div>
                    <div class="content">
                        <h2 class="success-heading">Success</h2>
                        <p id="successText">Now you can Explore Everything</p>
                        <!-- <div class="d-grid gap-2 full-wdth-btn">
                            <button type="button" class="btn btn-primary-outline">Explore now</button>
                            <button type="button" class="btn btn-primary">View your profile</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="Error" tabindex="-1" aria-labelledby="ErrorLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="right-align">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="icon-wrapper">
                        <img src="assets/images/svg/x-circle.svg" alt="success">
                    </div>
                    <div class="content">
                        <h2 class="error-heading">Error</h2>
                        <p>Please check the Internet connection</p>
                        <div class="d-grid gap-2 full-wdth-btn">
                            <button type="button" class="btn btn-danger-outline">Explore
                                now</button>
                            <button type="button" class="btn btn-danger">View your profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----------------------------------------------------------------Add New Listing Modal --------------------------------------------------------->
    <div class="modal fade" id="newListing" tabindex="-1" aria-labelledby="addNewListing" aria-hidden="true">
        <div class="modal-dialog add-new-listing-modal">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="content">
                        <div class="flex-heading">
                            <h3 class="custom-h">Select the<span> Type of Listing</span></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="input-wrapper">
                            <div class="block-btn-wrapper">
                                <div class="mb-3 d-grid">
                                    <input type="radio" class="btn-check" name="options" id="option1"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" onclick="location.href = '<?= url('/new-business') ?>'"
                                        for="option1">Business</label>
                                </div>
                                <div class="mb-3 d-grid">
                                    <input type="radio" class="btn-check" name="options" id="option2"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="option2">Freelancer</label>
                                </div>
                                <div class=" d-grid">
                                    <input type="radio" class="btn-check" name="options" id="option4"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="option4">Place</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!------------------------------------------------------------------Sign Up Modal------------------------------------------------------------->
    <!-- Modal -->
    <!-- <div class="modal fade" id="SignUp" tabindex="-1" aria-labelledby="SignUpLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="right-align">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </div>
                    <div class="content">
                        <h2 class="common-h2"><span>Sign Up</span> and Explore More</h2>
                        <div class="d-grid gap-2">
                            <a href="{{ url('/redirect') }}" class="btn btn-google" >
                                <div class="icon">
                                    <i class="fab fa-google"></i>
                                </div>
                                <span>Sign in with Google</span>
                            </a>
                            <button class="btn btn-facebook" type="button">
                                <div class="icon">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <span>Sign in with Facebook</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="SignIn" tabindex="-1" aria-labelledby="SignInLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="right-align">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </div>
                    <div class="content">
                        <h2 class="common-h2"><span>Sign In</span> and Explore More</h2>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="signinEmail" placeholder="Email Address">
                            <span class="text-danger d-none" id="sEmail_error">Please enter email</span>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="signPassword" placeholder="Password">
                            <span class="text-danger d-none" id="sPass_error">Please enter the password</span>
                        </div>
                        <div class="block-btn-wrapper">
                            <button type="button" class="btn btn-primary btn-view-all"
                                id="signBtn">Sign In</button>
                        </div>
                        <span class="text-danger d-none" id="signinCommon_error">Invalid Email or Password</span>
                        <hr>
                        <p>Don't have a Beheco Account? <a class=" text-primary fw-bold a-animate text-primary-hover"
                                data-bs-toggle="modal" data-bs-target="#SignUp" data-bs-dismiss="modal">Register
                                Here!</a></p>
                        <hr>
                        <p class="text-center mb-0">OR</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('/redirect') }}" class="btn-round bg-google">
                                <i class="fab fa-google"></i>
                            </a>
                            <!-- <a href="" class="btn-round bg-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------Sign Up Modal------------------------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="SignUp" tabindex="-1" aria-labelledby="SignUpLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="right-align">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </div>
                    <div class="content">
                        <h2 class="common-h2"><span>Sign Up</span></h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="First Name" id="first_name">
                                    <span class="text-danger d-none" id="fname_error">First name cannot be empty!</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name" id="last_name">
                                    <span class="text-danger d-none" id="lname_error">Last name cannot be empty!</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email Address" id="email_id">
                                    <span class="text-danger d-none" id="email_error">Email cannot be empty!</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="number" class="form-control" placeholder="Phone Number" id="phone_number">
                                    <span class="text-danger d-none" id="phno_error">Phone number cannot be empty!</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password" id="password">
                                    <span class="text-danger d-none" id="password_error">Password cannot be empty!</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Confirm Password" id="confirmPassword">
                                    <span class="text-danger d-none" id="confirmPass_error">Confirm password cannot be empty!</span>
                                </div>
                            </div>
                        </div>

                        <div class="block-btn-wrapper">
                            <button type="button" class="btn btn-primary btn-view-all" id="signUp">Sign Up</button>
                        </div>
                        <span class="text-danger d-none" id="common_error">User already exist please signin</span>
                        <hr>
                        <p>Already have a Beheco Account? <a href=""
                                class="text-primary fw-bold a-animate text-primary-hover" data-bs-toggle="modal"
                                data-bs-target="#SignIn" data-bs-dismiss="modal">Sign In
                                Here!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------Advertise Here------------------------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="advertise" tabindex="-1" aria-labelledby="advertiseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="content text-left">
                        <div class="flex-heading">
                            <h2 class="common-h2"><span>Advertise with</span> Beheco</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <p class="description-text">Please fill up this form, Our executives will contact you
                            soon.</p>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Your Full Name</label>
                                    <input type="text" class="form-control" placeholder="Eg: John Smith">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Business Name</label>
                                    <input type="text" class="form-control" placeholder="Eg: ABC Pvt Ltd">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Eg: name@example.com">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" placeholder="Eg: +919876543211">
                                </div>
                            </div>
                        </div>
                        <div class="block-btn-wrapper">
                            <button type="button" class="btn btn-view-all">Contact Me</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------Move to Top------------------------------------------------------------->
    <button onclick="topFunction()" id="myBtn" title="Go to top" class="move-to-top">
        <div class="btn-content">
            <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 7"
                style="enable-background:new 0 0 12 7;" xml:space="preserve" width="12px" height="7px">
                <style type="text/css">
                    .top {
                        fill: #FFFFFF;
                    }
                </style>
                <path class="top" d="M6,1.9L1.3,6.8C1,7.1,0.5,7.1,0.2,6.8c-0.3-0.3-0.3-0.8,0-1.1l5.2-5.4C5.6,0.1,5.8,0,6,0s0.4,0.1,0.6,0.2
       l5.2,5.4c0.3,0.3,0.3,0.8,0,1.1c-0.3,0.3-0.8,0.3-1.1,0L6,1.9z" />
            </svg>
        </div>

    </button>

    <script type="text/javascript">
        var base_url = '<?= url('/'); ?>';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#signBtn').click(function() {
            var email = $('#signinEmail').val();
            var password = $('#signPassword').val();
            var valFail = 0;
            if (email == '') {
                $('#sEmail_error').removeClass('d-none');
                $('#signinEmail').addClass('border-danger');
                valFail = 1;
            } else {
                $('#sEmail_error').addClass('d-none');
                $('#signinEmail').removeClass('border-danger');
            }

            if (password == '') {
                $('#sPass_error').removeClass('d-none');
                $('#signPassword').addClass('border-danger');
                valFail = 1;
            } else {
                $('#sPass_error').addClass('d-none');
                $('#signPassword').removeClass('border-danger');
            }
            if (valFail == 1) {
                return false;
            }
            $.ajax({
                url: base_url+'/signIn',
                type: 'POST',
                data: {
                    'email': email,
                    'password': password
                },
                dataType: 'JSON',
                async: false,
                success: function (data) {
                    // var datas = JSON.parse(data);
                    if (data.status == 'error')
                    {
                        $('#signinCommon_error').removeClass('d-none');
                    } else {
                        window.location.href = base_url+"/profile";
                    }
                },
                error: function (xhr) {
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }

            });
        });

        $('#signUp').click(function() {
            var firstName = $('#first_name').val();
            var lastName = $('#last_name').val();
            var emailId = $('#email_id').val();
            var phoneNumber = $('#phone_number').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();
            var valResult = validateSignupData(firstName, lastName, emailId, phoneNumber, password, confirmPassword);
            if (valResult == 1) {
                return false;
            }
            $.ajax({
                url: base_url+'/signUp',
                type: 'POST',
                data: {
                    'firstName': firstName,
                    'lastName': lastName,
                    'emailId': emailId,
                    'phoneNumber': phoneNumber,
                    'password': password
                },
                dataType: 'JSON',
                async: false,
                success: function (data) {
                    // var datas = JSON.parse(data);
                    if (data.status == 'error')
                    {
                        $('#common_error').removeClass('d-none');
                    } else {
                        window.location.href = base_url+"/profile";
                    }
                },
                error: function (xhr) {
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }

            });
        });

        function validateSignupData(firstName, lastName, emailId, phoneNumber, password, confirmPassword)
        {
            var valFail = 0;
            if (firstName == '') {
                $('#fname_error').removeClass('d-none');
                $('#first_name').addClass('border-danger');
                valFail = 1;
            } else {
                $('#fname_error').addClass('d-none');
                $('#first_name').removeClass('border-danger');
            }

            if (lastName == '') {
                $('#lname_error').removeClass('d-none');
                $('#last_name').addClass('border-danger');
                valFail = 1;
            } else {
                $('#lname_error').addClass('d-none');
                $('#last_name').removeClass('border-danger');
            }

            if (emailId == '') {
                $('#email_error').removeClass('d-none');
                $('#email_error').text('Email cannot be empty!');
                $('#email_id').addClass('border-danger');
                valFail = 1;
            } else {
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                if(!pattern.test(emailId))
                {
                    $('#email_error').removeClass('d-none');
                    $('#email_error').text('Please enter a valid email address');
                    $('#email_id').addClass('border-danger');
                    valFail = 1;
                } else {
                    $('#email_error').addClass('d-none');
                    $('#email_id').removeClass('border-danger');
                }
            }

            if (phoneNumber == '') {
                $('#phno_error').removeClass('d-none');
                $('#phone_number').addClass('border-danger');
                valFail = 1;
            } else {
                $('#phno_error').addClass('d-none');
                $('#phone_number').removeClass('border-danger');
            }

            if (password == '') {
                $('#password_error').removeClass('d-none');
                $('#password_error').text('Password cannot be empty!');
                $('#password').addClass('border-danger');
                valFail = 1;
            } else {
                var passPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/i;
                if(!passPattern.test(password))
                {
                    $('#password_error').removeClass('d-none');
                    $('#password_error').text('Password must contain minimum 8 characters, one letter, one number and one special character.');
                    $('#password').addClass('border-danger');
                    valFail = 1;
                } else {
                    $('#password_error').addClass('d-none');
                    $('#password').removeClass('border-danger');
                }
            }

            if (confirmPassword == '') {
                $('#confirmPass_error').removeClass('d-none');
                $('#confirmPass_error').text('Confirm password cannot be empty!');
                $('#confirmPassword').addClass('border-danger');
                valFail = 1;
            } else {
                console.log(password);
                console.log(confirmPassword);
                if (password != confirmPassword) {
                    $('#confirmPass_error').removeClass('d-none');
                    $('#confirmPass_error').text('Mismatch confirm password');
                    $('#confirmPassword').addClass('border-danger');
                    valFail = 1;
                } else {
                    $('#confirmPass_error').addClass('d-none');
                    $('#confirmPassword').removeClass('border-danger');
                }
            }
            return valFail;
        }
    </script>

    <!-- -----------------------------------------------------------------External Javascript------------------------------------------------------------->
    <script src="{{ asset('js/GsapScrollTrigger.js') }}"></script>
    <script src="{{ asset('js/gsap-min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-min.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/gsap3.5.1/gsap.min.js') }}"></script>
    <script src="{{ asset('js/popper-min.js') }}"></script>
    <script src="{{ asset('js/select2_4.0.0/select2.min.js') }}"></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js'></script> -->
    <!-- <script src="{{ asset('js/slick.js') }}"></script> -->
    <script src="{{ asset('js/croppie.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/selectbox.js') }}"></script>
</body>

</html>