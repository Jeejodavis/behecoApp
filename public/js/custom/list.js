$('.bus_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*12;
    busData(offset);
    let currentPage = $('#current').val();
    $('#busPage_'+currentPage).removeClass('current');
    $('#busPage_'+currentPage).removeClass('disabled');
    $('#busPage_'+page).addClass('current');
    $('#busPage_'+page).addClass('disabled');
    $('#current').val(page);
    if (page == 1) {
        $('#busPrev').addClass('disabled');
    } else {
        $('#busPrev').removeClass('disabled');
    }
    if (page == businessPages) {
        $('#busNext').addClass('disabled');
    } else {
        $('#busNext').removeClass('disabled');
    }
    $(window).scrollTop( $("#listContent").scrollTop(0) );
    
});

$('#busPrev').click(function() {
    let page = $('#current').val();
    let offset = (page-2)*12;
    busData(offset);
    let curPage = page-1;
    $('#busPage_'+page).removeClass('current');
    $('#busPage_'+page).removeClass('disabled');
    $('#busPage_'+curPage).addClass('current');
    $('#busPage_'+curPage).addClass('disabled');
    $('#current').val(curPage);
    if (curPage == 1) {
        $('#busPrev').addClass('disabled');
    }
    $('#busNext').removeClass('disabled');
    $(window).scrollTop( $("#listContent").scrollTop(0) );
    
});

$('#busNext').click(function() {
    let page = $('#current').val();
    let offset = (page)*12;
    busData(offset);
    let curPage = parseInt(page)+1;
    $('#busPage_'+page).removeClass('current');
    $('#busPage_'+page).removeClass('disabled');
    $('#busPage_'+curPage).addClass('current');
    $('#busPage_'+curPage).addClass('disabled');
    $('#current').val(curPage);
    if (curPage == businessPages) {
        $('#busNext').addClass('disabled');
    }
    $('#busPrev').removeClass('disabled');
    $(window).scrollTop( $("#businessList").scrollTop(0) );
    
});

