$('#signupForm').validate({
    rules: {
        username: {
            required: true,
            trim: true,
        },
        email: {
            required: true,
            email: true,
            trim: true,
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 15,
            trim: true,
        },
        password_confirmation: {
            required: true,
            minlength: 6,
            maxlength: 15,
            equalTo: "#password",
            trim: true,
        },
    },

    messages: {
        username: {
            required: "Username Field is Required*",
        },
        email: {
            required: "Email Field is Required*",
            email: "Please enter a valid email address*",
        },
        password: {
            required: "Password Field is Required*",
            minlength: "Your password must be at least 5 characters long*",
            maxlength: "Please enter no more than 15 characters*",
        },
        password_confirmation: {
            required: "Confirm Password Field is Required*",
            equalTo: "Please enter the same password as above*",
        },
    },

    submitHandler: function (form) {
        form.submit();
    }
});