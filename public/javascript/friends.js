$(document).ready(function () {
    $('.add-friend-btn').click(function () {
        var userId = $(this).data('user-id');
        var friendId = $(this).data('friend-id');
        var button = $(this);

        $.ajax({
            url: friendStore,
            type: 'POST',
            data: {
                user_id: userId,
                friend_id: friendId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    alert('Friend request sent.');
                    button.closest('.online-list').remove();
                } else {
                    alert('Failed to send friend request.');
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred.');
            }
        });
    });
});
