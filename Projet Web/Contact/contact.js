document.addEventListener('DOMContentLoaded', function() {
    var nameInput = document.getElementById('name');
    var emailInput = document.getElementById('email');
    var messageInput = document.getElementById('message');

    nameInput.addEventListener('focus', function() {
        nameInput.classList.add('focused');
    });

    nameInput.addEventListener('blur', function() {
        nameInput.classList.remove('focused');
    });

    emailInput.addEventListener('focus', function() {
        emailInput.classList.add('focused');
    });

    emailInput.addEventListener('blur', function() {
        emailInput.classList.remove('focused');
    });

    messageInput.addEventListener('focus', function() {
        messageInput.classList.add('focused');
    });

    messageInput.addEventListener('blur', function() {
        messageInput.classList.remove('focused');
    });

});

document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(function(input) {
        input.addEventListener('focus', function() {
            var selectedInput = input.getAttribute('placeholder');
            document.getElementById('selected-input').innerText = "Selected input: " + selectedInput;
        });
    });
});
