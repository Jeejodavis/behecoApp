
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#add_office_num').click(function() {
	var count = $('.off_num').length;
	count = parseInt(count) + 1;
	var text = '<label class="form-label" id="off_num_label_' + count + '">Office Number ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control off_num" placeholder="Enter Office Landline" aria-label="Recipient\'s username" aria-describedby="button-addon2" name="office_num[]">';
    text += '<button class="btn btn-plus off_num_btn" count="' + count + '" type="button" id="remove_office_num"><i class="fas fa-minus"></i></button></div>';
    $('#office_num_div').append(text);
});

$(document).on('click', '#remove_office_num', function() {
	var count = $(this).attr('count');
	$(this).parent().remove();
	$('#off_num_label_'+count).remove();
	$('.off_num_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$('#off_num_label_'+lCount).text('Office Number ' + (lCount-1));
			$('#off_num_label_'+lCount).attr('id', 'off_num_label_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
});

$('#add_tollfree_num').click(function() {
	var count = $('.tollfree_num').length;
	count = parseInt(count) + 1;
	var text = '<label class="form-label" id="tollfree_num_label_' + count + '">Toll Free Number ' + count + ' (Optional)</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control tollfree_num" placeholder="Enter Toll Free Number" name="tollfree_num[]">';
    text += '<button class="btn btn-plus tollfree_num_btn" count="' + count + '" type="button" id="remove_tollfree_num"><i class="fas fa-minus"></i></button></div>';
    $('#tollfree_num_div').append(text);
});

$(document).on('click', '#remove_tollfree_num', function() {
	var count = $(this).attr('count');
	$(this).parent().remove();
	$('#tollfree_num_label_'+count).remove();
	$('.tollfree_num_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$('#tollfree_num_label_'+lCount).text('Toll Free Number ' + (lCount-1));
			$('#tollfree_num_label_'+lCount).attr('id', 'tollfree_num_label_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
});

$('#add_wapp_num').click(function() {
	var count = $('.wapp_num').length;
	count = parseInt(count) + 1;
	var text = '<label class="form-label" id="wapp_num_label_' + count + '">WhatsApp Number ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control wapp_num" placeholder="Enter WhatsApp Number" name="whatsapp_num[]">';
    text += '<button class="btn btn-plus wapp_num_btn" count="' + count + '" type="button" id="remove_wapp_num"><i class="fas fa-minus"></i></button></div>';
    $('#wapp_num_div').append(text);
});

$(document).on('click', '#remove_wapp_num', function() {
	var count = $(this).attr('count');
	$(this).parent().remove();
	$('#wapp_num_label_'+count).remove();
	$('.wapp_num_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$('#wapp_num_label_'+lCount).text('WhatsApp Number ' + (lCount-1));
			$('#wapp_num_label_'+lCount).attr('id', 'wapp_num_label_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
});

$('#add_mob_num').click(function() {
	var count = $('.mob_num').length;
	count = parseInt(count) + 1;
	var text = '<label class="form-label" id="mob_num_label_' + count + '">Mobile Number ' + count + ' (Optional)</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="number" class="form-control mob_num" placeholder="Enter Mobile Number" name="mobile_num[]">';
    text += '<button class="btn btn-plus mob_num_btn" count="' + count + '" type="button" id="remove_mob_num"><i class="fas fa-minus"></i></button></div>';
    $('#mob_num_div').append(text);
});

$(document).on('click', '#remove_mob_num', function() {
	var count = $(this).attr('count');
	$(this).parent().remove();
	$('#mob_num_label_'+count).remove();
	$('.mob_num_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$('#mob_num_label_'+lCount).text('Mobile Number ' + (lCount-1) + ' (Optional)');
			$('#mob_num_label_'+lCount).attr('id', 'mob_num_label_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
});

$('#add_email').click(function() {
	var count = $('.email_id').length;
	count = parseInt(count) + 1;
	var text = '<label class="form-label" id="email_label_' + count + '">Email Id ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="email" class="form-control email_id" placeholder="Enter Email ID" name="email[]">';
    text += '<button class="btn btn-plus email_btn" count="' + count + '" type="button" id="remove_email"><i class="fas fa-minus"></i></button></div>';
    $('#email_div').append(text);
});

$(document).on('click', '#remove_email', function() {
	var count = $(this).attr('count');
	$(this).parent().remove();
	$('#email_label_'+count).remove();
	$('.email_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$('#email_label_'+lCount).text('Email Id ' + (lCount-1));
			$('#email_label_'+lCount).attr('id', 'email_label_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
});

$('#add_website').click(function() {
	var count = $('.website').length;
	count = parseInt(count) + 1;
	var text = '<label class="form-label" id="website_label_' + count + '">Website ' + count + '</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="text" class="form-control website" placeholder="Enter Web URL" name="website[]">';
    text += '<button class="btn btn-plus website_btn" count="' + count + '" type="button" id="remove_website"><i class="fas fa-minus"></i></button></div>';
    $('#website_div').append(text);
});

$(document).on('click', '#remove_website', function() {
	var count = $(this).attr('count');
	$(this).parent().remove();
	$('#website_label_'+count).remove();
	$('.website_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$('#website_label_'+lCount).text('Website ' + (lCount-1));
			$('#website_label_'+lCount).attr('id', 'website_label_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
});

$('#add_sm_url').click(function() {
	var count = $('.sm_url').length;
	count = parseInt(count) + 1;
	var text = '<div class="col-xl-6 sm_divs" count="' + count + '" id="sm_div_' + count + '"><label for="exampleFormControlInput1" class="form-label">Social Media ' + count + ' (Optional)</label>';
    text += '<select class="form-select select2 js" aria-label="Default select example" name="social_media[]" id="sm_select'+ count +'">';
    text += '<option selected>Choose Socail Media</option>';
    $(social_medias).each(function(i, item) {
    	text += '<option value="'+ item.id +'">'+ item.sm_name +'</option>';
    });
    text += '</select></div><div class="col-xl-6 sm_url_divs" count="' + count + '" id="sm_url_div_' + count + '">';
	text += '<label class="form-label">Social Media URL</label>';
    text += '<div class="input-group mb-3">';
    text += '<input type="text" class="form-control sm_url" placeholder="Enter Social Media URL" name="social_media_url[]">';
    text += '<button class="btn btn-plus sm_url_btn" count="' + count + '" type="button" id="remove_sm_url"><i class="fas fa-minus"></i></button></div>';
    $('#sm_div').append(text);
    $('#sm_select'+count).select2();
});

$(document).on('click', '#remove_sm_url', function() {
	var count = $(this).attr('count');
	$('#sm_div_' + count).remove();
	$('#sm_url_div_' + count).remove();
	$('.sm_url_btn').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$(this).attr('count', lCount-1);
		}
	});
	$('.sm_divs').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$(this).children('label').text('Social Media ' + (lCount-1) + ' (Optional)');
			$(this).attr('id', 'sm_div_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
	$('.sm_url_divs').each(function() {
		var lCount = $(this).attr('count');
		if (count < lCount) {
			$(this).attr('id', 'sm_url_div_' + (lCount-1));
			$(this).attr('count', lCount-1);
		}
	});
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

$('#basic_next').click(function() {
	var business_id = $('#business_id').val();
	var businessName = $.trim($('#business_name').val());
	var category = $.trim($('#category').val());
	var subcategory = $.trim($('#subcategory').val());
	var yearOfEstablish = $.trim($('#year_of_establish').val());
	var nameOfFounder = $.trim($('#name_of_founder').val());
	var building = $.trim($('#building').val());
	var street = $.trim($('#street').val());
	var area = $.trim($('#area').val());
	var city = $.trim($('#city').val());
	var landmark = $.trim($('#landmark').val());
	var pincode = $.trim($('#pincode').val());
	var country = $.trim($('#country').val());
	var state = $.trim($('#state').val());
	var officeNum = $("input[name='office_num[]']").map(function(){return $(this).val();}).get();
	var tollfreeNum = $("input[name='tollfree_num[]']").map(function(){return $(this).val();}).get();
	var whatsappNum = $("input[name='whatsapp_num[]']").map(function(){return $(this).val();}).get();
	var mobileNum = $("input[name='mobile_num[]']").map(function(){return $(this).val();}).get();
	var email = $("input[name='email[]']").map(function(){return $(this).val();}).get();
	var website = $("input[name='website[]']").map(function(){return $(this).val();}).get();
	var sm = $("select[name='social_media[]']").map(function(){return $(this).val();}).get();
	var smUrl = $("input[name='social_media_url[]']").map(function(){return $(this).val();}).get();
	var valResult = validateBasicDetails(businessName, category, subcategory, building, street, area, city, pincode);
	if (valResult == 1) {
		$('html, body').animate({scrollTop:$('#collapseOne').offset().top}, 'slow');
		return false;
	}
	$.ajax({
        url: base_url+'/addBusinessBasic',
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
            'smUrl': smUrl
        },
        dataType: 'JSON',
        async: false,
        success: function (data) {
            // var datas = JSON.parse(data);
            if (data.status == 'success')
            {
            	$('#business_id').val(data.id);
            	$('#businessId').val(data.id);
                $('#photoTab').removeAttr('disabled').trigger('click');
                setTimeout(function() {
				    $('html, body').animate({scrollTop:$('#collapseTwo').offset().top}, 'slow');
				}, 300);
                
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });

});

function validateBasicDetails(businessName, category, subcategory, building, street, area, city, pincode)
{
	var valFail = 0;

	if (businessName == '') {
		$('#name_error').removeClass('d-none');
		$('#business_name').addClass('border-danger');
		valFail = 1;
	} else {
		$('#name_error').addClass('d-none');
		$('#business_name').removeClass('border-danger');
	}

	if (category == 0) {
		$('#category_error').removeClass('d-none');
		$('#category').addClass('border-danger');
		valFail = 1;
	} else {
		$('#category_error').addClass('d-none');
		$('#category').removeClass('border-danger');
	}

	if (subcategory == 0) {
		$('#subcategory_error').removeClass('d-none');
		$('#subcategory').addClass('border-danger');
		valFail = 1;
	} else {
		$('#subcategory_error').addClass('d-none');
		$('#subcategory').removeClass('border-danger');
	}

	if (building == '') {
		$('#building_error').removeClass('d-none');
		$('#building').addClass('border-danger');
		valFail = 1;
	} else {
		$('#building_error').addClass('d-none');
		$('#building').removeClass('border-danger');
	}

	if (street == '') {
		$('#street_error').removeClass('d-none');
		$('#street').addClass('border-danger');
		valFail = 1;
	} else {
		$('#street_error').addClass('d-none');
		$('#street').removeClass('border-danger');
	}

	if (area == '') {
		$('#area_error').removeClass('d-none');
		$('#area').addClass('border-danger');
		valFail = 1;
	} else {
		$('#area_error').addClass('d-none');
		$('#area').removeClass('border-danger');
	}

	if (city == 0) {
		$('#city_error').removeClass('d-none');
		$('#city').addClass('border-danger');
		valFail = 1;
	} else {
		$('#city_error').addClass('d-none');
		$('#city').removeClass('border-danger');
	}

	if (pincode == '') {
		$('#pincode_error').removeClass('d-none');
		$('#pincode').addClass('border-danger');
		valFail = 1;
	} else {
		$('#pincode_error').addClass('d-none');
		$('#pincode').removeClass('border-danger');
	}

	return valFail;

}

$('#addPhotos').click(function() {
	var formData = new FormData($('#image_form')[0]);
    $.ajax({
        url: base_url+'/addBusinessPhotos',
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
                $('#locationTab').removeAttr('disabled').trigger('click');
                setTimeout(function() {
				    $('html, body').animate({scrollTop:$('#collapseThree').offset().top}, 'slow');
				}, 300);
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('#locationAdd').click(function() {
	var business_id = $('#business_id').val();
	var lattitude = $('#us2-lat').val();
	var longitude = $('#us2-lon').val();
	$.ajax({
        url: base_url+'/addBusinessLocation',
        type: 'POST',
        data: {
            'business_id': business_id,
            'lattitude': lattitude,
            'longitude': longitude
        },
        dataType: 'JSON',
        async: false,
        success: function (data) {
            // var datas = JSON.parse(data);
            if (data.status == 'success')
            {
                $('#keywordTab').removeAttr('disabled').trigger('click');
                setTimeout(function() {
				    $('html, body').animate({scrollTop:$('#collapseFour').offset().top}, 'slow');
				}, 300);
                
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('#keywordSubmit').click(function() {
	var business_id = $('#business_id').val();
	var keywords = $("input[name='keyword']:checked").map(function(){return $(this).val();}).get();
    $.ajax({
        url: base_url+'/addBusinessKeywords',
        type: 'POST',
        data: {
            'business_id': business_id,
            'keywords': keywords,
        },
        dataType: 'JSON',
        async: false,
        success: function (data) {
            // var datas = JSON.parse(data);
            if (data.status == 'success')
            {
                window.location.href = base_url+'/profile';
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});