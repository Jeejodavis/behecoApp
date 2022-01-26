
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#business_select').change(function() {
    var businessId = $(this).val();
    $('.business-information').hide();
    $('#businessInform_'+businessId).show();
});

$('.add_office_num').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.off_num_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<label class="form-label" id="off_num_label_' + businessId + '_' + count + '">Office Number ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control off_num_' + businessId + '" placeholder="Enter Office Landline" aria-label="Recipient\'s username" aria-describedby="button-addon2" name="office_num[]">';
    text += '<button class="btn btn-plus off_num_btn_' + businessId + ' remove_office_num" businessId="' + businessId + '" count="' + count + '" type="button" id="remove_office_num"><i class="fas fa-minus"></i></button></div>';
    $('#office_num_div_' + businessId).append(text);
});

$(document).on('click', '.remove_office_num', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $(this).parent().remove();
    $('#off_num_label_' + businessId + '_' + count).remove();
    $('.off_num_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $('#off_num_label_' + businessId + '_' +lCount).text('Office Number ' + (lCount-1));
            $('#off_num_label_' + businessId + '_' +lCount).attr('id', 'off_num_label_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.add_tollfree_num').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.tollfree_num_'+ businessId).length;
    count = parseInt(count) + 1;
    var text = '<label class="form-label" id="tollfree_num_label_' + businessId + '_' + count + '">Toll Free Number ' + count + ' (Optional)</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control tollfree_num_' + businessId + '" placeholder="Enter Toll Free Number" name="tollfree_num[]">';
    text += '<button class="btn btn-plus tollfree_num_btn_' + businessId + ' remove_tollfree_num" businessId="' + businessId + '" count="' + count + '" type="button" id="remove_tollfree_num"><i class="fas fa-minus"></i></button></div>';
    $('#tollfree_num_div_' + businessId).append(text);
});

$(document).on('click', '.remove_tollfree_num', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $(this).parent().remove();
    $('#tollfree_num_label_' + businessId + '_' +count).remove();
    $('.tollfree_num_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $('#tollfree_num_label_' + businessId + '_' +lCount).text('Toll Free Number ' + (lCount-1));
            $('#tollfree_num_label_' + businessId + '_' +lCount).attr('id', 'tollfree_num_label_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.add_wapp_num').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.wapp_num_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<label class="form-label" id="wapp_num_label_' + businessId + '_' + count + '">WhatsApp Number ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control wapp_num_' + businessId + '" placeholder="Enter WhatsApp Number" name="whatsapp_num_' + businessId + '[]">';
    text += '<button class="btn btn-plus wapp_num_btn_' + businessId + ' remove_wapp_num" businessId="'+ businessId +'" count="' + count + '" type="button" id="remove_wapp_num"><i class="fas fa-minus"></i></button></div>';
    $('#wapp_num_div_'+businessId).append(text);
});

$(document).on('click', '.remove_wapp_num', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $(this).parent().remove();
    $('#wapp_num_label_' + businessId + '_' +count).remove();
    $('.wapp_num_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $('#wapp_num_label_' + businessId + '_' +lCount).text('WhatsApp Number ' + (lCount-1));
            $('#wapp_num_label_' + businessId + '_' +lCount).attr('id', 'wapp_num_label_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.add_mob_num').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.mob_num_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<label class="form-label" id="mob_num_label_' + businessId + '_' + count + '">Mobile Number ' + count + ' (Optional)</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control mob_num_' + businessId + '" placeholder="Enter Mobile Number" name="mobile_num_' + businessId + '[]">';
    text += '<button class="btn btn-plus mob_num_btn_' + businessId + ' remove_mob_num" businessId="' + businessId + '" count="' + count + '" type="button" id="remove_mob_num"><i class="fas fa-minus"></i></button></div>';
    $('#mob_num_div_' + businessId).append(text);
});

