// event listeners for blur
document.getElementById('name').addEventListener('blur', validateName);
document.getElementById('password').addEventListener('blur', validatePassword);

function validateName() {
    const name = document.getElementById('name');
    const re = /^[a-zA-Z]{2,10}$/;
    if (!re.test(name.value)) {
        // console.log("Name field is empty")
        name.classList.add('is-invalid');
    } else {
        name.classList.remove('is-invalid');
    }
}

function validatePassword() {
    const password = document.getElementById('password');
    const re = /^[a-zA-Z]{2,10}$/;
    if (password.value === "") {
        // console.log("Password field is empty", password.value)
        password.classList.add('is-invalid');
    } else {
        console.log(password.value.trim())
        password.classList.remove('is-invalid');
    }
}

function validateForm() {
    var username = document.getElementById("name").value;
    var password = document.getElementById("password").value;

    if (username.trim() === "" || password.trim() === "") {
        // console.log("Username or password field is empty")
        return false; // Prevent form submission
    }
    if (password.trim() === "") {
        // Password field is empty
        console.log("Password field is empty")
        return false; // Prevent form submission
    }
}
