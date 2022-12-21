const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const passwordConfirmation = document.getElementById("password_confirmation");

username.addEventListener("keyup",() => {
    checkUsername();
});

email.addEventListener("keyup",() => {
    checkEmail();
});

password.addEventListener("keyup",() => {
    checkPassword();
});

passwordConfirmation.addEventListener("keyup",() => {
    checkPasswordConfirmation();
});


function checkUsername() {
    const usernameValue = username.value.trim();
    if(usernameValue.length < 3) {
        setErrorFor(username, "Username must be min 3 symbols");
    } 
     else {
        setSuccessFor(username);
    }

}

function checkEmail() {
    const emailValue = email.value.trim();
    if(!isEmail(emailValue)) {
        setErrorFor(email,"Email is not valid");
    } else {
        setSuccessFor(email);
    }
}

function checkPassword() {
    const passwordValue = password.value.trim();
    console.log(passwordValue);
    if(passwordValue.length < 3) {
        setErrorFor(password,"Password must be min 3 symbols");
    } else {
        setSuccessFor(password);
    }
}

function checkPasswordConfirmation() {
    const passwordConfirmationValue = passwordConfirmation.value.trim()
    if(passwordConfirmationValue.length < 3) {
        setErrorFor(passwordConfirmation,"Password must be min 3 symbols");
    } else {
        setSuccessFor(passwordConfirmation);
    }
}




function setErrorFor(input,message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector("small");
    small.innerText = message;
    formControl.classList.remove("success");
    formControl.classList.add("error");
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.classList.remove("error");
    formControl.classList.add("success");
}


function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}