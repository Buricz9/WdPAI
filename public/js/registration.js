const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
const nameInput = form.querySelector('input[name="name"]');
const surnameInput = form.querySelector('input[name="surname"]');
const messagesContainer = document.querySelector('.messages');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition, message) {
    const errorClass = 'no-valid';
    condition ? element.classList.remove(errorClass) : element.classList.add(errorClass);

    if (!condition && message) {
        const errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.textContent = message;
        messagesContainer.appendChild(errorMessage);
    }
}

function clearValidationMessages() {
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(message => message.remove());
}

function validateForm() {
    clearValidationMessages();

    let isValid = true;

    markValidation(emailInput, isEmail(emailInput.value), 'Please provide a valid email');
    markValidation(passwordInput, passwordInput.value.length >= 8, 'Password should be at least 8 characters long');
    markValidation(confirmedPasswordInput, arePasswordsSame(passwordInput.value, confirmedPasswordInput.value), 'Passwords do not match');
    markValidation(nameInput, nameInput.value.trim() !== '', 'Name is required');
    markValidation(surnameInput, surnameInput.value.trim() !== '', 'Surname is required');

    // Check if any field is marked as invalid
    const invalidFields = form.querySelectorAll('.no-valid');
    if (invalidFields.length > 0) {
        isValid = false;
    }

    return isValid;
}

form.addEventListener('submit', function (event) {
    if (!validateForm()) {
        event.preventDefault(); // Stop form submission if validation fails
    }
});
