
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
    if (!(validatePostTitle()) || fileInput.files.length < 1) {
        if (fileInput.files.length < 1) {
            console.log("fileInput.files.length", fileInput.files.length)
            postImage.classList.add('is-invalid');
            postImage.focus(); // Set focus to the element
            return false; // Prevent form submission

        }
        else {
            console.log("fileInput.files.length", fileInput.files.length)
            postImage.classList.remove('is-invalid');
        }
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

function validatePostTitle() {
    const re = /^(([A-Za-z]{2,})+)([\s\S]*)$/;

    if (!re.test(postTitle.value)) {
        postTitle.classList.add('is-invalid');
        postTitle.focus(); // Set focus to the element
        return false;

    } else {
        postTitle.classList.remove('is-invalid');
        return true;
    }
}

