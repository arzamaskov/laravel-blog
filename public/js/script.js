$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".like").on('click', function(event) {
    event.preventDefault();


    var url = $(this).parent().find('.img_src').val();
    var url_inst = $(this).parent().find('.insta_link').val();

    $.ajax({
       type:'POST',
       url:'add',
       data:{url:url, url_inst:url_inst},
       success: function (data) {
                console.log(data);
                $('input[value="' + data + '"]').siblings('.like').toggleClass('d-none');
                $('input[value="' + data + '"]').siblings('.dislike').toggleClass('d-none');
            }

    });
});

$(".dislike").on('click', function(event) {
    event.preventDefault();

    var url = $(this).parent().find('.img_src').val();
    var url_inst = $(this).parent().find('.insta_link').val();

    $.ajax({
       type:'POST',
       url:'delete',
       data:{url:url, url_inst:url_inst},
       success: function (data) {
                console.log(data);
                $('input[value="' + data + '"]').siblings('.like').toggleClass('d-none');
                $('input[value="' + data + '"]').siblings('.dislike').toggleClass('d-none');
            }

    });
});

$.ajax({
    beforeSend: function() {
        $('#loader').show();
    },
    complete: function() {
        $('#loader').hide();
    }
});
