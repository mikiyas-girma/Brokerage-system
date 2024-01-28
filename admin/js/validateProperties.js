
const postTitle = document.querySelector('input[name="post_title"]');
// const postUser = document.querySelector('select[name="post_user"]');
// const postStatus = document.querySelector('select[name="post_status"]');
const postImage = document.querySelector('input[name="photos[]"]');
const postTags = document.querySelector('input[name="post_tags"]');
const postContent = document.querySelector('textarea[name="post_content"]');


postTitle.addEventListener('blur', validatePostTitle);

function validateForm() {
    // Get the file input element
    var fileInput = document.querySelector('input[name="photos[]"]');

    // Check if at least one file is selected
    if (validatePostTitle() || fileInput.files.length === 0) {
        postImage.classList.add('is-invalid');
        alert("Please select at least one image.");

        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

function validatePostTitle() {
    const re = /^[a-zA-Z]{2,10}$/;

    if (!re.test(postTitle.value)) {
        postTitle.classList.add('is-invalid');
        return false;

    } else {
        postTitle.classList.remove('is-invalid');
        return true;
    }
}




































document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        var postTitle = document.querySelector('input[name="post_title"]');
        var postUser = document.querySelector('select[name="post_user"]');
        var postStatus = document.querySelector('select[name="post_status"]');
        var postImage = document.querySelector('input[name="photos[]"]');
        var postTags = document.querySelector('input[name="post_tags"]');
        var postContent = document.querySelector('textarea[name="post_content"]');

        var errorMessages = [];

        if (postTitle.value.trim() === '') {
            errorMessages.push('Please enter a post title.');
        }

        if (postUser.value.trim() === '') {
            errorMessages.push('Please select a user.');
        }

        if (postStatus.value.trim() === '') {
            errorMessages.push('Please select a post status.');
        }

        if (postImage.files.length === 0) {
            errorMessages.push('Please select at least one image.');
        }

        if (postTags.value.trim() === '') {
            errorMessages.push('Please enter post tags.');
        }

        if (postContent.value.trim() === '') {
            errorMessages.push('Please enter post content.');
        }

        if (errorMessages.length > 0) {
            var errorElement = document.createElement('div');
            errorElement.classList.add('alert', 'alert-danger');
            errorElement.innerHTML = '<ul>' + errorMessages.map(function (message) {
                return '<li>' + message + '</li>';
            }).join('') + '</ul>';

            var formGroup = document.querySelector('.form-group');
            formGroup.insertBefore(errorElement, form);

            // return;
        }

        form.submit();
    });
});