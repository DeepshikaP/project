// Function to validate form input
function validateForm(event) {
    // Prevent the form from submitting if validation fails
    let isValid = true;

    // Get form inputs
    const username = document.getElementById("username");
    const dob = document.getElementById("dob");
    const gender = document.getElementById("gender");
    const password = document.getElementById("password");
    const phone = document.getElementById("phone");
    const email = document.getElementById("email");
    const locality = document.getElementById("locality");

    // Clear previous error messages
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((msg) => msg.remove());

    // Helper function to display error message
    function showError(input, message) {
        const error = document.createElement("div");
        error.className = "error-message";
        error.style.color = "red";
        error.style.fontSize = "12px";
        error.textContent = message;
        input.parentElement.appendChild(error);
        isValid = false;
    }

    // Validate username
    if (username && username.value.trim() === "") {
        showError(username, "Username is required.");
    }

    // Validate DOB
    if (dob && dob.value === "") {
        showError(dob, "Date of Birth is required.");
    }

    // Validate gender
    if (gender && gender.value === "") {
        showError(gender, "Gender is required.");
    }

    // Validate password
    if (password && password.value.trim().length < 6) {
        showError(password, "Password must be at least 6 characters long.");
    }

    // Validate phone (optional but must be numeric if provided)
    const phonePattern = /^[0-9]{10}$/;
    if (phone && phone.value !== "" && !phonePattern.test(phone.value)) {
        showError(phone, "Phone number must be 10 digits.");
    }

    // Validate email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && email.value.trim() === "") {
        showError(email, "Email is required.");
    } else if (email && !emailPattern.test(email.value)) {
        showError(email, "Invalid email format.");
    }

    // Validate locality
    if (locality && locality.value.trim() === "") {
        showError(locality, "Locality is required.");
    }

    // If the form is invalid, prevent submission
    if (!isValid) {
        event.preventDefault();
    }
}

// Attach validation to the form submit event
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    form.addEventListener("submit", validateForm);
});
