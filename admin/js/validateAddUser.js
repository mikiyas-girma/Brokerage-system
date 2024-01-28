// event listeners for blur
document.getElementById('firstname').addEventListener('blur', validateFirstName);
document.getElementById('lastname').addEventListener('blur', validateLastName);
document.getElementById('username').addEventListener('blur', validateUserName);
document.getElementById('email').addEventListener('blur', validateEmail);
document.getElementById('password').addEventListener('blur', validatePassword);

function validateFirstName() {
    const firstname = document.getElementById('firstname');
    const re = /^[a-zA-Z]{2,10}$/;
    if (!re.test(firstname.value)) {
        firstname.style.border = '1px solid red';
        firstname.nextElementSibling.style.display = 'block';
        return false;
    }
    else {
        firstname.style.border = '1px solid green';
        firstname.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validateLastName() {
    const re = /^[a-zA-Z]{2,10}$/;
    const lastname = document.getElementById('lastname');

    if (!re.test(lastname.value)) {
        lastname.style.border = '1px solid red';
        lastname.nextElementSibling.style.display = 'block';
        return false;
    }
    else {
        lastname.style.border = '1px solid green';
        lastname.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validateUserName() {
    const username = document.getElementById('username');
    const re = /^(([A-Za-z]{2,})+)([A-Za-z0-9]{2,5})$/;

    if (!re.test(username.value)) {
        username.style.border = '1px solid red';
        username.nextElementSibling.style.display = 'block';
        return false;
    } else {
        username.style.border = '1px solid green';
        username.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validateEmail() {
    const email = document.getElementById('email');
    const re = /^[A-Za-z]([A-Za-z0-9_\-\.]+)@([A-Za-z0-9_\-\.]+)\.([A-Za-z]{2,5})$/;

    if (!re.test(email.value)) {
        email.style.border = '1px solid red';
        email.nextElementSibling.style.display = 'block';
        return false;
    } else {
        email.style.border = '1px solid green';
        email.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validatePassword() {
    const password = document.getElementById('password');
    const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,9}$/;

    if (!re.test(password.value)) {
        password.style.border = '1px solid red';
        password.nextElementSibling.style.display = 'block';
        return false;
    } else {
        password.style.border = '1px solid green';
        password.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validateAddUser() {
    if (!validateFirstName() || !validateLastName() || !validateUserName() || !validateEmail() || !validatePassword()) {
        return false;
    }
    else {
        return true;
    }
}

