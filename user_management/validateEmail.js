function validateEmail() { 
    const emailInput = document.getElementById("email"); 
    const emailValue = emailInput.value.trim(); 
    const errorMessage = document.getElementById("emailError"); 
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (emailValue === "") { 
        errorMessage.textContent = "Email cannot be empty."; 
        emailInput.classList.add("invalid"); 
        return false; 
    } 
     
    else if (!emailRegex.test(emailValue)) { 
        errorMessage.textContent = "Please enter a valid email address."; 
        emailInput.classList.add("invalid"); 
        return false; 
    } else { 
         
        errorMessage.textContent = ""; 
        emailInput.classList.remove("invalid"); 
        return true; 
    } 
} 
function validateForm(event) { 
    if (!validateEmail()) { 
        event.preventDefault();  
    } 
}