function busData(offset)
{
    $.ajax({
        url: base_url+"/businessList?city="+city+"&keyword="+keyword+"&limit=12&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var listRow = '';
            if (aData.length > 0) {
                $(aData).each(function(i, item) {
                    listRow += '<a href="detail/'+btoa(item.id)+'" class="listing-card">';
                    listRow += '<div class="content"><div class="image-wrapper">';
                    if (item.profile_photo != null && item.profile_photo != '')
                        listRow += '<img src="'+base_url+'/images/business/' + item.id + '/' + item.profile_photo+'" alt="profile-image">';
                    else
                        listRow += '<img src="'+base_url+'/images/default-business.png" alt="profile-image">';

                    listRow += '</div><div class="txt-section"><div class="flex-container top-section">';
                    listRow += '<h5>'+item.business_name+'</h5>';
                    listRow += '<div class="right-align"><button class="btn btn-save"><i class="fas fa-heart"></i></button>';
                    listRow += '</div></div><div class="flex-container bottom-section">';
                    listRow += '<div class="btn-warpper"><p>'+item.category+'</p>';
                    listRow += '<p>'+item.city+', '+item.state+'</p></div>';
                    if (item.rating.rating_avg != null && item.rating.rating_avg != '') {
                        listRow += '<div class="overall-rating"><i class="fas fa-star-half-alt"></i>';
                        listRow += '<p>'+item.rating.rating_avg+'</p></div>';
                    }
                    listRow += '</div></div></div></a>';
                });
                $('#businessList').html(listRow);
            } else {
                $('#businessList').html('No Data Found!');
            }
            $('html, body').animate({scrollTop:$('#listContent').offset().top});
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

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

$('#search_subcategory').on('keyup', function() {
    var val = $.trim(this.value);
    if(val == '') {
        $('.subcategory_div').show();
    } else {
        val = val.toUpperCase();
        $('.subcategory_div').each(function() {
            var label = $(this).children('.form-check').children('#subcategory_label').text();
            label = label.toUpperCase();
            if(label.indexOf(val) == -1)
                $(this).hide();
            else
                $(this).show();

        });
    }
});

$('.categoryCheckbox').click(function() {
    var category = $(this).val();
    $.ajax({
        url: base_url+"/getSubcategory/"+category,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var listRow = '';
            if (aData.length > 0) {
                var count = aData.length;
                $(aData).each(function(i, item) {
                    if (i == 6)
                        listRow += '<div class="collapse w-100" id="subcategoryCollapse">';
                    listRow += '<div class="clearfix subcategory_div"><div class="form-check">';
                    listRow += '<input class="form-check-input filterCheckbox" name="subcategoryCheckbox" type="checkbox" value="'+ item.id +'" id="subcategory_'+ item.id +'">';
                    listRow += '<label class="form-check-label" id="subcategory_label" for="subcategory_'+ item.id +'">'+ item.subcategory_name +'</label>';
                    listRow += '</div><div class="count"><p>('+ item.user_business_count +')</p></div></div>';
                    if (i >= 6 && i+1 == count) {
                        listRow += '</div>'
                        listRow += '<a class="text-primary exptBtn fw-bold mt-2 w-100 text-center" data-bs-toggle="collapse" href="#subcategoryCollapse" role="button" aria-expanded="false" aria-controls="subcategoryCollapse">View More</a>';
                    }
                });
                $('#subcategoryContent').html(listRow);
            } else {
                $('#subcategoryContent').html('No Data Found!');
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
})

$('.filterCheckbox').change(function() {
    var cityFilter = $("input[name='cityCheckbox']:checked").map(function(){return $(this).val();}).get();
    var categoryFilter = $("input[name='categoryCheckbox']:checked").map(function(){return $(this).val();}).get();
    var subcategoryFilter = $("input[name='subcategoryCheckbox']:checked").map(function(){return $(this).val();}).get();
    $.ajax({
        url: base_url+"/businessList?city="+city+"&keyword="+keyword+"&cityfilter="+cityFilter+"&categoryfilter="+categoryFilter+"&subcategoryfilter="+subcategoryFilter,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var listRow = '';
            if (aData.length > 0) {
                $(aData).each(function(i, item) {
                    listRow += '<a href="detail/'+btoa(item.id)+'" class="listing-card">';
                    listRow += '<div class="content"><div class="image-wrapper">';
                    if (item.profile_photo != null && item.profile_photo != '')
                        listRow += '<img src="'+base_url+'/images/business/' + item.id + '/' + item.profile_photo+'" alt="profile-image">';
                    else
                        listRow += '<img src="'+base_url+'/images/default-business.png" alt="profile-image">';

                    listRow += '</div><div class="txt-section"><div class="flex-container top-section">';
                    listRow += '<h5>'+item.business_name+'</h5>';
                    listRow += '<div class="right-align"><button class="btn btn-save"><i class="fas fa-heart"></i></button>';
                    listRow += '</div></div><div class="flex-container bottom-section">';
                    listRow += '<div class="btn-warpper"><p>'+item.category+'</p>';
                    listRow += '<p>'+item.city+', '+item.state+'</p></div>';
                    if (item.rating.rating_avg != null && item.rating.rating_avg != '') {
                        listRow += '<div class="overall-rating">';
                        if (item.rating.rating_avg > 4.6)
                            listRow += '<i class="fas fa-star"></i>';
                        else
                            listRow += '<i class="fas fa-star-half-alt"></i>';
                        listRow += '<p>'+item.rating.rating_avg+'</p></div>';
                    }
                    listRow += '</div></div></div></a>';
                });
                $('#businessList').html(listRow);
            } else {
                $('#businessList').html('No Data Found!');
            }
            $('html, body').animate({scrollTop:$('#listContent').offset().top});
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
});

