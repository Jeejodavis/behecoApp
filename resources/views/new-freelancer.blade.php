    
    @include('includes.header')

    <style type="text/css">
        #img-crop-cover #result-cover #close-cover {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #059762;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #059762 !important;
            background: url(//img.icons8.com/material/48/ffffff/multiply.png) 50% 50% no-repeat;
            background-size: 55%;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            cursor: pointer;
        }
    </style>

    <link rel='stylesheet' href="{{ asset('css/lightgallery.css') }}">

<!------------------------------------------------------------------Banner------------------------------------------------------------------>
    <section class="general-banner align-v-center bg-business">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="content">
                <h2>Add Freelancer</h2>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Add new Freelancer-------------------------------------------------------->
    <input type="hidden" name="freelancer_id" id="freelancer_id" value="0">
    <section class="add-new-wrapper">
        <div class="container">
            <div class="accordion-section nopad">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="basicTab">
                                        01 Basic Details
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h3 class="custom-h text-center">Enter <span>Basic Details</span></h3>
                                        <div class="form-wrapper">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Freelancer Name *</label>
                                                            <input type="text" class="form-control" id="freelancer_name" placeholder="Freelancer Name">
                                                            <span class="text-danger d-none" id="name_error">Name cannot be empty!</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Category *</label>
                                                            <select class="form-select select2 js"
                                                                aria-label="Default select example" id="category">
                                                                <option value="0" selected>Choose Category</option>
                                                                @foreach($categories as $catKey => $category)
                                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger d-none" id="category_error">Please choose category</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Subcategory *</label>
                                                            <select class="form-select select2 js"
                                                                aria-label="Default select example" id="subcategory">
                                                                <option value="0" selected>Choose Subcategory</option>
                                                            </select>
                                                            <span class="text-danger d-none" id="subcategory_error">Please choose subcategory</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Street
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                id="street" placeholder="Street Name">
                                                            <span class="text-danger d-none" id="street_error">Street cannot be empty!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Area
                                                                *</label>
                                                            <input type="text" class="form-control"
                                                                id="area" placeholder="Area Name">
                                                            <span class="text-danger d-none" id="area_error">Area cannot be empty!</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">City
                                                                *</label>
                                                            <select class="form-select select2 js"
                                                                aria-label="Default select example" id="city">
                                                                <option value="0" selected>Choose City</option>
                                                                @foreach($cities as $cKey => $city)
                                                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger d-none" id="city_error">Please choose city!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Landmark (Optional)
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="landmark"
                                                                placeholder="Enter a Landmark">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Pin
                                                                Code
                                                                *</label>
                                                            <input type="number" class="form-control"
                                                                id="pincode"
                                                                placeholder="Enter Pin Code">
                                                            <span class="text-danger d-none" id="pincode_error">Pincode cannot be empty!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Country
                                                                *</label>
                                                            <select class="form-select select2 js"
                                                                aria-label="Default select example" disabled id="country">
                                                                <option value="0" selected>Choose Country</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">State
                                                                *</label>
                                                            <select class="form-select select2 js"
                                                                aria-label="Default select example" id="state" disabled>
                                                                <option value="0" selected>Choose State</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contact-details">
                                                <h3 class="common-h3 text-center"><span>Contact</span> Details</h3>
                                                <div class="row">
                                                    <div class="col-xl-6" id="office_num_div">
                                                        <label class="form-label">Office Number</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control off_num"
                                                                placeholder="Enter Office Landline"
                                                                aria-label="Recipient's username"
                                                                aria-describedby="button-addon2" name="office_num[]" id="office_number">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_office_num"><i class="fas fa-plus"></i></button>
                                                            <span class="text-danger d-none" id="office_num_error">Office number cannot be empty!</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6" id="tollfree_num_div">
                                                        <label class="form-label">Toll Free Number (Optional)</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control tollfree_num" id="tollfree_num" name="tollfree_num[]" placeholder="Enter Toll Free Number">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_tollfree_num"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6" id="wapp_num_div">
                                                        <label class="form-label">WhatsApp Number</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control wapp_num"
                                                                placeholder="Enter WhatsApp Number" id="whatsapp_num" name="whatsapp_num[]">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_wapp_num"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6" id="mob_num_div">
                                                        <label class="form-label">Mobile Number (Optional)</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control mob_num"
                                                                placeholder="Enter Mobile Number" id="mobile_num" name="mobile_num[]">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_mob_num"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6" id="email_div">
                                                        <label class="form-label">Email Id</label>
                                                        <div class="input-group mb-3">
                                                            <input type="email" class="form-control email_id"
                                                                placeholder="Enter Email ID" id="email" name="email[]">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_email"><i class="fas fa-plus"></i></button>
                                                            <span class="text-danger d-none" id="email_error">Email ID cannot be empty!</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6" id="website_div">
                                                        <label class="form-label">Website</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control website"
                                                                placeholder="Enter Web URL" id="website" name="website[]">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_website"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" id="sm_div">
                                                    <div class="col-xl-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Social
                                                            Media (Optional)</label>
                                                        <select class="form-select select2 js"
                                                            aria-label="Default select example" id="social_media" name="social_media[]">
                                                            <option value="0" selected>Choose Socail Media</option>
                                                            @foreach($social_medias as $sm)
                                                                <option value="{{ $sm->id }}">{{ $sm->sm_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="form-label">Social Media URL</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control sm_url"
                                                                placeholder="Enter Social Media URL" id="social_media_url" name="social_media_url[]">
                                                            <button class="btn btn-plus" type="button"
                                                                id="add_sm_url"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="center-align">
                                                            <button type="button"
                                                                class="btn btn-submit-outline" id="basicReset">Reset</button>
                                                            <button type="button"
                                                                class="btn btn-submit-primary" id="basic_next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="photoTab" disabled>
                                    02 Add Photos
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form name="image_form" id="image_form" method="post" enctype="multipart/form-data" action="addFreelancerPhotos">
                                        <input type="hidden" name="freelancerId" id="freelancerId" value="0">
                                        <div class="cover-image-wrapper">
                                            <h3 class="custom-h text-center">Add <span>Cover Picture</span></h3>
                                            <div class="file-cropper">
                                                <div id="img-crop-cover" style="overflow: hidden;">
                                                    <div id="upload-cover">
                                                        <div class="block">
                                                            <div class="stage">
                                                                <label id="filedrag-cover">
                                                                    <input type="file" id="fileselect-cover"
                                                                        name="fileselect-cover" accept="image/*" />
                                                                    <textarea style="display: none;" name="coverImgData"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="crop-cover">
                                                        <div class="block">
                                                        </div>
                                                        <div class="stage">
                                                            <div id="croppie-cover"></div>
                                                            <div class="btn-wrapper">
                                                                <button type="button" class="btn btn-crop" id="prev-cover"
                                                                    onclick="covercropCancel();">Clear</button>
                                                                <button type="button" class="btn btn-crop" id="next-cover"
                                                                    onclick="covercropResult();">Set</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div id="result-cover">
                                                        <button type="button" class="btn" id="close-cover"
                                                            onclick="covercropCancel();"></button>
                                                        <div class="block">
                                                            <div class="stage"><img src="" id="coverImg" /></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="profile-pic-section">
                                            <h3 class="custom-h text-center">Add <span>Profile Picture</span></h3>
                                            <div class="file-cropper">
                                                <div class="profile-image">
                                                    <div id="img-crop">
                                                        <div id="upload">
                                                            <div class="block">
                                                                <div class="stage">
                                                                    <label id="filedrag">
                                                                        <input type="file" id="fileselect" name="fileselect"
                                                                            accept="image/*" />
                                                                        <textarea style="display: none;" name="profileImgData"></textarea>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="crop">
                                                            <div class="block">
                                                            </div>
                                                            <div class="stage">
                                                                <div id="croppie"></div>
                                                                <div class="btn-wrapper">
                                                                    <button type="button" class="btn btn-crop" id="prev"
                                                                        onclick="cropCancel();">Clear</button>
                                                                    <button type="button" class="btn btn-crop" id="next"
                                                                        onclick="cropResult();">Set</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="result">
                                                            <button type="button" class="btn" id="close" onclick="cropCancel();"></button>
                                                            <div class="block">
                                                                <div class="stage"><img src="" id="profileImg" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="add-photos-section">
                                            <h3 class="custom-h text-center">Add <span>Photos of your Freelance</span></h3>
                                            <div class="custom-file-image">
                                                <input type="file" id="fileImage" name="fileImage[]"
                                                    class="custom-file-image-input" accept="image/*" multiple="multiple">
                                                <div class="custom-file-preview">
                                                    <label class="custom-file-preview-add" for="fileImage">

                                                    </label>
                                                </div>
                                            </div>
                                            <p class="text-danger error-product_image"></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 mgn-top-30">
                                                <div class="center-align">
                                                    <button type="button" class="btn btn-submit-outline" id="photoPrev">Previous</button>
                                                    <button type="button" class="btn btn-submit-primary" id="addPhotos">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="locationTab" disabled>
                                    03 Add Location
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h3 class="custom-h text-center">Add <span>Your Location</span></h3>
                                    <div class="location-wrapper">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Location:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="us2-address" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Radius:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="us2-radius" />
                                            </div>
                                        </div>
                                        <div id="us2" style="width: 550px; height: 400px;"></div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="m-t-small">
                                            <label class="p-r-small col-sm-1 control-label">Lat.:</label>
                                            <div class="col-sm-1">
                                                <input type="text" name="lattitude"  class="form-control" style="width: 110px" id="us2-lat" />
                                            </div>
                                            <label class="p-r-small col-sm-1 control-label">Long.:</label>
                                            <div class="col-sm-1">
                                                <input type="text" name="longitude"  class="form-control" style="width: 110px" id="us2-lon" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 mgn-top-30">
                                            <div class="center-align">
                                                <button type="button" class="btn btn-submit-outline" id="locationPrev">Previous</button>
                                                <button type="button" class="btn btn-submit-primary" id="locationAdd">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" id="keywordTab" disabled>
                                    03 Add Keywords
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h3 class="custom-h text-center">Add <span>Keywords</span></h3>
                                    <div class="keyword-wrapper">
                                        <div class="search-bar mgn-btm-20">
                                            <div class="row">
                                                <div class="col-xl-2">
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="Search Keyword">
                                                        <button class="btn btn-primary btn-search" type="button"
                                                            id="button-addon2"><i
                                                                class="fas fa-search"></i><span>Search</span></button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="keywords">
                                            @foreach($keywords as $kKey => $keyword)
                                                <div class="keyword">
                                                    <input type="checkbox" class="btn-check" id="keyword_{{ $keyword->id }}"
                                                        autocomplete="off" name="keyword" value="{{ $keyword->id }}">
                                                    <label class="btn btn-outline-primary" for="keyword_{{ $keyword->id }}">{{ $keyword->keyword_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 mgn-top-30">
                                            <div class="center-align">
                                                <button type="button" class="btn btn-submit-outline" id="keywordPrev">Previous</button>
                                                <button type="button" class="btn btn-submit-primary" id="keywordSubmit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card-general contact-card pos-sticky spl-pad">
                            <p>Not sure exactly what we’re looking for or just want clarification?
                                We’d be happy to chat
                                with you and clear things up for you. Anytime! </p>
                            <div class="group">
                                <h6>Customer Care Number:</h6>
                                <a href="">+91 1800 987 654</a>
                            </div>
                            <div class="group">
                                <h6>Customer Care Email:</h6>
                                <a href="">support@beheco.in</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <script type="text/javascript">
        var base_url = '<?= url('/'); ?>';
        var social_medias = <?= json_encode($social_medias); ?>;
    </script>

    <script src="{{ asset('js/custom/new-freelancer.js') }}"></script>

    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="{{ asset('js/locationPicker/locationpicker.jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#tab_map").removeClass("active in");
        });
        $('#us2').locationpicker({
            location: {
                latitude: 9.98127638270655,
                longitude: 76.29632506793212
            },
            radius: 300,
            inputBinding: {
                latitudeInput: $('#us2-lat'),
                longitudeInput: $('#us2-lon')
                // radiusInput: $('#us2-radius'),
                // locationNameInput: $('#us2-address')
            },
            enableAutocomplete: true
        });
    </script>

    @include('includes.footer')