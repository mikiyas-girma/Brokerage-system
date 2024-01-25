// event listeners for blur
document.getElementById('firstname').addEventListener('blur', validateFirstName);
document.getElementById('lastname').addEventListener('blur', validateLastName);
document.getElementById('username').addEventListener('blur', validateUserName);
document.getElementById('email').addEventListener('blur', validateEmail);
document.getElementById('password').addEventListener('blur', validatePassword);
const usernameInput = document.querySelector('#register-form input[name="username"]');
const passwordInput = document.querySelector('#register-form input[name="password"]');
usernameInput.addEventListener('blur', validateUserName);
passwordInput.addEventListener('blur', validatePassword);


// event listeners on registration form
function validateFirstName() {
    const firstname = document.getElementById('firstname');

    if (firstname.value === "") {
        console.log("first Name field is empty")
        firstname.classList.add('is-invalid');
        setTimeout(() => {
            firstname.classList.remove('is-invalid');
        }, 3000); // Remove 'is-invalid' class after 3 seconds
    }
    else {
        firstname.classList.remove('is-invalid');
    }
}

function validateLastName() {

    const lastname = document.getElementById('lastname');

    if (lastname.value === "") {
        console.log("last name field is empty")
        lastname.classList.add('is-invalid');
        setTimeout(() => {
            lastname.classList.remove('is-invalid');
        }, 3000); // Remove 'is-invalid' class after 3 seconds
    }
    else {
        lastname.classList.remove('is-invalid');
    }


}
function validateUserName() {
    const username = document.getElementById('username');
    const re = /^[a-zA-Z0-9]{4,10}$/;
    if (!re.test(username.value)) {

        username.classList.add('is-invalid');
        setTimeout(() => {
            username.classList.remove('is-invalid');
        }, 3000);
    } else {
        username.classList.remove('is-invalid');
    }

    if (!re.test(usernameInput.value)) {

        usernameInput.classList.add('is-invalid');
        setTimeout(() => {
            usernameInput.classList.remove('is-invalid');
        }, 2000);
    } else {
        usernameInput.classList.remove('is-invalid');
    }
}

function validatePassword() {
    const password = document.getElementById('password');
    const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,9}$/;
    if (password.value === "") {
        password.classList.add('is-invalid');
        setTimeout(() => {
            password.classList.remove('is-invalid');
        }, 2000); // Remove 'is-invalid' class after 2 seconds
    } else {
        password.classList.remove('is-invalid');
        return true;
    }

    if (!re.test(passwordInput.value)) {
        passwordInput.classList.add('is-invalid');
        setTimeout(() => {
            passwordInput.classList.remove('is-invalid');
        }, 3000);
    } else {
        passwordInput.classList.remove('is-invalid');
    }
}

function validateEmail() {
    const email = document.getElementById('email');
    const re = /^[A-Za-z]([A-Za-z0-9_\-\.]+)@([A-Za-z0-9_\-\.]+)\.([A-Za-z]{2,5})$/;
    if (!re.test(email.value)) {
        email.classList.add('is-invalid');
        setTimeout(() => {
            email.classList.remove('is-invalid');
        }, 3000);
    } else {
        email.classList.remove('is-invalid');
    }

}


function validateForm() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    const usernameRE = /^[a-zA-Z0-9]{4,10}$/;
    if (!usernameRE.test(username.value)) {
        console.log("Username or password field is empty", username.value, password.value)
        username.classList.add('is-invalid');
        setTimeout(() => {
            username.classList.remove('is-invalid');
        }, 3000);

        return false; // Prevent form submission
    }
    const passwordRE = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,9}$/;
    if (!passwordRE.test(password.value)) {
        password.classList.add('is-invalid');
        setTimeout(() => {
            password.classList.remove('is-invalid');
        }, 4000);
        // return false; // Prevent form submission
    }
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

}

function validateRegistrationForm() {
    var firstname = document.getElementById("firstname");
    var lastname = document.getElementById("lastname");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var email = document.getElementById("email");

    if (firstname.value.trim() === "" || lastname.value.trim() === "" || email.value.trim() === "") {
        // console.log("Username or password field is empty")
        if (firstname.value.trim() === "") {
            firstname.classList.add('is-invalid');
            // making the next element display to none
            firstname.nextElementSibling.style.display = "none";
        }
        if (lastname.value.trim() === "") {
            lastname.classList.add('is-invalid');
            lastname.nextElementSibling.style.display = "none";
        }
        if (username.value.trim() === "") {
            username.classList.add('is-invalid');
            username.nextElementSibling.style.display = "none";
        }
        if (password.value.trim() === "") {
            password.classList.add('is-invalid');
            password.nextElementSibling.style.display = "none";
        }
        if (email.value.trim() === "") {
            email.classList.add('is-invalid');
            email.nextElementSibling.style.display = "none";
        }
        if (usernameInput.value.trim() === "") {
            usernameInput.classList.add('is-invalid');
            usernameInput.nextElementSibling.style.display = "none";
        }

        // add is-invalid class to password input also if it does not match the regex during registration
        const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,9}$/;
        if (!re.test(passwordInput.value)) {
            passwordInput.classList.add('is-invalid');
            passwordInput.nextElementSibling.style.display = "none";
        }
        return false; // Prevent form submission
    }
}
// after registering reload the page without submitting the form again
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
