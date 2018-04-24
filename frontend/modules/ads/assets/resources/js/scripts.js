$(document ).ready(function() {
    $('#mark-name').change(function() {
        $('#model-name').find('option').remove();
        $.ajax({
            type: "POST",
            url: '/advert/models',
            data: 'key='+$("#mark-name").val(),
            success: function(data) {
                $.each(data, function(i, value) {
                    $('#model-name').append($('<option>').text(value.name).attr('value', value.id));
                });
            },
        });
    });

});