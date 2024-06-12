$(document).ready(function () {
    var modal = $('#editProfileModal');
    var btn = $('#editProfileBtn');
    var span = $('.close');

    btn.on('click', function () {
        modal.show();
    });

    span.on('click', function () {
        modal.hide();
    });

    $(window).on('click', function (event) {
        if ($(event.target).is(modal)) {
            modal.hide();
        }
    });

    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: upd_profileUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert('An error occurred');
                }
            },
            error: function (response) {
                alert('An error occurred');
            }
        });
    });
});
