$("form#register-form").validate({
    role: {
        login: {
            required: true,
            remote: {
                type: "POST",
                data: $("#login"),
                url: "/register/isFreeLogin"
            }
        },
        firstname: {
            required: true,
        },
        lastnast: {
            required: true,
        },
        email: {
            required: true,
            email: true,
            remote: "/register/isFreeEmail"
        },
        password: {
            minlength: 6
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        login: {
            required: "Login jest wymagany",
            minlength: "Login musi składać się z conajmniej 6 znaków",
        },
        firstname: {
            required: "Podaj swoje imię",
        },
        lastname: {
            required: "Podaj swoje nazwisko",
        },
        email: {
            required: "Email jest wymagany",
            email: "Podaj prawidłowy email",
            remote: "Masz już konto."
        },
        password: {
            minlength: "Hasło musi składać się z conajmniej 6 znaków"
        },
        password_confirmation: {
            required: "Wprowadź ponownie swoje hasło",
            equalTo: "Hasła nie są identyczne",
        }
    },
    errorClass: "is-invalid error",
});
