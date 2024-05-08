document.addEventListener('DOMContentLoaded', function () {
    const signupForm = document.querySelector('.login_form');

    signupForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const firstName = document.getElementById('name-signup').value.trim();
        const lastName = document.getElementById('surname-signup').value.trim();
        const email = document.getElementById('mail-signup').value.trim();
        const password = document.getElementById('Password').value.trim();
        const gender = document.querySelector('input[name="gender"]:checked');
        const occupation = document.querySelector('input[name="occupation"]:checked');
        const termsAgreed = document.getElementById('remember').checked;
        const birthDate = document.getElementById('birthdate').value.trim();

        let isValid = true;
        let errorMessage = '';

        if (firstName === '') {
            isValid = false;
            errorMessage += 'First name is required.\n';
        }
        if (lastName === '') {
            isValid = false;
            errorMessage += 'Last name is required.\n';
        }
        if (email === '' || !email.includes('@')) {
            isValid = false;
            errorMessage += 'Please enter a valid email address.\n';
        }
        if (password.length < 8) {
            isValid = false;
            errorMessage += 'Password must be at least 8 characters long.\n';
        }
        if (!gender) {
            isValid = false;
            errorMessage += 'Please select your gender.\n';
        }
        if (!occupation) {
            isValid = false;
            errorMessage += 'Please select your occupation.\n';
        }
        if (birthDate === '') {
            isValid = false;
            errorMessage += 'Birth date is required.\n';
        }
        if (!termsAgreed) {
            isValid = false;
            errorMessage += 'Please agree to the terms.\n';
        }
        if (!isValid) {
            alert(errorMessage);
        } else {
            signupForm.submit();
        }
    });
});
