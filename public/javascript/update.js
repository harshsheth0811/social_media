$(document).on('click', '.btn-edit', function() {
    var postId = $(this).data('id');
    var postDescription = $(this).closest('.photo-item').find('.photo-description').text();
    
    $('#post_id').val(postId);
    $('#editDescription').val(postDescription);
    $('#editPhotoModal').show();    
});

$('.close').on('click', function() {
    closeModal();
});

function closeModal() {
    $('#editPhotoForm')[0].reset();
    $('#editPhotoModal').hide();
}

$('#editPhotoForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var postId = $('#post_id').val();
    var url = '/profile/' + postId;

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                var updatedItem = $('.photo-item').find(`[data-id='${postId}']`).closest('.photo-item');
                updatedItem.find('.photo-description').text(response.post.description);
                if (response.post.post_image) {
                    updatedItem.find('img').attr('src', 'post_images/' + response.post.post_image);
                }
                closeModal();

                // $('#editPhotoModal').hide();
            } else {
                alert('Failed to update post.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
