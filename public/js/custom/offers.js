$('.exptBtn').click(function() {
    if($(this).text() == 'View More')
        $(this).text('View Less');
    else
        $(this).text('View More');
});

$('#search_city').on('keyup', function() {
    var val = $.trim(this.value);
    if(val == '') {
        $('.city_div').show();
    } else {
        val = val.toUpperCase();
        $('.city_div').each(function() {
            var label = $(this).children('.form-check').children('#city_label').text();
            label = label.toUpperCase();
            if(label.indexOf(val) == -1)
                $(this).hide();
            else
                $(this).show();

        });
    }
});

$('#search_category').on('keyup', function() {
    var val = $.trim(this.value);
    if(val == '') {
        $('.category_div').show();
    } else {
        val = val.toUpperCase();
        $('.category_div').each(function() {
            var label = $(this).children('.form-check').children('#category_label').text();
            label = label.toUpperCase();
            if(label.indexOf(val) == -1)
                $(this).hide();
            else
                $(this).show();

        });
    }
});

$('.filterCheckbox').change(function() {
    var cityFilter = $("input[name='cityCheckbox']:checked").map(function(){return $(this).val();}).get();
    var categoryFilter = $("input[name='categoryCheckbox']:checked").map(function(){return $(this).val();}).get();
    $.ajax({
        url: base_url+"/offersList?cityfilter="+cityFilter+"&categoryfilter="+categoryFilter,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var listRow = '';
            if (aData != '' && aData != null) {
                $(aData).each(function(i, item) {
                    listRow += '<a href="'+ base_url + '/detail/' + btoa(item.business_id) + '" class="listing-card">';
                    listRow += '<div class="content"><div class="image-wrapper">';
                    listRow += '<img src="' + base_url + '/images/business/' + item.business_id + '/offer/' + item.offer_image + '" alt="image">';
                    listRow += '</div><div class="txt-section"><div class="flex-container top-section">';
                    listRow += '<h5>' + item.heading + '</h5><div class="right-align">';
                    listRow += '<button class="btn btn-save"><i class="fas fa-heart"></i></button></div></div>';
                    listRow += '<div class="flex-container bottom-section"><div class="btn-warpper">';
                    listRow += '<p>' + item.business_name + '</p>';
                    listRow += '<p>' + item.location + '</p></div><div class="overall-rating">';
                    listRow += '<img src="' + base_url + '/images/svg/offer.svg" alt="offer-icon">';
                    listRow += '<p><b>60% OFF</b></p></div></div></div></div></a>';
                });
                $('#offerList').html(listRow);
            } else {
                $('#offerList').html('<span>No Offers are running</span>');
            }
            $('html, body').animate({scrollTop:$('#offerContent').offset().top});
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
});