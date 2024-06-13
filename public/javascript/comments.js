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
                    response.comments.forEach(function (comment) {
                        commentsContainer.append(renderComment(comment));
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

    function renderComment(comment) {
        var commentHtml = '<div class="comment" data-comment-id="' + comment.id + '">';
        commentHtml += '<p><strong>' + comment.user.username + ':</strong> ' + comment.content + '</p>';

        if (comment.replies && comment.replies.length > 0) {
            commentHtml += '<div class="replies">';
            comment.replies.forEach(function (reply) {
                commentHtml += renderComment(reply);
            });
            commentHtml += '</div>';
        }

        if (!comment.parent_id) {
            commentHtml += '<button class="reply-btn" data-comment-id="' + comment.id + '">Reply</button>';
        }
        commentHtml += '<div class="reply-form-container" style="display: none;">';
        commentHtml += '<input type="text" class="reply-input" placeholder="Add a reply...">';
        commentHtml += '<button class="submit-reply" data-comment-id="' + comment.id + '">Reply</button>';
        commentHtml += '</div></div>';

        return commentHtml;
    }

    $(document).on('click', '.reply-btn', function () {
        var replyFormContainer = $(this).siblings('.reply-form-container');
        replyFormContainer.toggle();
    });

    $(document).on('click', '.submit-reply', function () {
        var commentId = $(this).data('comment-id');
        var postId = modalSubmitComment.data("post-id");
        var content = $(this).siblings('.reply-input').val();
        var replyFormContainer = $(this).parent();

        $.ajax({
            url: commentUrl,
            type: 'POST',
            data: {
                post_id: postId,
                content: content,
                parent_id: commentId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    var newCommentHtml = renderComment(response.comment);
                    replyFormContainer.siblings('.replies').append(newCommentHtml);
                    replyFormContainer.find('.reply-input').val('');
                    replyFormContainer.hide();
                } else {
                    alert('Failed to add reply.');
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred.');
            }
        });
    });

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
                content: content,
                parent_id: null
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    commentsContainer.append(renderComment(response.comment));
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
