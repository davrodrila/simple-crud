function checkPassword(form) {
    password1 = form.pass1.value;
    password2 = form.pass2.value;

    if (password1 !== password2) {
        alert ("Passwords don't match. Please verify and try again.");
        return false;
    } else{
        return true;
    }
}

function checkPasswordOptional(form) {
    password1 = form.pass1.value;
    password2 = form.pass2.value;

    if (password1==='') { //If the first field of the password is not filled, that means the user doesn't want to change the password so we just validate.
        return true;
    } else { //Otherwise, it means user wants to change the password, so we need to check if they are equal.
        if (password1!==password2) {
            return false;
        } else {
            return true;
        }
    }
}