$(document).on('click', '.remove_mob_num', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $(this).parent().remove();
    $('#mob_num_label_' + businessId + '_' +count).remove();
    $('.mob_num_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $('#mob_num_label_' + businessId + '_' +lCount).text('Mobile Number ' + (lCount-1) + ' (Optional)');
            $('#mob_num_label_' + businessId + '_' +lCount).attr('id', 'mob_num_label_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.add_email').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.email_id_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<label class="form-label" id="email_label_' + businessId + '_' + count + '">Email Id ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="email" class="form-control email_id_' + businessId + '" placeholder="Enter Email ID" name="email_' + businessId + '[]">';
    text += '<button class="btn btn-plus email_btn_' + businessId + ' remove_email" businessId="' + businessId + '" count="' + count + '" type="button" id="remove_email"><i class="fas fa-minus"></i></button></div>';
    $('#email_div_' + businessId).append(text);
});

$(document).on('click', '.remove_email', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $(this).parent().remove();
    $('#email_label_' + businessId + '_' +count).remove();
    $('.email_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $('#email_label_' + businessId + '_' +lCount).text('Email Id ' + (lCount-1));
            $('#email_label_' + businessId + '_' +lCount).attr('id', 'email_label_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.add_website').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.website_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<label class="form-label" id="website_label_' + businessId + '_' + count + '">Website ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="text" class="form-control website_' + businessId + '" placeholder="Enter Web URL" name="website_' + businessId + '[]">';
    text += '<button class="btn btn-plus website_btn_' + businessId + ' remove_website" businessId="' + businessId + '" count="' + count + '" type="button" id="remove_website"><i class="fas fa-minus"></i></button></div>';
    $('#website_div_'+businessId).append(text);
});

$(document).on('click', '.remove_website', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $(this).parent().remove();
    $('#website_label_' + businessId + '_' +count).remove();
    $('.website_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $('#website_label_' + businessId + '_' +lCount).text('Website ' + (lCount-1));
            $('#website_label_' + businessId + '_' +lCount).attr('id', 'website_label_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.add_sm_url').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.sm_url_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<div class="col-xl-6 sm_divs_' + businessId + '" count="' + count + '" id="sm_div_' + businessId + '_' + count + '"><label for="exampleFormControlInput1" class="form-label">Social Media ' + count + ' (Optional)</label>';
    text += '<select class="form-select select2 js" aria-label="Default select example" name="social_media_' + businessId + '[]" id="sm_select_' + businessId + '_' + count +'">';
    text += '<option selected>Choose Socail Media</option>';
    $(social_medias).each(function(i, item) {
        text += '<option value="'+ item.id +'">'+ item.sm_name +'</option>';
    });
    text += '</select></div><div class="col-xl-6 sm_url_divs_' + businessId + '" count="' + count + '" id="sm_url_div_' + businessId + '_' + count + '">';
    text += '<label class="form-label">Social Media URL</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="text" class="form-control sm_url_' + businessId + '" placeholder="Enter Social Media URL" name="social_media_url_' + businessId + '[]">';
    text += '<button class="btn btn-plus sm_url_btn_' + businessId + ' remove_sm_url" businessId="'+ businessId +'" count="' + count + '" type="button" id="remove_sm_url"><i class="fas fa-minus"></i></button></div>';
    $('#sm_div_' + businessId).append(text);
    $('#sm_select_' + businessId + '_' +count).select2();
});

$(document).on('click', '.remove_sm_url', function() {
    var businessId = $(this).attr('businessId');
    var count = $(this).attr('count');
    $('#sm_div_' + businessId + '_' + count).remove();
    $('#sm_url_div_' + businessId + '_' + count).remove();
    $('.sm_url_btn_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $(this).attr('count', lCount-1);
        }
    });
    $('.sm_divs_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $(this).children('label').text('Social Media ' + (lCount-1) + ' (Optional)');
            $(this).attr('id', 'sm_div_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
    $('.sm_url_divs_' + businessId).each(function() {
        var lCount = $(this).attr('count');
        if (count < lCount) {
            $(this).attr('id', 'sm_url_div_' + businessId + '_' + (lCount-1));
            $(this).attr('count', lCount-1);
        }
    });
});

