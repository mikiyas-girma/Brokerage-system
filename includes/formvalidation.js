// event listeners for blur
document.getElementById('username').addEventListener('blur', validateUserName);
document.getElementById('password').addEventListener('blur', validatePassword);
document.getElementById('firstname').addEventListener('blur', validateFirstName);

// event listeners on registration form
const firstnameElement = document.getElementById('firstname');
console.log('Element exists:');



function validateUserName() {
    const username = document.getElementById('username');
    const re = /^[a-zA-Z]{2,10}$/;
    if (!re.test(username.value)) {
        // console.log("Name field is empty")
        username.classList.add('is-invalid');
        setTimeout(() => {
            username.classList.remove('is-invalid');
        }, 2000); // Remove 'is-invalid' class after 3 seconds
    } else {
        username.classList.remove('is-invalid');
    }
}

function validatePassword() {
    const password = document.getElementById('password');
    const re = /^[a-zA-Z]{2,10}$/;
    if (password.value === "") {
        // console.log("Password field is empty", password.value)
        password.classList.add('is-invalid');
        setTimeout(() => {
            password.classList.remove('is-invalid');
        }, 2000); // Remove 'is-invalid' class after 3 seconds
    } else {
        console.log(password.value.trim())
        password.classList.remove('is-invalid');
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
