const postTitle = document.querySelector('input[name="post_title"]');
const postImage = document.querySelector('input[name="photos[]"]');
const postTags = document.querySelector('input[name="post_tags"]');
const postContent = document.querySelector('textarea[name="post_content"]');


postTitle.addEventListener('blur', validatePostTitle);
postImage.addEventListener('blur', validateForm);
postTags.addEventListener('blur', validatePostTags);
postContent.addEventListener('blur', validatePostContent);


function validateForm() {
    // Get the file input element
    var fileInput = document.querySelector('input[name="photos[]"]');

    // Check if at least one file is selected
    if (!(validatePostTitle()) || !(validatePostTags()) || !(validatePostContent()) || fileInput.files.length < 1) {
        if (fileInput.files.length < 1) {
            postImage.style.border = '1px solid red';
            // next sibling display block
            postImage.nextElementSibling.style.display = 'block';
            postImage.focus(); // Set focus to the element
            return false; // Prevent form submission

        }
        else {
            postImage.style.border = '1px solid green';
            postImage.nextElementSibling.style.display = 'none';
        }
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

function validatePostTitle() {
    const re = /^(([A-Za-z]{3,})+)([\s\S]*)$/;

    if (!re.test(postTitle.value)) {
        postTitle.style.border = '1px solid red';
        postTitle.nextElementSibling.style.display = 'block';
        postTitle.focus(); // Set focus to the element
        return false;

    } else {
        postTitle.style.border = '1px solid green';
        postTitle.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validatePostTags() {
    const re = /^([\s\S]{3,})$/;

    if (!re.test(postTags.value)) {
        postTags.style.border = '1px solid red';
        postTags.nextElementSibling.style.display = 'block';
        postTags.focus(); // Set focus to the element
        return false;

    } else {
        postTags.style.border = '1px solid green';
        postTags.nextElementSibling.style.display = 'none';
        return true;
    }
}

function validatePostContent() {
    const content = postContent.value.trim();
    const words = content.split(' ');

    if (words.length < 5) {
        postContent.style.border = '1px solid red';
        postContent.nextElementSibling.style.display = 'block';
        postContent.focus(); // Set focus to the element
        return false;
    } else {
        postContent.style.border = '1px solid green';
        postContent.nextElementSibling.style.display = 'none';
        return true;
    }
}
