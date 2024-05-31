$('#loginForm').validate({
    rules: {
        email: {
            required: true,
            email: true,
            trim: true,
        },
        password:{
            required: true,
            minlength: 6,
            maxlength: 15,
            trim: true,
        },
    },

    messages: {
        email: {
            required: "Email Field is Required*",
            email: "Please enter a valid email address*",
        },
        password: {
            required: "Password Field is Required*",
            minlength: "Your password must be at least 5 characters long*",
            maxlength: "Please enter no more than 15 characters*",
        },
    },

    submitHandler: function (form) {
        form.submit();
    }
});