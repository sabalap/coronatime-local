const username = document.getElementById("username");
const password = document.getElementById("password");


username.addEventListener("keyup",() => {
    checkUsername();
});

password.addEventListener("keyup",() => {
    checkPassword();
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


function checkPassword() {
    const passwordValue = password.value.trim();
    console.log(passwordValue);
    if(passwordValue.length < 3) {
        setErrorFor(password,"Password must be min 3 symbols");
    } else {
        setSuccessFor(password);
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

