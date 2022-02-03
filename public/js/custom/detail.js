        

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.review_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*10;
    reviewData(offset);
    let currentPage = $('#reviewCurrent').val();
    $('#reviewPage_'+currentPage).removeClass('current');
    $('#reviewPage_'+currentPage).removeClass('disabled');
    $('#reviewPage_'+page).addClass('current');
    $('#reviewPage_'+page).addClass('disabled');
    $('#reviewCurrent').val(page);
    if (page == 1) {
        $('#reviewPrev').addClass('disabled');
    } else {
        $('#reviewPrev').removeClass('disabled');
    }
    if (page == reviewPages) {
        $('#reviewNext').addClass('disabled');
    } else {
        $('#reviewNext').removeClass('disabled');
    }
    $("#reviewContent").scrollTop(0);
});

$('#reviewPrev').click(function() {
    let page = $('#reviewCurrent').val();
    let offset = (page-2)*10;
    reviewData(offset);
    let curPage = page-1;
    $('#reviewPage_'+page).removeClass('current');
    $('#reviewPage_'+page).removeClass('disabled');
    $('#reviewPage_'+curPage).addClass('current');
    $('#reviewPage_'+curPage).addClass('disabled');
    $('#reviewCurrent').val(curPage);
    if (curPage == 1) {
        $('#reviewPrev').addClass('disabled');
    }
    $('#reviewNext').removeClass('disabled');
    $("#reviewContent").scrollTop(0);
});

$('#reviewNext').click(function() {
    let page = $('#reviewCurrent').val();
    let offset = (page)*10;
    reviewData(offset);
    let curPage = parseInt(page)+1;
    $('#reviewPage_'+page).removeClass('current');
    $('#reviewPage_'+page).removeClass('disabled');
    $('#reviewPage_'+curPage).addClass('current');
    $('#reviewPage_'+curPage).addClass('disabled');
    $('#reviewCurrent').val(curPage);
    if (curPage == reviewPages) {
        $('#reviewNext').addClass('disabled');
    }
    $('#reviewPrev').removeClass('disabled');
    $("#reviewContent").scrollTop(0);
});

