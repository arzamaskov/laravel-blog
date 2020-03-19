$(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".form-add").on('submit', function(event) {
        event.preventDefault();
        $('#loader').toggleClass('d-none');


        var url = $('input[name="url"]', this).val();
        var url_inst = $('input[name="url_inst"]', this).val();

        $.ajax({
        type:'POST',
        url:'add',
        data:{url:url, url_inst:url_inst},
        success: function (data) {
                    console.log(data);
                    $('input[value="' + data + '"]').siblings('.like').toggleClass('d-none');
                    $('input[value="' + data + '"]').siblings('.dislike').toggleClass('d-none');
                    $('#loader').toggleClass('d-none');
                }

        });
    });

    $(".form-delete").on('submit', function(event) {
        event.preventDefault();
            $('#loader').toggleClass('d-none');

        var url = $('input[name="url"]', this).val();
        var url_inst = $('input[name="url_inst"]', this).val();

        $.ajax({
        type:'POST',
        url:'delete',
        data:{url:url, url_inst:url_inst},
        success: function (data) {
                    console.log(data);
                    $('input[value="' + data + '"]').siblings('.like').toggleClass('d-none');
                    $('input[value="' + data + '"]').siblings('.dislike').toggleClass('d-none');
                    $('#loader').toggleClass('d-none');
                }

        });
    });
});
