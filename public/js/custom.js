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
                    $('#delete-error').hide();
                    $('tr#' + response).remove();
                } else {
                    $('#delete-error').hide()
                }   
            },
            error: function(xhr) {
                $('#delete-error').show();
            }
        });
    });
});
