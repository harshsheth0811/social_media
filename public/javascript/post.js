$(function() {
    $('#postForm').submit(function(e) {
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
                        $('#description').val('');
                        $('#post_images').val('');
    
                        $('.posts-container').prepend(`
                                    <div class="post-container">
                                        <div class="post-row">
                                            <div class="user-profile">
                                                <img src="${response.post.user.profile_picture}" alt="Profile Picture">
                                                <div>
                                                    <p>${response.post.user.username}</p>
                                                    <small>${response.post.created_at}</small>
                                                </div>
                                            </div>
                                            <a href="#"><i class="fa fa-ellipsis-v"></i></a>
                                        </div>
                                        <p class="post-text">${response.post.description}</p>
                                        ${response.post.post_image ? `<img src="${response.post_image_url}" alt="Post Image" class="post-img">` : ''}
                                        <div class="post-row">
                                            <div class="activity-icons">
                                                <div><img src="{{ asset('assets/images/like-blue.png') }}" alt="Like Blue logo"> 0</div>
                                                <div><img src="{{ asset('assets/images/comments.png') }}" alt="Comments logo"> 0</div>
                                                <div><img src="{{ asset('assets/images/share.png') }}" alt="Share logo"> 0</div>
                                            </div>
                                            <div class="post-profile-icon">
                                                <img src="${response.post.user.profile_picture}" alt="Profile Picture"><i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>
                                    </div>
                        `);
                    }
                },
                // error: function (response) {
                //     if (response.errors) {
                //         $('#descriptionError').text(response.responseJSON.errors.description);
                //         $('#post_imagesError').text(response.responseJSON.errors.post_images);
                //     }
                // }
            });
        });
})
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
//         form.preventDefault();
//         var formData = new FormData(this);
// console.log('sadasd');
//         $.ajax({
//             url: "{{ route('home.store') }}",
//             // type: 'POST',
//             data: formData,
//             success: function (response) {
//                 // console.log(response);
                
//                 if (response.success) {
//                     $('#description').val('');
//                     $('#post_images').val('');

//                     $('#posts-container').prepend(`
//                                 <div class="post-container">
//                                     <div class="post-row">
//                                         <div class="user-profile">
//                                             <img src="${response.post.user.profile_picture}" alt="Profile Picture">
//                                             <div>
//                                                 <p>${response.post.user.username}</p>
//                                                 <small>${response.post.created_at}</small>
//                                             </div>
//                                         </div>
//                                         <a href="#"><i class="fa fa-ellipsis-v"></i></a>
//                                     </div>
//                                     <p class="post-text">${response.post.description}</p>
//                                     ${response.post.post_image ? `<img src="${response.post_image_url}" alt="Post Image" class="post-img">` : ''}
//                                     <div class="post-row">
//                                         <div class="activity-icons">
//                                             <div><img src="{{ asset('assets/images/like-blue.png') }}" alt="Like Blue logo"> 0</div>
//                                             <div><img src="{{ asset('assets/images/comments.png') }}" alt="Comments logo"> 0</div>
//                                             <div><img src="{{ asset('assets/images/share.png') }}" alt="Share logo"> 0</div>
//                                         </div>
//                                         <div class="post-profile-icon">
//                                             <img src="${response.post.user.profile_picture}" alt="Profile Picture"><i class="fa fa-caret-down"></i>
//                                         </div>
//                                     </div>
//                                 </div>
//                     `);
//                 }
//             },
//             error: function (response) {
//                 if (response.responseJSON.errors) {
//                     $('#descriptionError').text(response.responseJSON.errors.description);
//                     $('#post_imagesError').text(response.responseJSON.errors.post_images);
//                 }
//             }
//         });
//     }
// });