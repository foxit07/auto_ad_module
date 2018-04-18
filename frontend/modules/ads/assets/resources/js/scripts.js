$(document).ready(function() {
    $('#mark-name').change(function() {
      alert('122210');

        $.ajax({
            type: "POST",
            url: 'advert/models',
            data: data,
            success: success,
            dataType: dataType
        });
    });
});