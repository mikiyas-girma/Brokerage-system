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
    const re = /^[a-zA-Z]{5,10}$/;
    if (!re.test(username.value)) {

        username.classList.add('is-invalid');
    } else {
        username.classList.remove('is-invalid');
    }

    if (!re.test(usernameInput.value)) {

        usernameInput.classList.add('is-invalid');
    } else {
        usernameInput.classList.remove('is-invalid');
    }
}

function validatePassword() {
    const password = document.getElementById('password');
    const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (password.value === "") {
        // console.log("Passwords field is empty", password.value)
        password.classList.add('is-invalid');
        setTimeout(() => {
            password.classList.remove('is-invalid');
        }, 2000); // Remove 'is-invalid' class after 2 seconds
    } else {
        console.log(password.value.trim())
        password.classList.remove('is-invalid');
    }

    if (!re.test(passwordInput.value)) {
        passwordInput.classList.add('is-invalid');
    } else {
        passwordInput.classList.remove('is-invalid');
    }
}

function validateEmail() {
    const email = document.getElementById('email');
    const re = /^[A-Za-z]([A-Za-z0-9_\-\.]+)@([A-Za-z0-9_\-\.]+)\.([A-Za-z]{2,5})$/;
    if (!re.test(email.value)) {
        email.classList.add('is-invalid');
    } else {
        email.classList.remove('is-invalid');
    }

}



function validateForm() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    if (username.value.trim() === "" || password.value.trim() === "") {
        // console.log("Username or password field is empty")
        if (username.value.trim() === "") {
            username.classList.add('is-invalid');
            setTimeout(() => {
                username.classList.remove('is-invalid');
            }, 3000);
        }
        if (password.value.trim() === "") {
            password.classList.add('is-invalid');
            setTimeout(() => {
                password.classList.remove('is-invalid');
            }, 3000);
        }
        return false; // Prevent form submission
    }
}
