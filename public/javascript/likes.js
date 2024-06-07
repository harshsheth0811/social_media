// JavaScript code to handle like button click
$(document).on('click', '.like-icon', function () {
    var likeIcon = $(this);
    var postId = likeIcon.closest('.post-container').data('post-id');
    var isLiked = likeIcon.data('liked') === 'true';
    var url = isLiked ? unlikeUrl : likeUrl;

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            posts_id: postId,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                var newLikedStatus = !isLiked ? 'true' : 'false';
                likeIcon.data('liked', newLikedStatus);
                likeIcon.find('.like-count').text(response.like_count);

                var newImageUrl = newLikedStatus === 'true' ? likeBlueImageUrl : likeImageUrl;
                likeIcon.find('img').attr('src', newImageUrl);
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});