function reviewData(offset)
{
    $.ajax({
        url: base_url+"/reviews/"+business_id+"?limit=10&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var review = '';
            if (aData.length > 0) {
                $(aData).each(function(i, item) {
                    review += '<div class="feedback-card"><div class="dp">';
                    if (item.profile_img != null && item.profile_img != '')
                        review += '<img src="'+base_url+'/images/user/' + item.user_id + '/profile/' + item.profile_img + '" alt="user-img">';
                    else
                        review += '<p>' + item.first_name[0].toUpperCase() + item.last_name[0].toUpperCase() + '</p>';

                    review += '</div>';
                    review += '<div class="main-content"><p>'+ item.remarks +'</p>';
                    review += '<div class="auther-info"><h6>'+ item.first_name +' '+ item.last_name +'</h6><p> | </p><p class="location">'+ item.city_name +', '+ item.state_name +'</p></div></div>';
                    review += '<div class="right-portion"><div class="flex-container"><i class="fas fa-star-half-alt"></i><h3>'+ item.rating +'</h3></div>';
                    review += '<div class="likes-wrapper"><a href="" class="like"><i class="fas fa-thumbs-up"></i><p>122</p></a><a href="" class="dislike"><i class="fas fa-thumbs-down"></i><p>122</p></a></div></div></div>';
                });
                $('#reviewContent').html(review);
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

$('.photo_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*18;
    photoData(offset);
    let currentPage = $('#photoCurrent').val();
    $('#photoPage_'+currentPage).removeClass('current');
    $('#photoPage_'+currentPage).removeClass('disabled');
    $('#photoPage_'+page).addClass('current');
    $('#photoPage_'+page).addClass('disabled');
    $('#photoCurrent').val(page);
    if (page == 1) {
        $('#photoPrev').addClass('disabled');
    } else {
        $('#photoPrev').removeClass('disabled');
    }
    if (page == photoPages) {
        $('#photoNext').addClass('disabled');
    } else {
        $('#photoNext').removeClass('disabled');
    }
    $("#photoContent").scrollTop(0);
});

$('#photoPrev').click(function() {
    let page = $('#photoCurrent').val();
    let offset = (page-2)*18;
    photoData(offset);
    let curPage = page-1;
    $('#photoPage_'+page).removeClass('current');
    $('#photoPage_'+page).removeClass('disabled');
    $('#photoPage_'+curPage).addClass('current');
    $('#photoPage_'+curPage).addClass('disabled');
    $('#photoCurrent').val(curPage);
    if (curPage == 1) {
        $('#photoPrev').addClass('disabled');
    }
    $('#photoNext').removeClass('disabled');
    $("#photoContent").scrollTop(0);
});

$('#photoNext').click(function() {
    let page = $('#photoCurrent').val();
    let offset = (page)*18;
    photoData(offset);
    let curPage = parseInt(page)+1;
    $('#photoPage_'+page).removeClass('current');
    $('#photoPage_'+page).removeClass('disabled');
    $('#photoPage_'+curPage).addClass('current');
    $('#photoPage_'+curPage).addClass('disabled');
    $('#photoCurrent').val(curPage);
    if (curPage == photoPages) {
        $('#photoNext').addClass('disabled');
    }
    $('#photoPrev').removeClass('disabled');
    $("#photoContent").scrollTop(0);
});

function photoData(offset)
{
    $.ajax({
        url: base_url+"/photos/"+business_id+"?limit=18&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var photoRow = '';
            if (aData.length > 0) {
                $(aData).each(function(i, item) {
                    photoRow += '<li class="col-xl-2 col-md-4 col-sm-4 col-6" data-src="'+base_url+'/images/business/' + item.business_id + '/photos/' + item.photo + '">';
                    photoRow += '<a href=""><img class="img-responsive"src="'+base_url+'/images/business/' + item.business_id + '/photos/' + item.photo + '"><div class="demo-gallery-poster"><img src="'+base_url+'/images/zoom.png"></div></a></li>';
                });
                $('.photoContent').html(photoRow);
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

$('.ques_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*10;
    quesData(offset);
    let currentPage = $('#quesCurrent').val();
    $('#quesPage_'+currentPage).removeClass('current');
    $('#quesPage_'+currentPage).removeClass('disabled');
    $('#quesPage_'+page).addClass('current');
    $('#quesPage_'+page).addClass('disabled');
    $('#quesCurrent').val(page);
    if (page == 1) {
        $('#quesPrev').addClass('disabled');
    } else {
        $('#quesPrev').removeClass('disabled');
    }
    if (page == quesPages) {
        $('#quesNext').addClass('disabled');
    } else {
        $('#quesNext').removeClass('disabled');
    }
    $("#quesContent").scrollTop(0);
});

$('#quesPrev').click(function() {
    let page = $('#quesCurrent').val();
    let offset = (page-2)*10;
    quesData(offset);
    let curPage = page-1;
    $('#quesPage_'+page).removeClass('current');
    $('#quesPage_'+page).removeClass('disabled');
    $('#quesPage_'+curPage).addClass('current');
    $('#quesPage_'+curPage).addClass('disabled');
    $('#quesCurrent').val(curPage);
    if (curPage == 1) {
        $('#quesPrev').addClass('disabled');
    }
    $('#quesNext').removeClass('disabled');
    $("#quesContent").scrollTop(0);
});

$('#quesNext').click(function() {
    let page = $('#quesCurrent').val();
    let offset = (page)*10;
    quesData(offset);
    let curPage = parseInt(page)+1;
    $('#quesPage_'+page).removeClass('current');
    $('#quesPage_'+page).removeClass('disabled');
    $('#quesPage_'+curPage).addClass('current');
    $('#quesPage_'+curPage).addClass('disabled');
    $('#quesCurrent').val(curPage);
    if (curPage == quesPages) {
        $('#quesNext').addClass('disabled');
    }
    $('#quesPrev').removeClass('disabled');
    $("#quesContent").scrollTop(0);
});

function quesData(offset)
{
    $.ajax({
        url: base_url+"/questions/"+business_id+"?limit=10&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var quesRow = '';
            if (aData.length > 0) {
                var questCount = aData.length;
                var quesCountHalf = Math.floor(questCount/2);
                $(aData).each(function(i, item) {
                    if (i == 0 || i == quesCountHalf) {
                    quesRow += '<div class="col-xl-6">';
                    }
                    quesRow += '<div class="answer-card"><div class="main-content">';
                    quesRow += '<h5>' + (parseInt(i)+parseInt(offset)+1) + '. ' + item.question + '</h5>';
                    quesRow += '<p>' + (item.answer !== null ? item.answer : "") + '</p>';
                    quesRow += '<div class="auther-info">';
                    quesRow += '<h6>' + item.first_name + ' ' + item.last_name + '</h6>';
                    if (item.answer == '' || item.answer == null) {
                    quesRow += '<a class="a-animate reply-qn" href="" data-bs-toggle="modal" data-bs-target="#replyQn">Reply</a>';
                    }
                    quesRow += '</div></div></div>';
                    if (i == questCount-1 || i == quesCountHalf-1) {
                    quesRow += '</div>';
                    }
                });
                $('#quesContent').html(quesRow);
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

$('#submit_review').click(function() {
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url: base_url+'/addReview',
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
                location.reload();
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('#add_question').click(function() {
    var question = $('textarea[name="question"]').val();
    if (question == '') {
        $('#question_error').removeClass('d-none');
        $('textarea[name="question"]').addClass('border-danger');
        return false;
    }

    $.ajax({
        url: base_url+'/addQuestion',
        type: 'POST',
        data: {
            'business_id': business_id,
            'question': question
        },
        async: false,
        success: function (data) {
            var datas = JSON.parse(data);
            if (datas.status == 'success')
            {
                location.reload();
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('.qnReply').click(function() {
    var quesId = $(this).attr('quesId');
    var ques = $('#ques_'+ quesId).text();
    ques = ques.split(".  ");
    $('#modalQues').text(ques[1]);
    $('#submitReply').attr('questId', quesId);
    $('#replyQn').modal('show');
});

$('#submitReply').click(function() {
    var quesId = $(this).attr('questId');
    var answer = $('textarea[name="quesAnswer"]').val();
    if (answer == '') {
        $('#answer_error').removeClass('d-none');
        $('textarea[name="quesAnswer"]').addClass('border-danger');
        return false;
    }

    $.ajax({
        url: base_url+'/submitAnswer',
        type: 'POST',
        data: {
            'ques_id': quesId,
            'answer': answer
        },
        async: false,
        success: function (data) {
            var datas = JSON.parse(data);
            if (datas.status == 'success')
            {
                $('#successText').text('Anwer submitted successfully');
                $('#replyQn').modal('hide');
                $('#Success').modal('show');
                location.reload();
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('.savedItem').click(function() {
    var businessId = $(this).attr('businessId');
    var type = $(this).attr('saveType');
    var thisval = $(this);
    $.ajax({
        url: base_url+'/submitSavedItem',
        type: 'POST',
        data: {
            'businessId': businessId,
            'type': type
        },
        async: false,
        success: function (data) {
            var datas = JSON.parse(data);
            if (datas.status == 'success')
            {
                if (type == 'add') {
                    thisval.attr('saveType', 'remove');
                    $('#successText').text('Added to saved items');
                } else {
                    thisval.attr('saveType', 'add');
                    $('#successText').text('Removed from saved items');
                }
                $('#Success').modal('show');
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});


// Freelancers


$('.free_review_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*10;
    freeReviewData(offset);
    let currentPage = $('#reviewCurrent').val();
    $('#reviewPage_'+currentPage).removeClass('current');
    $('#reviewPage_'+currentPage).removeClass('disabled');
    $('#reviewPage_'+page).addClass('current');
    $('#reviewPage_'+page).addClass('disabled');
    $('#reviewCurrent').val(page);
    if (page == 1) {
        $('#freeReviewPrev').addClass('disabled');
    } else {
        $('#freeReviewPrev').removeClass('disabled');
    }
    if (page == reviewPages) {
        $('#freeReviewNext').addClass('disabled');
    } else {
        $('#freeReviewNext').removeClass('disabled');
    }
    $("#reviewContent").scrollTop(0);
});

$('#freeReviewPrev').click(function() {
    let page = $('#reviewCurrent').val();
    let offset = (page-2)*10;
    freeReviewData(offset);
    let curPage = page-1;
    $('#reviewPage_'+page).removeClass('current');
    $('#reviewPage_'+page).removeClass('disabled');
    $('#reviewPage_'+curPage).addClass('current');
    $('#reviewPage_'+curPage).addClass('disabled');
    $('#reviewCurrent').val(curPage);
    if (curPage == 1) {
        $('#freeReviewPrev').addClass('disabled');
    }
    $('#freeReviewNext').removeClass('disabled');
    $("#reviewContent").scrollTop(0);
});

$('#freeReviewNext').click(function() {
    let page = $('#reviewCurrent').val();
    let offset = (page)*10;
    freeReviewData(offset);
    let curPage = parseInt(page)+1;
    $('#reviewPage_'+page).removeClass('current');
    $('#reviewPage_'+page).removeClass('disabled');
    $('#reviewPage_'+curPage).addClass('current');
    $('#reviewPage_'+curPage).addClass('disabled');
    $('#reviewCurrent').val(curPage);
    if (curPage == reviewPages) {
        $('#freeReviewNext').addClass('disabled');
    }
    $('#freeReviewPrev').removeClass('disabled');
    $("#reviewContent").scrollTop(0);
});

function freeReviewData(offset)
{
    $.ajax({
        url: base_url+"/freelancer-reviews/"+freelancer_id+"?limit=10&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var review = '';
            if (aData.length > 0) {
                $(aData).each(function(i, item) {
                    review += '<div class="feedback-card"><div class="dp">';
                    if (item.profile_img != null && item.profile_img != '')
                        review += '<img src="'+base_url+'/images/user/' + item.user_id + '/profile/' + item.profile_img + '" alt="user-img">';
                    else
                        review += '<p>' + item.first_name[0].toUpperCase() + item.last_name[0].toUpperCase() + '</p>';

                    review += '</div>';
                    review += '<div class="main-content"><p>'+ item.remarks +'</p>';
                    review += '<div class="auther-info"><h6>'+ item.first_name +' '+ item.last_name +'</h6><p> | </p><p class="location">'+ item.city_name +', '+ item.state_name +'</p></div></div>';
                    review += '<div class="right-portion"><div class="flex-container"><i class="fas fa-star-half-alt"></i><h3>'+ item.rating +'</h3></div>';
                    review += '<div class="likes-wrapper"><a href="" class="like"><i class="fas fa-thumbs-up"></i><p>122</p></a><a href="" class="dislike"><i class="fas fa-thumbs-down"></i><p>122</p></a></div></div></div>';
                });
                $('#reviewContent').html(review);
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

$('.free_photo_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*18;
    freePhotoData(offset);
    let currentPage = $('#photoCurrent').val();
    $('#photoPage_'+currentPage).removeClass('current');
    $('#photoPage_'+currentPage).removeClass('disabled');
    $('#photoPage_'+page).addClass('current');
    $('#photoPage_'+page).addClass('disabled');
    $('#photoCurrent').val(page);
    if (page == 1) {
        $('#freePhotoPrev').addClass('disabled');
    } else {
        $('#freePhotoPrev').removeClass('disabled');
    }
    if (page == photoPages) {
        $('#freePhotoNext').addClass('disabled');
    } else {
        $('#freePhotoNext').removeClass('disabled');
    }
    $("#photoContent").scrollTop(0);
});

$('#freePhotoPrev').click(function() {
    let page = $('#photoCurrent').val();
    let offset = (page-2)*18;
    freePhotoData(offset);
    let curPage = page-1;
    $('#photoPage_'+page).removeClass('current');
    $('#photoPage_'+page).removeClass('disabled');
    $('#photoPage_'+curPage).addClass('current');
    $('#photoPage_'+curPage).addClass('disabled');
    $('#photoCurrent').val(curPage);
    if (curPage == 1) {
        $('#freePhotoPrev').addClass('disabled');
    }
    $('#freePhotoNext').removeClass('disabled');
    $("#photoContent").scrollTop(0);
});

$('#freePhotoNext').click(function() {
    let page = $('#photoCurrent').val();
    let offset = (page)*18;
    freePhotoData(offset);
    let curPage = parseInt(page)+1;
    $('#photoPage_'+page).removeClass('current');
    $('#photoPage_'+page).removeClass('disabled');
    $('#photoPage_'+curPage).addClass('current');
    $('#photoPage_'+curPage).addClass('disabled');
    $('#photoCurrent').val(curPage);
    if (curPage == photoPages) {
        $('#freePhotoNext').addClass('disabled');
    }
    $('#freePhotoPrev').removeClass('disabled');
    $("#photoContent").scrollTop(0);
});

function freePhotoData(offset)
{
    $.ajax({
        url: base_url+"/freelancer-photos/"+freelancer_id+"?limit=18&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var photoRow = '';
            if (aData.length > 0) {
                $(aData).each(function(i, item) {
                    photoRow += '<li class="col-xl-2 col-md-4 col-sm-4 col-6" data-src="'+base_url+'/images/freelancer/' + item.freelancer_id + '/photos/' + item.photo + '">';
                    photoRow += '<a href=""><img class="img-responsive"src="'+base_url+'/images/freelancer/' + item.freelancer_id + '/photos/' + item.photo + '"><div class="demo-gallery-poster"><img src="'+base_url+'/images/zoom.png"></div></a></li>';
                });
                $('.photoContent').html(photoRow);
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

$('.free_ques_pages').click(function() {
    let page = $(this).text();
    let offset = (page-1)*10;
    quesData(offset);
    let currentPage = $('#quesCurrent').val();
    $('#quesPage_'+currentPage).removeClass('current');
    $('#quesPage_'+currentPage).removeClass('disabled');
    $('#quesPage_'+page).addClass('current');
    $('#quesPage_'+page).addClass('disabled');
    $('#quesCurrent').val(page);
    if (page == 1) {
        $('#freeQuesPrev').addClass('disabled');
    } else {
        $('#freeQuesPrev').removeClass('disabled');
    }
    if (page == quesPages) {
        $('#freeQuesNext').addClass('disabled');
    } else {
        $('#freeQuesNext').removeClass('disabled');
    }
    $("#quesContent").scrollTop(0);
});

$('#freeQuesPrev').click(function() {
    let page = $('#quesCurrent').val();
    let offset = (page-2)*10;
    quesData(offset);
    let curPage = page-1;
    $('#quesPage_'+page).removeClass('current');
    $('#quesPage_'+page).removeClass('disabled');
    $('#quesPage_'+curPage).addClass('current');
    $('#quesPage_'+curPage).addClass('disabled');
    $('#quesCurrent').val(curPage);
    if (curPage == 1) {
        $('#freeQuesPrev').addClass('disabled');
    }
    $('#freeQuesNext').removeClass('disabled');
    $("#quesContent").scrollTop(0);
});

$('#freeQuesNext').click(function() {
    let page = $('#quesCurrent').val();
    let offset = (page)*10;
    quesData(offset);
    let curPage = parseInt(page)+1;
    $('#quesPage_'+page).removeClass('current');
    $('#quesPage_'+page).removeClass('disabled');
    $('#quesPage_'+curPage).addClass('current');
    $('#quesPage_'+curPage).addClass('disabled');
    $('#quesCurrent').val(curPage);
    if (curPage == quesPages) {
        $('#freeQuesNext').addClass('disabled');
    }
    $('#freeQuesPrev').removeClass('disabled');
    $("#quesContent").scrollTop(0);
});

function freeQuesData(offset)
{
    $.ajax({
        url: base_url+"/freelancer-questions/"+freelancer_id+"?limit=10&offset="+offset,
        type: 'GET',
        async: 'FALSE',
        dataType: 'JSON',
        success: function (data) {
            var aData = data.data;
            var quesRow = '';
            if (aData.length > 0) {
                var questCount = aData.length;
                var quesCountHalf = Math.floor(questCount/2);
                $(aData).each(function(i, item) {
                    if (i == 0 || i == quesCountHalf) {
                    quesRow += '<div class="col-xl-6">';
                    }
                    quesRow += '<div class="answer-card"><div class="main-content">';
                    quesRow += '<h5>' + (parseInt(i)+parseInt(offset)+1) + '. ' + item.question + '</h5>';
                    quesRow += '<p>' + (item.answer !== null ? item.answer : "") + '</p>';
                    quesRow += '<div class="auther-info">';
                    quesRow += '<h6>' + item.first_name + ' ' + item.last_name + '</h6>';
                    if (item.answer == '' || item.answer == null) {
                    quesRow += '<a class="a-animate reply-qn" href="" data-bs-toggle="modal" data-bs-target="#replyQn">Reply</a>';
                    }
                    quesRow += '</div></div></div>';
                    if (i == questCount-1 || i == quesCountHalf-1) {
                    quesRow += '</div>';
                    }
                });
                $('#quesContent').html(quesRow);
            }
        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        },
    });
}

$('#free_submit_review').click(function() {
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url: base_url+'/addFreelancerReview',
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
                location.reload();
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('#free_add_question').click(function() {
    var question = $('textarea[name="question"]').val();
    if (question == '') {
        $('#question_error').removeClass('d-none');
        $('textarea[name="question"]').addClass('border-danger');
        return false;
    }

    $.ajax({
        url: base_url+'/addFreelancerQuestion',
        type: 'POST',
        data: {
            'freelancer_id': freelancer_id,
            'question': question
        },
        async: false,
        success: function (data) {
            var datas = JSON.parse(data);
            if (datas.status == 'success')
            {
                location.reload();
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

$('.freelancerQnReply').click(function() {
    var quesId = $(this).attr('quesId');
    var ques = $('#ques_'+ quesId).text();
    ques = ques.split(".  ");
    $('#modalQues').text(ques[1]);
    $('#freelancerSubmitReply').attr('questId', quesId);
    $('#replyQn').modal('show');
});

$('#freelancerSubmitReply').click(function() {
    var quesId = $(this).attr('questId');
    var answer = $('textarea[name="quesAnswer"]').val();
    if (answer == '') {
        $('#answer_error').removeClass('d-none');
        $('textarea[name="quesAnswer"]').addClass('border-danger');
        return false;
    }

    $.ajax({
        url: base_url+'/freelancerSubmitAnswer',
        type: 'POST',
        data: {
            'ques_id': quesId,
            'answer': answer
        },
        async: false,
        success: function (data) {
            var datas = JSON.parse(data);
            if (datas.status == 'success')
            {
                $('#successText').text('Anwer submitted successfully');
                $('#replyQn').modal('hide');
                $('#Success').modal('show');
                location.reload();
            }
        },
        error: function (xhr) {
            alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }

    });
});

// $('.freelancerSavedItem').click(function() {
//     var businessId = $(this).attr('businessId');
//     var type = $(this).attr('saveType');
//     var thisval = $(this);
//     $.ajax({
//         url: base_url+'/freelancerSubmitSavedItem',
//         type: 'POST',
//         data: {
//             'businessId': businessId,
//             'type': type
//         },
//         async: false,
//         success: function (data) {
//             var datas = JSON.parse(data);
//             if (datas.status == 'success')
//             {
//                 if (type == 'add') {
//                     thisval.attr('saveType', 'remove');
//                     $('#successText').text('Added to saved items');
//                 } else {
//                     thisval.attr('saveType', 'add');
//                     $('#successText').text('Removed from saved items');
//                 }
//                 $('#Success').modal('show');
//             }
//         },
//         error: function (xhr) {
//             alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
//         }

//     });
// });