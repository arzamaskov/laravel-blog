<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".like").on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('d-none');
        $(this).next('.dislike').toggleClass('d-none');

        var url = $(this).parent().find('.img_src').val();
        var url_inst = $(this).parent().find('.insta_link').val();

        $.ajax({
           type:'POST',
           url:'add',
           data:{url:url, url_inst:url_inst},
           success: function (data) {
                    console.log(data);
                }
                
        });
    });

    $(".dislike").on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('d-none');
        $(this).prev('.like').toggleClass('d-none');

        var url = $(this).parent().find('.img_src').val();
        var url_inst = $(this).parent().find('.insta_link').val();

        $.ajax({
           type:'POST',
           url:'delete',
           data:{url:url, url_inst:url_inst},
           success: function (data) {
                    console.log(data);
                }
                
        });
	});
</script>