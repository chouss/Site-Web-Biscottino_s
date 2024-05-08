document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.login_form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const firstName = document.getElementById('sign-in-mail').value.trim();
        const password = document.getElementById('login_pswd').value.trim();
        const errorMessages = [];
        if (firstName === '') {
            errorMessages.push('Please enter your first name.');
        }
        if (password.length < 1) {
            errorMessages.push('Please enter your password.');
        }
        if (errorMessages.length > 0) {
            displayErrors(errorMessages);
        } else {
            form.submit();
        }
    });

    function displayErrors(errors) {
        const errorContainer = document.querySelector('.error-messages');
        errorContainer.innerHTML = '';

        errors.forEach(function (error) {
            const errorMessage = document.createElement('p');
            errorMessage.textContent = error;
            errorContainer.appendChild(errorMessage);
        });
    }
});


document.addEventListener("DOMContentLoaded", function() {

    function openSignUpPage() {
        window.open("../sign_up/sign_up.html", "_blank", "width=600,height=400");
    }

    document.getElementById("signupLink").addEventListener("click", openSignUpPage);
});
