$(document).on('click', '.btn-delete', function () {
    var postId = $(this).data('id');
    var url = '/profile/' + postId;

    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        data: {
            postid: postId,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
  
                $(this).closest('.photo-item').remove();
            } else {
                alert('Failed to delete post.');
            }
        }.bind(this),
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
