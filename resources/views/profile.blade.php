    
    @include('includes.header')

    
    <!------------------------------------------------------------------Profile Top------------------------------------------------------------------>
    <section class="business-profile profile">
        <div class="container">
            <div class="cover-bg cover-wrapper">
                <!-- <img src="https://images.pexels.com/photos/443383/pexels-photo-443383.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                    alt="cover-img"> -->
                <label class="cabinet center-block">
                    <figure>
                        <img src="{{ asset('images/user/'.$profileInfo->id.'/profile/'.$profileInfo->banner_img) }}" class="cover-pic-image img-responsive img-thumbnail" name="coverImg" id="item-img-output1" />
                        <figcaption><i class="fa fa-camera"></i></figcaption>
                    </figure>
                    <input type="file" class="item-img1 file" name="file_photo1" />
                </label>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="picture-wrapper profile-pic">
                        <label class="cabinet center-block">
                            <figure>
                                <img src="{{ asset('images/user/'.$profileInfo->id.'/profile/'.$profileInfo->profile_img) }}" class="gambar img-responsive img-thumbnail profPhoto" name="profPhoto" id="item-img-output" />
                                <figcaption><i class="fa fa-camera"></i></figcaption>
                            </figure>
                            <input type="file" class="item-img file center-block" name="profile_photo" id="profile_photo" />
                        </label>

                    </div>
                    <div class="flex-h-cntr mgn-btm-30">
                        <div class="general-info">
                            <h2>{{ $profileInfo->first_name . ' ' . $profileInfo->last_name }}</h2>
                            <p>{{ $profileInfo->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="vertical-tabs-container">
                        <div class="vertical-tabs">
                            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab is-active" rel="tab1">
                                <div class="title-wrapper">
                                    <i class="far fa-user-circle"></i> Profile Info
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab2">
                                <div class="title-wrapper">
                                    <i class="far fa-building"></i> My Business
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab3">
                                <div class="title-wrapper">
                                    <i class="far fa-heart"></i> Saved Items
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab5">
                                <div class="title-wrapper">
                                    <i class="far fa-bell"></i> Notifications
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab disp-none" rel="tab4">
                                <div class="title-wrapper">
                                    <i class="fas fa-history"></i> My Activities
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="js-vertical-tab vertical-tab disp-none" rel="tab5">
                                <div class="title-wrapper">
                                    <i class="fas fa-cog"></i> Settings
                                </div>
                            </a>
                        </div>

                        <div class="vertical-tab-content-container">
                            <a href=""
                                class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading is-active"
                                rel="tab1">
                                <div class="title-wrapper">
                                    <i class="far fa-user-circle"></i> Profile Info
                                </div>
                            </a>
                            <div id="tab1" class="js-vertical-tab-content vertical-tab-content">
                                <h3 class="custom-h">General <span>Information</span></h3>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name
                                            </label>
                                            <input type="text" class="form-control" placeholder="Eg John" id="first_name" value="{{ $profileInfo->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name
                                            </label>
                                            <input type="text" class="form-control" placeholder="Eg John" id="last_name" value="{{ $profileInfo->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gender
                                            </label>
                                            <select class="form-select " aria-label="Default select example" id="gender">
                                                <option value="" selected>Choose Gender</option>
                                                <option value="M" 
                                                @if ($profileInfo->gender == 'M') 
                                                    selected
                                                @endif 
                                                >Male</option>
                                                <option value="F"
                                                @if ($profileInfo->gender == 'F') 
                                                    selected
                                                @endif 
                                                >Female</option>
                                                <option value="O"
                                                @if ($profileInfo->gender == 'O') 
                                                    selected
                                                @endif 
                                                >Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth
                                            </label>
                                            <input type="text" class="form-control" placeholder="DD-MM-YYYY" id="dob" value="{{ date('d-m-Y', strtotime($profileInfo->dob)) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email Address
                                            </label>
                                            <input type="email" class="form-control" placeholder="Eg: john@email.com"
                                                value="{{ $profileInfo->email }}" id="email_id" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contact Number
                                            </label>
                                            <input type="number" class="form-control" placeholder="Eg:+919876543210" id="contact_no" value="{{ $profileInfo->contact_no }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="btn-wrapper mgn-top-20">
                                            <button type="button" class="btn btn-submit-outline" id="profileReset">Reset</button>
                                            <button type="button" class="btn btn-submit-primary" id="profileUpdate">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading"
                                rel="tab2">
                                <div class="title-wrapper">
                                    <i class="far fa-building"></i> My Business
                                </div>
                            </a>
                            <div id="tab2" class="js-vertical-tab-content vertical-tab-content">
                                @if (!empty($businesses))
                                <div class="business-content">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <select class="form-selectdrpdown select2 js" name="business" id="business_select" aria-label="Default select example"
                                                    data-live-search="true">
                                                    @foreach ($businesses as $bKey => $business)
                                                        <option value="{{ $business['id'] }}"
                                                            @if ($bKey == 0)
                                                                selected
                                                            @endif 
                                                            >{{ $business['business_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($businesses as $bsKey => $business)
                                        <div class="business-information" id="businessInform_{{ $business['id'] }}"
                                        @if ($bsKey != 0)
                                            style="display: none;"
                                        @endif 
                                        >
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-info-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-info_{{ $business['id'] }}" type="button"
                                                        role="tab" aria-controls="pills-info"
                                                        aria-selected="true">Info</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-pageContent-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-pageContent_{{ $business['id'] }}"
                                                        type="button" role="tab" aria-controls="pills-pageContent"
                                                        aria-selected="false">Page
                                                        Content</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-offers-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-offers_{{ $business['id'] }}" type="button" role="tab"
                                                        aria-controls="pills-offers" aria-selected="false">Offers</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-subscription-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-subscription_{{ $business['id'] }}"
                                                        type="button" role="tab" aria-controls="pills-subscription"
                                                        aria-selected="false">Subscription</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-info_{{ $business['id'] }}" role="tabpanel"
                                                    aria-labelledby="pills-info-tab">
                                                    <div class="general mgn-top-20">
                                                        <h3 class="custom-h"><span>Basic Details</span></h3>
                                                        <div class="form-wrapper">
                                                            <div class="general-content" id="infoContent_{{ $business['id'] }}">
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Business Name *</label>
                                                                            <input type="text" class="form-control"
                                                                                id="business_name_{{ $business['id'] }}"
                                                                                placeholder="Business Name" value="{{ $business['business_name'] }}">
                                                                            <span class="text-danger d-none" id="name_error_{{ $business['id'] }}">Name cannot be empty!</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Category *</label>
                                                                            <select class="form-select select2 js"
                                                                                aria-label="Default select example" id="category_{{ $business['id'] }}">
                                                                                <option value="0" selected>Choose Category</option>
                                                                                @foreach ($masterData['categories'] as $category)
                                                                                    <option value="{{ $category->id }}"
                                                                                        @if ($category->id == $business['category_id'])
                                                                                            selected
                                                                                        @endif
                                                                                        >{{ $category->category_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="text-danger d-none" id="category_error_{{ $business['id'] }}">Please choose category</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Subcategory *</label>
                                                                            <select class="form-select select2 js"
                                                                                aria-label="Default select example" id="subcategory_{{ $business['id'] }}">
                                                                                <option value="0" selected>Choose Subcategory</option>
                                                                                @foreach ($business['subcategories'] as $subcategory)
                                                                                    <option value="{{ $subcategory->id }}"
                                                                                        @if ($subcategory->id == $business['subcategory_id'])
                                                                                            selected
                                                                                        @endif
                                                                                        >{{ $subcategory->subcategory_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="text-danger d-none" id="subcategory_error_{{ $business['id'] }}">Please choose subcategory</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Year of Establishment
                                                                                (Optional)</label>
                                                                            <input type="number" class="form-control"
                                                                                id="year_of_establish_{{ $business['id'] }}"
                                                                                placeholder="Year of Establishment" value="{{ $business['year_of_establishment'] }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Name of Founder
                                                                                (Optional)
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="name_of_founder_{{ $business['id'] }}"
                                                                                placeholder="Founder's Name" value="{{ $business['name_of_founder'] }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Building *</label>
                                                                            <input type="text" class="form-control"
                                                                                id="building_{{ $business['id'] }}"
                                                                                placeholder="Building Name" value="{{ $business['building'] }}">
                                                                            <span class="text-danger d-none" id="building_error_{{ $business['id'] }}">Building cannot be empty!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Street
                                                                                *</label>
                                                                            <input type="text" class="form-control"
                                                                                id="street_{{ $business['id'] }}"
                                                                                placeholder="Street Name" value="{{ $business['street'] }}">
                                                                            <span class="text-danger d-none" id="street_error_{{ $business['id'] }}">Street cannot be empty!</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Area
                                                                                *</label>
                                                                            <input type="text" class="form-control"
                                                                                id="area_{{ $business['id'] }}"
                                                                                placeholder="Area Name" value="{{ $business['area'] }}">
                                                                            <span class="text-danger d-none" id="area_error_{{ $business['id'] }}">Area cannot be empty!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">City
                                                                                *</label>
                                                                            <select class="form-select select2 js"
                                                                                aria-label="Default select example" id="city_{{ $business['id'] }}">
                                                                                <option value="0" selected>Choose City</option>
                                                                                @foreach ($masterData['cities'] as $city)
                                                                                    <option value="{{ $city->id }}"
                                                                                        @if ($city->id == $business['city_id'])
                                                                                            selected
                                                                                        @endif
                                                                                        >{{ $city->city_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="text-danger d-none" id="city_error_{{ $business['id'] }}">Please choose city!</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Landmark (Optional)
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="landmark_{{ $business['id'] }}"
                                                                                placeholder="Enter a Landmark" value="{{ $business['landmark'] }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Pin
                                                                                Code
                                                                                *</label>
                                                                            <input type="number" class="form-control"
                                                                                id="pincode_{{ $business['id'] }}"
                                                                                placeholder="Enter Pin Code" value="{{ $business['pincode'] }}">
                                                                            <span class="text-danger d-none" id="pincode_error_{{ $business['id'] }}">Pincode cannot be empty!</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Country
                                                                                *</label>
                                                                            <select class="form-select select2 js"
                                                                                aria-label="Default select example" id="country_{{ $business['id'] }}" disabled>
                                                                                <option value="{{ $business['country']['id'] }}" selected>{{ $business['country']['country_name'] }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">State
                                                                                *</label>
                                                                            <select class="form-select select2 js"
                                                                                aria-label="Default select example" id="state_{{ $business['id'] }}" disabled>
                                                                                <option value="{{ $business['state']['id'] }}" selected>{{ $business['state']['state_name'] }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="contact-details">
                                                                <h3 class="custom-h"><span>Contact</span> Details</h3>
                                                                <div class="row">
                                                                    <?php
                                                                    $officeNumber = !empty($business['office_number']) ? explode(',', $business['office_number']) : [];
                                                                    ?>
                                                                    <div class="col-xl-6" id="office_num_div_{{ $business['id'] }}">
                                                                    @if (!empty($officeNumber))
                                                                    @foreach ($officeNumber as $oKey => $officeNum)
                                                                        <label class="form-label">Office Number {{ $oKey > 0 ? $oKey+1 : '' }}</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control off_num_{{ $business['id'] }}"
                                                                                placeholder="Enter Office Landline"
                                                                                aria-label="Recipient's username"
                                                                                aria-describedby="button-addon2" value="{{ $officeNum }}" 
                                                                                name="office_num_{{ $business['id'] }}[]" id="office_number_{{ $business['id'] }}">
                                                                            @if ($oKey == 0)
                                                                                <button class="btn btn-plus add_office_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_office_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                                <span class="text-danger d-none" id="office_num_error_{{ $business['id'] }}">Office number cannot be empty!</span>
                                                                            @else
                                                                                <button class="btn btn-plus off_num_btn remove_office_num" businessId="{{ $business['id'] }}"  count="{{ $oKey > 0 ? $oKey+1 : '' }}" type="button"
                                                                                id="remove_office_num"><i
                                                                                    class="fas fa-minus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <label class="form-label">Office Number</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control off_num_{{ $business['id'] }}"
                                                                                placeholder="Enter Office Landline"
                                                                                aria-label="Recipient's username"
                                                                                aria-describedby="button-addon2" 
                                                                                name="office_num_{{ $business['id'] }}[]" id="office_number_{{ $business['id'] }}">
                                                                            <button class="btn btn-plus add_office_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_office_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    @endif
                                                                    </div>
                                                                    <?php
                                                                    $tollfreeNumber = !empty($business['tollfree_number']) ? explode(',', $business['tollfree_number']) : [];
                                                                    ?>
                                                                    <div class="col-xl-6" id="tollfree_num_div_{{ $business['id'] }}">
                                                                    @if (!empty($tollfreeNumber))
                                                                    @foreach ($tollfreeNumber as $tKey => $tollFreeNum)
                                                                        <label class="form-label">Toll Free Number {{ $tKey > 0 ? $tKey+1 : '' }}
                                                                            (Optional)</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control tollfree_num_{{ $business['id'] }}"
                                                                                placeholder="Enter Toll Free Number" value="{{ $tollFreeNum }}"
                                                                                 id="tollfree_num_{{ $business['id'] }}" name="tollfree_num_{{ $business['id'] }}[]">
                                                                            @if ($tKey == 0)
                                                                                <button class="btn btn-plus add_tollfree_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_tollfree_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                            @else
                                                                                <button class="btn btn-plus tollfree_num_btn_{{ $business['id'] }} remove_tollfree_num" 
                                                                                count="{{ $tKey > 0 ? $tKey+1 : '' }}" businessId="{{ $business['id'] }}" type="button" id="remove_tollfree_num">
                                                                                <i class="fas fa-minus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <label class="form-label">Toll Free Number
                                                                            (Optional)</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control tollfree_num_{{ $business['id'] }}"
                                                                                placeholder="Enter Toll Free Number"  id="tollfree_num_{{ $business['id'] }}" name="tollfree_num_{{ $business['id'] }}[]">
                                                                            <button class="btn btn-plus add_tollfree_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_tollfree_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <?php
                                                                    $whatsappNumber = !empty($business['whatsapp_number']) ? explode(',', $business['whatsapp_number']) : [];
                                                                    ?>
                                                                    <div class="col-xl-6" id="wapp_num_div_{{ $business['id'] }}">
                                                                    @if (!empty($whatsappNumber))
                                                                    @foreach ($whatsappNumber as $wKey => $whatsappNum)
                                                                        <label class="form-label">WhatsApp Number {{ $wKey > 0 ? $wKey+1 : '' }}</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control wapp_num_{{ $business['id'] }}"
                                                                                placeholder="Enter WhatsApp Number" value="{{ $whatsappNum }}"
                                                                                id="whatsapp_num_{{ $business['id'] }}" name="whatsapp_num_{{ $business['id'] }}[]">
                                                                            @if ($wKey == 0)
                                                                                <button class="btn btn-plus add_wapp_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_wapp_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                            @else
                                                                                <button class="btn btn-plus wapp_num_btn_{{ $business['id'] }} remove_wapp_num" businessId="{{ $business['id'] }}" 
                                                                                count="{{ $wKey > 0 ? $wKey+1 : '' }}" type="button" id="remove_wapp_num">
                                                                                <i class="fas fa-minus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <label class="form-label">WhatsApp Number</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control wapp_num_{{ $business['id'] }}"
                                                                                placeholder="Enter WhatsApp Number" 
                                                                                id="whatsapp_num_{{ $business['id'] }}" name="whatsapp_num_{{ $business['id'] }}[]">
                                                                            <button class="btn btn-plus add_wapp_num" businessId="{{ $business['id'] }}" id="add_wapp_num" type="button"
                                                                                ><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    @endif
                                                                    </div>
                                                                    <?php
                                                                    $mobNumber = !empty($business['mobile_number']) ? explode(',', $business['mobile_number']) : [];
                                                                    ?>
                                                                    <div class="col-xl-6" id="mob_num_div_{{ $business['id'] }}">
                                                                    @if (!empty($mobNumber))
                                                                    @foreach ($mobNumber as $mKey => $mobNum)
                                                                        <label class="form-label">Mobile Number {{ $mKey > 0 ? $mKey+1 : '' }}
                                                                            (Optional)</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="email" class="form-control mob_num_{{ $business['id'] }}"
                                                                                placeholder="Enter Mobile Number" value="{{ $mobNum }}"
                                                                                 id="mobile_num_{{ $business['id'] }}" name="mobile_num_{{ $business['id'] }}[]">
                                                                            @if ($mKey == 0)
                                                                                <button class="btn btn-plus add_mob_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_mob_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                            @else
                                                                                <button class="btn btn-plus mob_num_btn_{{ $business['id'] }} remove_mob_num" businessId="{{ $business['id'] }}" 
                                                                                count="{{ $mKey > 0 ? $mKey+1 : '' }}" type="button" id="remove_mob_num">
                                                                                <i class="fas fa-minus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <label class="form-label">Mobile Number
                                                                            (Optional)</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="email" class="form-control mob_num_{{ $business['id'] }}"
                                                                                placeholder="Enter Mobile Number"
                                                                                 id="mobile_num_{{ $business['id'] }}" name="mobile_num_{{ $business['id'] }}[]">
                                                                            <button class="btn btn-plus add_mob_num" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_mob_num"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <?php
                                                                    $emailId = !empty($business['email_id']) ? explode(',', $business['email_id']) : [];
                                                                    ?>
                                                                    <div class="col-xl-6" id="email_div_{{ $business['id'] }}">
                                                                    @if (!empty($emailId))
                                                                    @foreach ($emailId as $emKey => $email)
                                                                        <label class="form-label">Email Id {{ $emKey > 0 ? $emKey+1 : '' }}</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="email" class="form-control email_id_{{ $business['id'] }}"
                                                                                placeholder="Enter Email ID" value="{{ $email }}"
                                                                                 id="email_{{ $business['id'] }}" name="email_{{ $business['id'] }}[]">
                                                                            @if ($emKey == 0)
                                                                                <button class="btn btn-plus add_email" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_email"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                                <span class="text-danger d-none" id="email_error_{{ $business['id'] }}">Email ID cannot be empty!</span>
                                                                            @else
                                                                                <button class="btn btn-plus email_btn_{{ $business['id'] }} remove_email" businessId="{{ $business['id'] }}" 
                                                                                count="{{ $mKey > 0 ? $mKey+1 : '' }}" type="button" id="remove_email">
                                                                                <i class="fas fa-minus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <label class="form-label">Email Id</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="email" class="form-control email_id_{{ $business['id'] }}"
                                                                                placeholder="Enter Email ID"
                                                                                 id="email_{{ $business['id'] }}" name="email_{{ $business['id'] }}[]">
                                                                            <button class="btn btn-plus add_email" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_email"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                            <span class="text-danger d-none" id="email_error_{{ $business['id'] }}">Email ID cannot be empty!</span>
                                                                        </div>
                                                                    @endif
                                                                    </div>
                                                                    <?php
                                                                    $website = !empty($business['website']) ? explode(',', $business['website']) : [];
                                                                    ?>
                                                                    <div class="col-xl-6" id="website_div_{{ $business['id'] }}">
                                                                    @if (!empty($website))
                                                                    @foreach ($website as $webKey => $web)
                                                                        <label class="form-label">Website {{ $webKey > 0 ? $webKey+1 : '' }}</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control website_{{ $business['id'] }}"
                                                                                placeholder="Enter web URL" value="{{ $web }}" 
                                                                                 id="website_{{ $business['id'] }}" name="website_{{ $business['id'] }}[]">
                                                                            @if ($webKey == 0)
                                                                                <button class="btn btn-plus add_website" businessId="{{ $business['id'] }}" type="button"
                                                                                id="add_website"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                            @else
                                                                                <button class="btn btn-plus website_btn_{{ $business['id'] }} remove_website" 
                                                                                count="{{ $webKey > 0 ? $webKey+1 : '' }}" businessId="{{ $business['id'] }}" type="button" id="remove_website">
                                                                                <i class="fas fa-minus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <label class="form-label">Website</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control website_{{ $business['id'] }}"
                                                                                placeholder="Enter web URL" 
                                                                                 id="website_{{ $business['id'] }}" name="website_{{ $business['id'] }}[]">
                                                                            <button class="btn btn-plus add_website" type="button" businessId="{{ $business['id'] }}"
                                                                                id="add_website"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        </div>
                                                                    @endif
                                                                    </div>

                                                                </div>
                                                                <div class="row" id="sm_div_{{ $business['id'] }}">
                                                                    @if (count($business['social_media']) > 0)
                                                                        @foreach ($business['social_media'] as $smKey => $smData)
                                                                            <div class="col-xl-6">
                                                                                <label for="exampleFormControlInput1"
                                                                                    class="form-label">Social
                                                                                    Media {{ $smKey > 0 ? $smKey+1 : '' }} (Optional)</label>
                                                                                <select class="form-select select2 js"
                                                                                    aria-label="Default select example" 
                                                                                    id="social_media_{{ $business['id'] }}" name="social_media_{{ $business['id'] }}[]">
                                                                                    <option value="0" selected>Choose Socail Media</option>
                                                                                    @foreach ($masterData['social_medias'] as $sm)
                                                                                        <option value="{{ $sm->id }}"
                                                                                            @if ($sm->id == $smData->social_media)
                                                                                                selected
                                                                                            @endif
                                                                                            >{{ $sm->sm_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <label class="form-label">Social Media URL</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="email" class="form-control sm_url_{{ $business['id'] }}"
                                                                                        placeholder="Enter Social Media URL" value="{{ $smData['url'] }}" 
                                                                                         id="social_media_url_{{ $business['id'] }}" name="social_media_url_{{ $business['id'] }}[]">
                                                                                    @if ($smKey == 0)
                                                                                        <button class="btn btn-plus add_sm_url" businessId="{{ $business['id'] }}" type="button"
                                                                                        id="add_sm_url"><i
                                                                                            class="fas fa-plus"></i></button>
                                                                                    @else
                                                                                        <button class="btn btn-plus sm_url_btn_{{ $business['id'] }} remove_sm_url" 
                                                                                        count="{{ $smKey > 0 ? $smKey+1 : '' }}" businessId="{{ $business['id'] }}" type="button" id="remove_sm_url">
                                                                                        <i class="fas fa-minus"></i></button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div class="col-xl-6">
                                                                            <label for="exampleFormControlInput1"
                                                                                class="form-label">Social
                                                                                Media (Optional)</label>
                                                                            <select class="form-select select2 js"
                                                                                aria-label="Default select example" 
                                                                                id="social_media_{{ $business['id'] }}" name="social_media_{{ $business['id'] }}[]">
                                                                                <option value="0" selected>Choose Socail Media</option>
                                                                                @foreach ($masterData['social_medias'] as $sm)
                                                                                    <option value="{{ $sm->id }}">{{ $sm->sm_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <label class="form-label">Social Media URL</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="email" class="form-control sm_url_{{ $business['id'] }}"
                                                                                    placeholder="Enter Social Media URL" 
                                                                                     id="social_media_url_{{ $business['id'] }}" name="social_media_url_{{ $business['id'] }}[]">
                                                                                <button class="btn btn-plus add_sm_url" businessId="{{ $business['id'] }}" type="button"
                                                                                    id="add_sm_url"><i
                                                                                        class="fas fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="location-details mgn-top-20">
                                                        <h3 class="custom-h">Business<span> Location</span></h3>
                                                        <div class="location-wrapper">
                                                            <!-- <div class="form-group">
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
                                                            </div> -->
                                                            <div id="us2_{{ $business['id'] }}" style="width: 550px; height: 400px;"></div>
                                                            <div class="clearfix">&nbsp;</div>
                                                            <div class="m-t-small">
                                                                <label class="p-r-small col-sm-1 control-label">Lat.:</label>
                                                                <div class="col-sm-1">
                                                                    <input type="text" name="lattitude"  class="form-control" style="width: 110px" id="us2-lat_{{ $business['id'] }}" value="{{ $business['location_lattitude'] }}" />
                                                                </div>
                                                                <label class="p-r-small col-sm-1 control-label">Long.:</label>
                                                                <div class="col-sm-1">
                                                                    <input type="text" name="longitude"  class="form-control" style="width: 110px" id="us2-lon_{{ $business['id'] }}" value="{{ $business['location_longitude'] }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="keyword-section mgn-top-30">
                                                        <div class="keyword-wrapper">
                                                            <h3 class="custom-h">Business<span> Keywords</span></h3>
                                                            <div class="search-bar mgn-btm-20">
                                                                <div class="row">
                                                                    <div class="col-xl-2">
                                                                    </div>
                                                                    <div class="col-xl-8">
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Search Keyword">
                                                                            <button class="btn btn-primary btn-search"
                                                                                type="button" id="button-addon2"><i
                                                                                    class="fas fa-search"></i><span>Search</span></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="keywords">
                                                                <?php $businessKeywords = !empty($business['keywords']) ? array_column($business['keywords'], 'keyword_id') : []; ?>
                                                                @foreach ($masterData['keywords'] as $keyword)
                                                                    <?php
                                                                        $exist = 0;
                                                                        if (!empty($businessKeywords) && in_array($keyword->id, $businessKeywords))
                                                                            $exist = 1;
                                                                    ?>

                                                                    <div class="keyword">
                                                                        <input type="checkbox" class="btn-check" name="keyword_{{ $business['id'] }}"  
                                                                            id="keyword_{{ $keyword->id }}" autocomplete="off" value="{{ $keyword->id }}"
                                                                            @if ($exist == 1)
                                                                                checked
                                                                            @endif 
                                                                            >
                                                                        <label class="btn btn-outline-primary"
                                                                            for="keyword_{{ $keyword->id }}">{{ $keyword->keyword_name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12 mgn-top-30">
                                                                    <div class="center-align">
                                                                        <button type="button"
                                                                            class="btn btn-submit-outline resetBasic" businessId="{{ $business['id'] }}">Reset</button>
                                                                        <button type="button"
                                                                            class="btn btn-submit-primary updateBusinessInfo" businessId="{{ $business['id'] }}">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="pills-pageContent_{{ $business['id'] }}" role="tabpanel"
                                                    aria-labelledby="pills-pageContent-tab">
                                                    <div class="about-content-section">
                                                        <h3 class="custom-h">Basic <span>Info</span></h3>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">About</label>
                                                                    <textarea class="form-control"
                                                                        id="about_{{ $business['id'] }}"
                                                                        rows="3">{{ $business['about'] }}</textarea>
                                                                    <span class="text-danger d-none" id="about_error_{{ $business['id'] }}">About cannot be empty!</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="custom-h mgn-top-20"><span>Timings</span></h3>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Choose Timing</label>
                                                                    <?php $businessTiming = $business['timing']; ?>
                                                                    <select class="form-select select2 js"
                                                                        aria-label="Default select example" id="timing_{{ $business['id'] }}">
                                                                        <option value="0" selected>Select timing</option>
                                                                        <option value="1"
                                                                        @if ($businessTiming == 1)
                                                                            selected
                                                                        @endif 
                                                                        >Monday - Friday</option>
                                                                        <option value="2"
                                                                        @if ($businessTiming == 2)
                                                                            selected
                                                                        @endif
                                                                        >Monday - Saturday</option>
                                                                        <option value="3"
                                                                        @if ($businessTiming == 3)
                                                                            selected
                                                                        @endif
                                                                        >Everyday</option>
                                                                        <option value="4"
                                                                        @if ($businessTiming == 4)
                                                                            selected
                                                                        @endif
                                                                        >Custom</option>
                                                                    </select>
                                                                    <span class="text-danger d-none" id="timing_error_{{ $business['id'] }}">Please select a timing</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Timing Value</label>
                                                                    <input type="text" class="form-control" id="timingValue_{{ $business['id'] }}" 
                                                                        placeholder="Eg: 9 AM - 6 PM" value="{{ $business['timing_value'] }}">
                                                                    <span class="text-danger d-none" id="timingVal_error_{{ $business['id'] }}">Timing value cannot be empty!</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="custom-h mgn-top-20"><span>Headlines</span></h3>
                                                        <div class="row" id="headlineData_{{ $business['id'] }}">
                                                            @if (count($business['headlines']) > 0)
                                                                @foreach ($business['headlines'] as $headKey => $headlineData)
                                                                    <div class="col-xl-6 {{ $headKey == 0 ? 'headlines_'.$business['id'] : '' }}">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Headline {{ $headKey > 0 ? $headKey+1 : '' }}</label>
                                                                            <select class="form-select select2 js headline_{{ $business['id'] }}"
                                                                                aria-label="Default select example" name="headline_{{ $business['id'] }}[]">
                                                                                <option value="0" selected>Select headline</option>
                                                                                @foreach ($masterData['headlines'] as $headline)
                                                                                    <option value="{{ $headline->id }}"
                                                                                    @if ($headline->id == $headlineData->headline)
                                                                                    selected
                                                                                    @endif
                                                                                    >{{ $headline->headline_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Headline Content</label>
                                                                            <textarea class="form-control"
                                                                                name="headlineContent_{{ $business['id'] }}[]"
                                                                                rows="3">{{ $headlineData->content }}</textarea>
                                                                        </div>
                                                                    </div>                                                                    
                                                                @endforeach
                                                            @else
                                                                <div class="col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Headline 1</label>
                                                                        <select class="form-select select2 js headline_{{ $business['id'] }}"
                                                                            aria-label="Default select example" name="headline_{{ $business['id'] }}[]">
                                                                            <option value="0" selected>Select headline</option>
                                                                            @foreach ($masterData['headlines'] as $headline)
                                                                                <option value="{{ $headline->id }}">{{ $headline->headline_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Headline Content</label>
                                                                        <textarea class="form-control"
                                                                            name="headlineContent_{{ $business['id'] }}[]"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <button type="button" class="btn btn-outline-primary addHeadlines" businessId="{{ $business['id'] }}">+ Add
                                                                    More Headlines</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12 mgn-top-30">
                                                                <div class="btn-wrapper">
                                                                    <button type="button" class="btn btn-submit-outline resetPageContent" businessId="{{ $business['id'] }}">Reset</button>
                                                                    <button type="button"
                                                                        class="btn btn-submit-primary updatePageContent" businessId="{{ $business['id'] }}" id="updatePageContent">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-offers_{{ $business['id'] }}" role="tabpanel"
                                                    aria-labelledby="pills-offers-tab">
                                                    <div class="offers-content">
                                                        <h3 class="custom-h">Add <span> Offers</span></h3>
                                                        <form name="image_form" id="offerForm_{{ $business['id'] }}" method="post" enctype="multipart/form-data" action="addBusinessOffer">
                                                            <input type="hidden" name="business_id" value="{{ $business['id'] }}">
                                                            @if (count($business['offers']) > 0)
                                                                @foreach ($business['offers'] as $offer)
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Upload Offer Image</label>
                                                                                <div class="input-group file-upload">
                                                                                    <input type="text" class="form-control file-input"
                                                                                        placeholder="Chose file(s) ..."
                                                                                        readonly="readonly" id="imageInput_{{ $business['id'] }}" value="{{ $offer->offer_image }}" data-action="display" />
                                                                                    <input type="file" class="hidden-xs-up" name="imgae" id="offer_image_{{ $business['id'] }}">
                                                                                    <button class="btn btn-primary-outline"
                                                                                        type="button"
                                                                                        data-action="browse">Browse</button>
                                                                                    <span class="text-danger d-none" id="image_error_{{ $business['id'] }}">Please select an image</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Offer Heading</label>
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Eg: Flat 60% OFF" name="offer_heading" id="offer_heading_{{ $business['id'] }}" value="{{ $offer->heading }}">
                                                                                <span class="text-danger d-none" id="heading_error_{{ $business['id'] }}">Heading cannot be empty!</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Business Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $business['business_name'] }}" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Location</label>
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Kochi, Kerala" name="offer_location" id="offer_location_{{ $business['id'] }}" value="{{ $offer->location }}">
                                                                                <span class="text-danger d-none" id="location_error_{{ $business['id'] }}">Location cannot be empty</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Offer percentage</label>
                                                                                <input type="number" class="form-control"
                                                                                    placeholder="60" name="offer_amount" id="offer_amount_{{ $business['id'] }}" value="{{ $offer->offer_amount }}">
                                                                                <span class="text-danger d-none" id="amount_error_{{ $business['id'] }}">Offer cannot be empty</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Offer Description</label>
                                                                                <textarea class="form-control" name="offer_description" 
                                                                                    id="offer_description_{{ $business['id'] }}"
                                                                                    rows="3">{{ $offer->description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Upload Offer Image</label>
                                                                            <div class="input-group file-upload">
                                                                                <input type="text" class="form-control file-input"
                                                                                    placeholder="Chose file(s) ..."
                                                                                    readonly="readonly" id="imageInput_{{ $business['id'] }}" data-action="display" />
                                                                                <input type="file" class="hidden-xs-up" name="imgae" id="offer_image_{{ $business['id'] }}">
                                                                                <button class="btn btn-primary-outline"
                                                                                    type="button"
                                                                                    data-action="browse">Browse</button>
                                                                                <span class="text-danger d-none" id="image_error_{{ $business['id'] }}">Please select an image</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Offer Heading</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Eg: Flat 60% OFF" name="offer_heading" id="offer_heading_{{ $business['id'] }}">
                                                                            <span class="text-danger d-none" id="heading_error_{{ $business['id'] }}">Heading cannot be empty!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Business Name</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $business['business_name'] }}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Location</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Kochi, Kerala" name="offer_location" id="offer_location_{{ $business['id'] }}">
                                                                            <span class="text-danger d-none" id="location_error_{{ $business['id'] }}">Location cannot be empty</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Offer percentage</label>
                                                                            <input type="number" class="form-control"
                                                                                placeholder="60" name="offer_amount" id="offer_amount_{{ $business['id'] }}">
                                                                            <span class="text-danger d-none" id="amount_error_{{ $business['id'] }}">Offer cannot be empty</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Offer Description</label>
                                                                            <textarea class="form-control" name="offer_description" 
                                                                                id="offer_description_{{ $business['id'] }}"
                                                                                rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="row">
                                                                <div class="col-xl-12 mgn-top-10">
                                                                    <div class="btn-wrapper">
                                                                        <button type="button"
                                                                            class="btn btn-submit-outline resetOffer" businessId="{{ $business['id'] }}">Reset</button>
                                                                        <button type="button"
                                                                            class="btn btn-submit-primary addOffer" businessId="{{ $business['id'] }}">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-subscription_{{ $business['id'] }}" role="tabpanel"
                                                    aria-labelledby="pills-subscription-tab">
                                                    <div class="subscription">
                                                        <h3 class="custom-h">Our <span> Plans</span></h3>
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <div class="subscription-card">
                                                                    <div class="amount">
                                                                        <h3><s>₹ 599 <span>/ Month</span></s></h3>
                                                                        <h2>₹ 499<span>/Month</span></h2>
                                                                    </div>
                                                                    <div class="feature-section">
                                                                        <h3 class="sub-h2">Basic
                                                                        </h3>
                                                                        <div class="sub-ul">
                                                                            <div class="sub-li">
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Highlighting on search</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Add upto 10 Photos</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Click to Call</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Inform when Target customer arrive
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>List up to 10 Sub Categories</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Ads</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Click to Locate</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/cross.svg">
                                                                                    <p>Add to the Featured List in the Home
                                                                                        Page
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/cross.svg">
                                                                                    <p>Lorem ipsum dolor
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="block-btn-wrapper">
                                                                            <button type="button"
                                                                                class="btn btn-submit-primary">Subscribe
                                                                                Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="subscription-card highlighted">
                                                                    <div class="amount">
                                                                        <h3><s>₹ 899 <span>/ Month</span></s></h3>
                                                                        <h2>₹ 699<span>/Month</span></h2>
                                                                    </div>
                                                                    <div class="feature-section">
                                                                        <h3 class="sub-h2">Advanced
                                                                        </h3>
                                                                        <div class="sub-ul">
                                                                            <div class="sub-li">
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Medium Positioning</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Ads Content Page</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Add upto 20 Photos</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Click to Call
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Click to Locate</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Go Profile when click on Ads
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>Inform when Target customer arrive
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/chk_black.svg">
                                                                                    <p>List Up to 25 Sub Categories</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img
                                                                                        src="assets/images/svg/cross_black.svg">
                                                                                    <p>Add to the featured list in the Home
                                                                                        Page
                                                                                    </p>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="block-btn-wrapper">
                                                                            <button type="button"
                                                                                class="btn btn-submit-primary">Subscribe
                                                                                Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="subscription-card">
                                                                    <div class="amount">
                                                                        <h3><s>₹ 1199 <span>/ Month</span></s></h3>
                                                                        <h2>₹ 999<span>/Month</span></h2>
                                                                    </div>
                                                                    <div class="feature-section">
                                                                        <h3 class="sub-h2">Professional
                                                                        </h3>
                                                                        <div class="sub-ul">
                                                                            <div class="sub-li">
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Top Positioning</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Ad on Home Page</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Add unlimited Photos
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Click to Call
                                                                                    </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Click to Locate</p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Go Profile when click on Ads </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Inform when Target customer arrive
                                                                                    </p>
                                                                                </div>

                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>List unlimited Sub Categories </p>
                                                                                </div>
                                                                                <div class="sub-cnt">
                                                                                    <img src="assets/images/svg/chk.svg">
                                                                                    <p>Add to the featured list in the Home
                                                                                        Page</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="block-btn-wrapper">
                                                                            <button type="button"
                                                                                class="btn btn-submit-primary">Subscribe
                                                                                Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading"
                                rel="tab3">
                                <div class="title-wrapper">
                                    <i class="far fa-heart"></i> Saved Items
                                </div>
                            </a>
                            <div id="tab3" class="js-vertical-tab-content vertical-tab-content">
                                <div class="savd-content">
                                    <h3 class="custom-h"><span>Saved Items</span></h3>
                                    <div class="listing-wrapper">
                                        @foreach ($savedItems as $savedItem)
                                            <a href="{{ url('/detail/'. base64_encode($savedItem['id'])) }}" class="listing-card">
                                                <div class="content">
                                                    <div class="image-wrapper">
                                                        @if (!empty($savedItem['profile_photo']))
                                                            <img src="{{ asset('images/business/' . $savedItem['id'] . '/' . $savedItem['profile_photo']) }}"
                                                            alt="profile-image">
                                                        @else
                                                            <img src="{{ asset('images/default-business.png') }}" alt="profile-image">
                                                        @endif
                                                    </div>
                                                    <div class="txt-section">
                                                        <div class="flex-container top-section">
                                                            <h5>{{ $savedItem['business_name'] }}</h5>
                                                            <div class="right-align">
                                                                <button class="btn btn-save"><i
                                                                        class="fas fa-heart"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="flex-container bottom-section">
                                                            <div class="btn-warpper">
                                                                <p>{{ $savedItem['category'] }}</p>
                                                                <p>{{ $savedItem['city'] . ', ' . $savedItem['state'] }}</p>
                                                            </div>
                                                            @if (!empty($savedItem['rating']['rating_avg'] ))
                                                                <div class="overall-rating">
                                                                    @if ($savedItem['rating']['rating_avg'] > 4.6)
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @endif
                                                                    <p>{{ $savedItem['rating']['rating_avg'] }}</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <a href=""
                                class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading disp-none"
                                rel="tab5">
                                <div class="title-wrapper">
                                    <i class="fas fa-history"></i> My Activities
                                </div>
                            </a>
                            <div id="tab4" class="js-vertical-tab-content vertical-tab-content">
                                <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Phasellus dui urna, mollis vel suscipit in, pharetra at ligula. Pellentesque a est
                                    vel est fermentum pellentesque sed sit amet dolor. Nunc in dapibus nibh. Aliquam
                                    erat volutpat. Phasellus vel dui sed nibh iaculis convallis id sit amet urna. Proin
                                    nec tellus quis justo consequat accumsan. Vivamus turpis enim, auctor eget placerat
                                    eget, aliquam ut sapien.</p>
                            </div>
                            <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading "
                                rel="tab5">
                                <div class="title-wrapper">
                                    <i class="far fa-bell"></i> Notifications
                                </div>
                            </a>
                            <div id="tab5" class="js-vertical-tab-content vertical-tab-content">
                                <h3 class="custom-h">Your <span>Notifications</span></h3>
                                <a href="" class="feedback-card bg-white no-bdr notification-card">
                                    <div class="dp">
                                        <i class="far fa-comments"></i>
                                    </div>
                                    <div class="main-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>


                                    </div>
                                    <div class="right-portion">
                                        <div class="flex-container flex-v-cntr">
                                            <i class="far fa-clock"></i>
                                            <p class="nopad">11:12 AM</p>
                                        </div>

                                    </div>
                                </a>
                                <a href="" class="feedback-card bg-white no-bdr notification-card">
                                    <div class="dp">
                                        <i class="fas fa-info"></i>
                                    </div>
                                    <div class="main-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>


                                    </div>
                                    <div class="right-portion">
                                        <div class="flex-container flex-v-cntr">
                                            <i class="far fa-clock"></i>
                                            <p class="nopad">11:12 AM</p>
                                        </div>

                                    </div>
                                </a>
                                <a href="" class="feedback-card bg-white no-bdr notification-card">
                                    <div class="dp">
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <div class="main-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>


                                    </div>
                                    <div class="right-portion">
                                        <div class="flex-container flex-v-cntr">
                                            <i class="far fa-clock"></i>
                                            <p class="nopad">11:12 AM</p>
                                        </div>

                                    </div>
                                </a>
                                <a href="" class="feedback-card bg-white no-bdr notification-card">
                                    <div class="dp">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                    <div class="main-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>


                                    </div>
                                    <div class="right-portion">
                                        <div class="flex-container flex-v-cntr">
                                            <i class="far fa-clock"></i>
                                            <p class="nopad">11:12 AM</p>
                                        </div>

                                    </div>
                                </a>
                                <a href="" class="feedback-card bg-white no-bdr notification-card">
                                    <div class="dp">
                                        <i class="fas fa-exclamation"></i>
                                    </div>
                                    <div class="main-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>


                                    </div>
                                    <div class="right-portion">
                                        <div class="flex-container flex-v-cntr">
                                            <i class="far fa-clock"></i>
                                            <p class="nopad">11:12 AM</p>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <a href=""
                                class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading disp-none"
                                rel="tab5">
                                <div class="title-wrapper">
                                    <i class="fas fa-cog"></i> Settings
                                </div>
                            </a>
                            <div id="tab6" class="js-vertical-tab-content vertical-tab-content">
                                <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Phasellus dui urna, mollis vel suscipit in, pharetra at ligula. Pellentesque a est
                                    vel est fermentum pellentesque sed sit amet dolor. Nunc in dapibus nibh. Aliquam
                                    erat volutpat. Phasellus vel dui sed nibh iaculis convallis id sit amet urna. Proin
                                    nec tellus quis justo consequat accumsan. Vivamus turpis enim, auctor eget placerat
                                    eget, aliquam ut sapien.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!------------------------------------------------------------------Profile Pic Change Pop up---------------------------------------------------->
    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header flex-heading nopad">
                    <h3 class="custom-h text-center"><span>Crop</span>Profile Picture</h3>
                    <button type="button" class="close btn-close btn" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                    <h4 class="modal-title" id="myModalLabel">
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="upload-demo" class="center-block center-block"></div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="btn-wrapper mgn-top-20 flex-h-cntr">
                                <button type="button" class="btn btn-submit-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-submit-primary" id="cropImageBtn">Crop</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------Cover Pic Change Pop up---------------------------------------------------->
    <div class="modal fade" id="coverImagePop" tabindex="-1" role="dialog" aria-labelledby="coverImagePopLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1100px;">
            <div class="modal-content">
                <div class="modal-header flex-heading nopad">
                    <h3 class="custom-h text-center"><span>Crop</span> Cover Image</h3>
                    <button type="button" class="close btn-close btn" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true"></span></button>
                    <h4 class="modal-title" id="coverImagePopLabel">
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="cover-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="btn-wrapper mgn-top-20 flex-h-cntr">
                                <button type="button" class="btn btn-submit-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-submit-primary" id="coverImageBtn">Crop</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var base_url = '<?= url('/'); ?>';
        var social_medias = <?= json_encode($masterData['social_medias']); ?>;
        var businesses = <?= json_encode($businesses); ?>;
        var headlines = <?= json_encode($masterData['headlines']); ?>;
    </script>

    <script src="{{ asset('js/custom/profile.js') }}"></script>

    <!-- <script type="text/javascript" src='https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyAHP1MaKol9sOqu0SdtES0BucCP9Ckw4Ak'></script> -->
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAHP1MaKol9sOqu0SdtES0BucCP9Ckw4Ak'></script>
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHP1MaKol9sOqu0SdtES0BucCP9Ckw4Ak&callback=initMap"></script> -->
    <script src="{{ asset('js/locationPicker/locationpicker.jquery.min.js') }}"></script>
    <script>
        $(businesses).each(function(i, item) {
            $('#us2_'+item.id).locationpicker({
                location: {
                    latitude: item.location_lattitude != '' && item.location_lattitude != null ? item.location_lattitude : 9.98127638270655,
                    longitude: item.location_longitude != '' && item.location_longitude != null ? item.location_longitude : 76.29632506793212
                },
                radius: 300,
                inputBinding: {
                    latitudeInput: $('#us2-lat_'+item.id),
                    longitudeInput: $('#us2-lon_'+item.id)
                    // radiusInput: $('#us2-radius'),
                    // locationNameInput: $('#us2-address')
                },
                enableAutocomplete: true
            });
        });
    </script>

    @include('includes.footer')