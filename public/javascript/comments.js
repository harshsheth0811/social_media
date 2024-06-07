$(document).ready(function () {
    var modal = $("#commentModal");
    var commentsContainer = $("#commentsContainer");
    var modalSubmitComment = $("#modalSubmitComment");
    var modalCommentInput = $("#modalCommentInput");
    var closeBtn = $(".close");
    function fetchComments(postId) {
        $.ajax({
            url: '/comments/' + postId,
            type: 'GET',
            success: function (response) {
                commentsContainer.empty();
                if (response.success) {
                    var comments = response.comments;
                    comments.forEach(function (comment) {
                        commentsContainer.append('<div class="comment"><p><strong>' + comment.user.username + ':</strong> ' + comment.content + '</p></div>');
                    });
                } else {
                    commentsContainer.append('<p>No comments yet.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while fetching comments.');
            }
        });
    }

    $("div.activity-icons div.comments-icon").click(function () {
        var postId = $(this).closest(".post-container").data("post-id");
        modalSubmitComment.data("post-id", postId);
        modal.css("display", "block");
        fetchComments(postId);
    });

    closeBtn.click(function () {
        modal.css("display", "none");
    });

    $(window).click(function (event) {
        if (event.target == modal[0]) {
            modal.css("display", "none");
        }
    });

    $("#commentsForm").submit(function (event) {
        event.preventDefault();
        var postId = modalSubmitComment.data("post-id");
        var content = modalCommentInput.val();

        $.ajax({
            url: commentUrl,
            type: 'POST',
            data: {
                post_id: postId,
                content: content
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    var comment = response.comment;
                    var newCommentHtml = '<div class="comment"><p><strong>' + comment.user.username + ':</strong> ' + comment.content + '</p></div>';
                    commentsContainer.append(newCommentHtml);
                    modalCommentInput.val('');
                } else {
                    alert('Failed to add comment.');
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred.');
            }
        });
    });
});
