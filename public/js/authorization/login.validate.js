$("form#login-form").validate({
    role: {
        email: {
            required: true,
        },
        password: {
            required: true,
            minlength: 6
        },
    },
    messages: {
        email: {
            required: "Podaj email lub login",
        },
        password: {
            required: "Podaj swoje hasło",
            minlength: "Hasło składa się z conajmniej 6 znaków"
        }
    }

});
