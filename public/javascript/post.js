$(function () {
    $('#postForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: postStore,
            dataType: "JSON",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    var createdDate = new Date(response.post.created_at);
                    var formattedDate = createdDate.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                    var likeIconUrl = response.post.user_liked ? likeBlueImageUrl : likeImageUrl;

                    $('#description').val('');
                    $('#post_images').val('');

                    $('.posts-all').prepend(`
                        <div class="post-container" data-post-id="${response.post.id}">
                            <div class="post-row">
                                <div class="user-profile">
                                    <img src="profile_picture/${response.post.user.profile_picture}" alt="Profile Picture">
                                    <div>
                                        <p>${response.post.user.username}</p>
                                        <small>${formattedDate}</small>
                                    </div>
                                </div>
                                <a href="#"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                            <p class="post-text">${response.post.description}</p>
                            ${response.post.post_image ? `<img src="${response.post_image_url}" alt="Post Image" class="post-img">` : ''}
                            <div class="post-row">
                                <div class="activity-icons">
                                    <div class="like-icon" data-liked="${response.post.user_liked}">
                                        <img src="${likeIconUrl}" alt="Like logo">
                                        <span class="like-count">0</span>
                                    </div>
                                    <div class="comments-icon"><img src="${commentsImageUrl}" alt="Comments logo"></div>
                                </div>
                                <div class="post-profile-icon">
                                    <img src="profile_picture/${response.post.user.profile_picture}" alt="Profile Picture"><i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                        </div>
                    `);
                }
            },
            error: function (response) {
                if (response.responseJSON.errors) {
                    $('#descriptionError').text(response.responseJSON.errors.description);
                    $('#post_imagesError').text(response.responseJSON.errors.post_images);
                }
            }
        });
    });
});

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







// $('#postForm').validate({
//     rules: {
//         description: {
//             required: true,
//             maxlength: 255
//         },
//         post_images: {
//             required: true
//         }
//     },
//     messages: {
//         description: {
//             required: "Description Field is Required*",
//             maxlength: "Description must not exceed 255 characters*"
//         },
//         post_images: {
//             required: "Please select an image to upload*"
//         }
//     },
//     submitHandler: function (form) {
//         form.submit();
//     }
// });