$(function() {
    $(".deleteEmployee").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: window.location.origin + '/employee/delete/' + this.id,
            type: 'delete',
            dataType: "JSON",
            success: function (response)
            {
                if(response) {
                    $('#user-delete-error').hide();
                    $('tr#user-' + response).remove();
                } else {
                    $('#user-delete-error').hide()
                }   
            },
            error: function(xhr) {
                $('#user-delete-error').show();
            }
        });
    });

});

$(function() {
    $(".deletePost").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: window.location.origin + '/post/delete/' + this.id,
            type: 'delete',
            dataType: "JSON",
            success: function (response)
            {
                if(response) {
                    $('#post-delete-error').hide();
                    $('tr#post-' + response).remove();
                } else {
                    $('#post-delete-error').hide()
                }   
            },
            error: function(xhr) {
                $('#post-delete-error').show();
            }
        });
    });

});