$('.addHeadlines').click(function() {
    var businessId = $(this).attr('businessId');
    var count = $('.headline_' + businessId).length;
    count = parseInt(count) + 1;
    var text = '<div class="col-xl-6 headlines_'+ businessId +'"><div class="mb-3">';
    text += '<label class="form-label">Headline ' + count + '</label>';
    text += '<select class="form-select select2 js headline_' + businessId + '" id="headline_select_' + businessId + '_' +count+'" aria-label="Default select example" name="headline_' + businessId + '[]">';
    text += '<option value="0" selected>Select headline</option>';
    $(headlines).each(function(i, item) {
        text += '<option value="'+ item.id +'">'+ item.headline_name +'</option>';
    });
    text += '</select></div>';
    text += '<div class="mb-3"><label class="form-label">Headline Content</label>';
    text += '<textarea class="form-control" name="headlineContent_' + businessId + '[]" rows="3"></textarea>';
    text += '</div></div>';
    $('#headlineData_'+businessId).append(text);
    $('#headline_select_' + businessId + '_' +count).select2();
});


$('#category').change(function() {
    var category = $(this).val();
    $.ajax({
        url: base_url+"/subcategory/"+category,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            if (aData.length > 0) {
                var optRow = '<option value="0" selected>Choose Subcategory</option>';
                $(aData).each(function(i, item) {
                    optRow += '<option value="'+ item.id +'">'+ item.subcategory_name +'</option>';
                });
                $('#subcategory').html(optRow).trigger('change');
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });    
});

$('#city').change(function() {
    var city = $(this).val();
    $.ajax({
        url: base_url+"/stateCountry/"+city,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var stateData = data.data.state;
            var stateRow = '<option value="'+ stateData.id +'" selected>'+ stateData.state_name +'</option>';
            $('#state').html(stateRow).trigger('change');
            var countryData = data.data.country;
            var countryRow = '<option value="'+ countryData.id +'" selected>'+ countryData.country_name +'</option>';
            $('#country').html(countryRow).trigger('change');
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });    
});


$('#profileUpdate').click(function() {
    $.ajax({
        url: base_url+'/updateProfile',
        type: 'POST',
        data: {
		 'first_name': $('#first_name').val(),
		 'last_name': $('#last_name').val(),
		 'gender': $('#gender').val(),
		 'dob': $('#dob').val(),
		 'contact_no': $('#contact_no').val()
        },
        dataType: 'JSON',
        async: false,
        success: function (data) {
            // var datas = JSON.parse(data);
            if (data.status == 'success')
            {
                $('#successText').text('Profile updated successfully');
            	$('#Success').modal('show');
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('.updateBusinessInfo').click(function() {
    var business_id = $(this).attr('businessid');
    var businessName = $.trim($('#business_name_'+business_id).val());
    var category = $.trim($('#category_'+business_id).val());
    var subcategory = $.trim($('#subcategory_'+business_id).val());
    var yearOfEstablish = $.trim($('#year_of_establish_'+business_id).val());
    var nameOfFounder = $.trim($('#name_of_founder_'+business_id).val());
    var building = $.trim($('#building_'+business_id).val());
    var street = $.trim($('#street_'+business_id).val());
    var area = $.trim($('#area_'+business_id).val());
    var city = $.trim($('#city_'+business_id).val());
    var landmark = $.trim($('#landmark_'+business_id).val());
    var pincode = $.trim($('#pincode_'+business_id).val());
    var country = $.trim($('#country_'+business_id).val());
    var state = $.trim($('#state_'+business_id).val());
    var officeNum = $("input[name='office_num_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var tollfreeNum = $("input[name='tollfree_num_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var whatsappNum = $("input[name='whatsapp_num_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var mobileNum = $("input[name='mobile_num_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var email = $("input[name='email_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var website = $("input[name='website_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var sm = $("select[name='social_media_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var smUrl = $("input[name='social_media_url_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var lattitude = $('#us2-lat_'+business_id).val();
    var longitude = $('#us2-lon_'+business_id).val();
    var keywords = $("input[name='keyword_"+business_id+"']:checked").map(function(){return $(this).val();}).get();
    var valResult = validateBasicDetails(business_id, businessName, category, subcategory, building, street, area, city, pincode);
    if (valResult == 1) {
        $('html, body').animate({scrollTop:$('#businessInform_'+business_id).offset().top}, 'slow');
        return false;
    }
    $.ajax({
        url: base_url+'/updateBusinessInfo',
        type: 'POST',
        data: {
            'business_id': business_id,
            'businessName': businessName,
            'category': category,
            'subcategory': subcategory,
            'yearOfEstablish': yearOfEstablish,
            'nameOfFounder': nameOfFounder,
            'building': building,
            'street': street,
            'area': area,
            'city': city,
            'landmark': landmark,
            'pincode': pincode,
            'country': country,
            'state': state,
            'officeNum': officeNum,
            'tollfreeNum': tollfreeNum,
            'whatsappNum': whatsappNum,
            'mobileNum': mobileNum,
            'email': email,
            'website': website,
            'sm': sm,
            'smUrl': smUrl,
            'lattitude': lattitude,
            'longitude': longitude,
            'keywords': keywords
        },
        dataType: 'JSON',
        async: false,
        success: function (data) {
            // var datas = JSON.parse(data);
            if (data.status == 'success')
            {
                $('html, body').animate({scrollTop:$('#businessInform_'+business_id).offset().top}, 'slow');
                $('#successText').text('Basic details updated successfully');
                $('#Success').modal('show');
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

function validateBasicDetails(business_id, businessName, category, subcategory, building, street, area, city, pincode)
{
    var valFail = 0;

    if (businessName == '') {
        $('#name_error_'+business_id).removeClass('d-none');
        $('#business_name_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#name_error_'+business_id).addClass('d-none');
        $('#business_name_'+business_id).removeClass('border-danger');
    }

    if (category == 0) {
        $('#category_error_'+business_id).removeClass('d-none');
        $('#category_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#category_error_'+business_id).addClass('d-none');
        $('#category_'+business_id).removeClass('border-danger');
    }

    if (subcategory == 0) {
        $('#subcategory_error_'+business_id).removeClass('d-none');
        $('#subcategory_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#subcategory_error_'+business_id).addClass('d-none');
        $('#subcategory_'+business_id).removeClass('border-danger');
    }

    if (building == '') {
        $('#building_error_'+business_id).removeClass('d-none');
        $('#building_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#building_error_'+business_id).addClass('d-none');
        $('#building_'+business_id).removeClass('border-danger');
    }

    if (street == '') {
        $('#street_error_'+business_id).removeClass('d-none');
        $('#street_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#street_error_'+business_id).addClass('d-none');
        $('#street_'+business_id).removeClass('border-danger');
    }

    if (area == '') {
        $('#area_error_'+business_id).removeClass('d-none');
        $('#area_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#area_error_'+business_id).addClass('d-none');
        $('#area_'+business_id).removeClass('border-danger');
    }

    if (city == 0) {
        $('#city_error_'+business_id).removeClass('d-none');
        $('#city_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#city_error_'+business_id).addClass('d-none');
        $('#city_'+business_id).removeClass('border-danger');
    }

    if (pincode == '') {
        $('#pincode_error_'+business_id).removeClass('d-none');
        $('#pincode_'+business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#pincode_error_'+business_id).addClass('d-none');
        $('#pincode_'+business_id).removeClass('border-danger');
    }

    return valFail;

}

$('.updatePageContent').click(function() {
    var business_id = $(this).attr('businessid');
    var about = $('#about_'+business_id).val();
    var timing = $('#timing_'+business_id).val();
    var timingValue = $('#timingValue_'+business_id).val();
    var headline = $("select[name='headline_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var headlineContent = $("textarea[name='headlineContent_"+business_id+"[]']").map(function(){return $(this).val();}).get();
    var valResult = validatepageContent(business_id, about, timing, timingValue);
    if (valResult == 1) {
        $('html, body').animate({scrollTop:$('#businessInform_'+business_id).offset().top}, 'slow');
        return false;
    }
    $.ajax({
        url: base_url+'/updateBusinesspageContent',
        type: 'POST',
        data: {
            'business_id': business_id,
            'about': about,
            'timing': timing,
            'timingValue': timingValue,
            'headline': headline,
            'headlineContent': headlineContent
        },
        dataType: 'JSON',
        async: false,
        success: function (data) {
            // var datas = JSON.parse(data);
            if (data.status == 'success')
            {
                $('html, body').animate({scrollTop:$('#businessInform_'+business_id).offset().top}, 'slow');
                $('#successText').text('Basic info updated successfully');
                $('#Success').modal('show');
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

function validatepageContent(business_id, about, timing, timingValue)
{
    var valFail = 0;

    if (about == '') {
        $('#about_error_'+ business_id).removeClass('d-none');
        $('#about_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#about_error_'+ business_id).addClass('d-none');
        $('#about_'+ business_id).removeClass('border-danger');
    }

    if (timing == 0) {
        $('#timing_error_'+ business_id).removeClass('d-none');
        $('#timing_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#timing_error_'+ business_id).addClass('d-none');
        $('#timing_'+ business_id).removeClass('border-danger');
    }

    if (timingValue == '') {
        $('#timingVal_error_'+ business_id).removeClass('d-none');
        $('#timingValue_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#timingVal_error_'+ business_id).addClass('d-none');
        $('#timingValue_'+ business_id).removeClass('border-danger');
    }

    return valFail;
}

$('.addOffer').click(function() {
    var business_id = $(this).attr('businessid');
    var offerImage = $('#imageInput_'+business_id).val();
    var offerHeading = $('#offer_heading_'+business_id).val();
    var offerLocation = $('#offer_location_'+business_id).val();
    var offerAmount = $('#offer_amount_'+business_id).val();
    var valResult = validateOffer(business_id, offerImage, offerHeading, offerLocation, offerAmount);
    if (valResult == 1) {
        $('html, body').animate({scrollTop:$('#businessInform_'+business_id).offset().top}, 'slow');
        return false;
    }
    var formData = new FormData($('#offerForm_'+business_id)[0]);
    $.ajax({
        url: base_url+'/updateBusinessOffer',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        success: function (data) {
            var datas = JSON.parse(data);
            if (datas.status == 'success')
            {
                $('html, body').animate({scrollTop:$('#businessInform_'+business_id).offset().top}, 'slow');
                $('#successText').text('Offer created successfully');
                $('#Success').modal('show');
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

function validateOffer(business_id, offerImage, offerHeading, offerLocation, offerAmount)
{
    var valFail = 0;

    if (offerImage == '') {
        $('#image_error_'+ business_id).removeClass('d-none');
        $('#imageInput_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#image_error_'+ business_id).addClass('d-none');
        $('#imageInput_'+ business_id).removeClass('border-danger');
    }

    if (offerHeading == 0) {
        $('#heading_error_'+ business_id).removeClass('d-none');
        $('#offer_heading_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#heading_error_'+ business_id).addClass('d-none');
        $('#offer_heading_'+ business_id).removeClass('border-danger');
    }

    if (offerLocation == '') {
        $('#location_error_'+ business_id).removeClass('d-none');
        $('#offer_location_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#location_error_'+ business_id).addClass('d-none');
        $('#offer_location_'+ business_id).removeClass('border-danger');
    }

    if (offerAmount == '') {
        $('#amount_error_'+ business_id).removeClass('d-none');
        $('#offer_amount_'+ business_id).addClass('border-danger');
        valFail = 1;
    } else {
        $('#amount_error_'+ business_id).addClass('d-none');
        $('#offer_amount_'+ business_id).removeClass('border-danger');
    }

    return valFail;
}

$(window).on('load', function() {
    $("img[name='profPhoto']").on('load', function () {
        var imageBase = ($(this).attr('src'));
        $.ajax({
            url: base_url+'/uploadUserProfilePhoto',
            type: 'POST',
            data: {
                'imageBase': imageBase
            },
            dataType: 'JSON',
            async: false,
            success: function (data) {
                // var datas = JSON.parse(data);
                if (data.status == 'success')
                {
                    location.reload();
                }
            },
            error: function (xhr) {
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }

        });
    });

    $("img[name='coverImg']").on('load', function () {
        var imageBase = ($(this).attr('src'));
        $.ajax({
            url: base_url+'/uploadUserCoverPhoto',
            type: 'POST',
            data: {
                'imageBase': imageBase
            },
            dataType: 'JSON',
            async: false,
            success: function (data) {
                // var datas = JSON.parse(data);
                if (data.status == 'success')
                {
                    location.reload();
                }
            },
            error: function (xhr) {
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }

        });
    });
});

$('#profileReset').click(function() {
    $('#gender').val('');
    $('#dob').val('');
    $('#contact_no').val('');
});

$('.resetBasic').click(function() {
    var businessId = $(this).attr('businessId');
    $('#business_name_'+businessId).val('');
    $('#category_'+businessId).val(0).trigger('change');
    var optRow = '<option value="0" selected>Choose Subcategory</option>';
    $('#subcategory_'+businessId).html(optRow).trigger('change');
    $('#name_of_founder_'+businessId).val('');
    $('#building_'+businessId).val('');
    $('#year_of_establish_'+businessId).val('');
    $('#street_'+businessId).val('');
    $('#area_'+businessId).val('');
    $('#city_'+businessId).val(0).trigger('change');
    $('#landmark_'+businessId).val('');
    $('#pincode_'+businessId).val('');
    $('#country_'+businessId).html('').trigger('change');
    $('#state_'+businessId).html('').trigger('change');
    $('.off_num_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#off_num_label_'+businessId+'_'+count).remove();
    });
    $('.tollfree_num_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#tollfree_num_label_'+businessId+'_'+count).remove();
    });
    $('.wapp_num_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#wapp_num_label_'+businessId+'_'+count).remove();
    });
    $('.email_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#email_label_'+businessId+'_'+count).remove();
    });
    $('.mob_num_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#mob_num_label_'+businessId+'_'+count).remove();
    });
    $('.website_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#website_label_'+businessId+'_'+count).remove();
    });
    $('.sm_url_btn_'+businessId).each(function() {
        var count = $(this).attr('count');
        $(this).parent().remove();
        $('#sm_div_'+businessId+'_'+count).remove();
        $('#sm_url_div_'+businessId+'_'+count).remove();
    });
    $("input[name='keyword_"+businessId+"']:checked").prop('checked', false);
    $('html, body').animate({scrollTop:$('#businessInform_'+businessId).offset().top}, 'slow');
});

$('.resetPageContent').click(function() {
    var businessId = $(this).attr('businessId');
    $('#about_'+businessId).val('');
    $('#timing_'+businessId).val(0).trigger('change');
    $('#timingValue_'+businessId).val('');
    $('.headlines_'+businessId).remove();
    $('html, body').animate({scrollTop:$('#businessInform_'+businessId).offset().top});
});

$('.resetOffer').click(function() {
    var businessId = $(this).attr('businessId');
    $('#offer_heading_'+businessId).val('');
    $('#offer_location_'+businessId).val('');
    $('#offer_description_'+businessId).val('');
    $('html, body').animate({scrollTop:$('#businessInform_'+businessId).offset().top});
});