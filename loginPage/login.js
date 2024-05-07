const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");

const container = document.querySelector(".container");

sign_up_btn.addEventListener('click', () => {
    container.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener('click', () => {
    container.classList.remove("sign-up-mode");
});

const signInForm = document.querySelector('.sign-up-form');

// Add event listener for form submission
signInForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior

    // Validate the form
    if (!validateForm()) {
        return; // Stop form submission if validation fails
    }

    // If validation succeeds, submit the form
    signInForm.submit();
});
function validateForm(event) {
    event.preventDefault(); // Prevent default form submission behavior

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Perform validation
    if (!isValidEmail(email)) {
        alert("Please enter a valid email address");
        return;
    }

    // If validation succeeds, submit the form
    document.getElementById("myForm").submit();
}

function isValidEmail(email) {
    // Regular expression for validating email addresses
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}