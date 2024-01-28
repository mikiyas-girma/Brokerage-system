
const postTitle = document.querySelector('input[name="post_title"]');
const postImage = document.querySelector('input[name="photos[]"]');
const postTags = document.querySelector('input[name="post_tags"]');
const postContent = document.querySelector('textarea[name="post_content"]');


postTitle.addEventListener('blur', validatePostTitle);
postTags.addEventListener('blur', validatePostTags);
postContent.addEventListener('blur', validatePostContent);


function validateForm() {
    // Get the file input element
    var fileInput = document.querySelector('input[name="photos[]"]');

    // Check if at least one file is selected
    if (!(validatePostTitle()) || !(validatePostTags()) || !(validatePostContent()) || fileInput.files.length < 1) {
        if (fileInput.files.length < 1) {
            console.log("fileInput.files.length", fileInput.files.length)
            postImage.classList.add('is-invalid');
            postImage.focus(); // Set focus to the element
            return false; // Prevent form submission

        }
        else {
            postImage.classList.remove('is-invalid');
            postImage.style.borderColor = 'green';
        }
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

function validatePostTitle() {
    const re = /^(([A-Za-z]{3,})+)([\s\S]*)$/;

    if (!re.test(postTitle.value)) {
        postTitle.classList.add('is-invalid');
        postTitle.focus(); // Set focus to the element
        return false;

    } else {
        postTitle.classList.remove('is-invalid');
        postTitle.style.borderColor = 'green';
        return true;
    }
}

function validatePostTags() {
    const re = /^([\s\S]{3,})$/;

    if (!re.test(postTags.value)) {
        postTags.classList.add('is-invalid');
        postTags.focus(); // Set focus to the element
        return false;

    } else {
        postTags.classList.remove('is-invalid');
        postTags.style.borderColor = 'green';
        return true;
    }
}

function validatePostContent() {
    const content = postContent.value.trim();
    const words = content.split(' ');

    if (words.length < 5) {
        postContent.classList.add('is-invalid');
        postContent.focus(); // Set focus to the element
        return false;
    } else {
        postContent.classList.remove('is-invalid');
        postContent.style.borderColor = 'green';
        return true;
    }
}

