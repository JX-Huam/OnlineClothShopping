function allLeter(input){
    var letters = /^[A-Za-z\s]+$/;
    if(input.value.match(letters)){
        return true;
    }else{
        return false;
    }
}

function validateEmail(input){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(input.value.match(mailformat)){
        return true;
    }else{
        return false;
    }
}

function allNumber(input){
    var numbers = /^[0-9]+$/;
    if(input.value.match(numbers)){
        return true;
    }else{
        return false;
    }
}

function validate(){
    var nameInput = document.getElementsByName("name")[0];
    var emailInput = document.getElementsByName("email")[0];
    var phoneInput = document.getElementsByName("phoneNumber")[0];
    var addrInput = document.getElementsByName("shippingAddr")[0];
    var cityInput = document.getElementsByName("city")[0];
    var usernameInput = document.getElementsByName("username")[0];
    var passwordInput = document.getElementsByName("password")[0];
    var confirmPasswordInput = document.getElementsByName("confirmPassword")[0];

    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var phoneError = document.getElementById("phoneError");
    var addrError = document.getElementById("addrError");
    var cityError = document.getElementById("cityError");
    var usernameError = document.getElementById("usernameError");
    var passwordError = document.getElementById("passwordError");
    var confirmPasswordError = document.getElementById("confirmPasswordError");

    var isValid = true;

    if (nameInput.value.trim() === '') {
        nameError.style.color = 'red';
        nameError.innerHTML = "Name: (Please fill in this field)";
        isValid = false;
    }else if(!allLeter(nameInput)){
        nameError.style.color = 'red';
        nameError.innerHTML = "Name: (Please input alphabet characters only)";
        isValid = false;
    }else{
        nameError.style.color = 'black';
        nameError.innerHTML = "Name:";
    }

    if (emailInput.value.trim() === '') {
        emailError.style.color = 'red';
        emailError.innerHTML = "Email: (Please fill in this field)";
        isValid = false;
    }else if(!validateEmail(emailInput)){
        emailError.style.color = 'red';
        emailError.innerHTML = "Email: (Incorrect email format)";
        isValid = false;
    }else{
        emailError.style.color = 'black';
        emailError.innerHTML = "Email:";
    }
    
    if (phoneInput.value.trim() === '') {
        phoneError.style.color = 'red';
        phoneError.innerHTML = "Phone Number: (Please fill in this field)";
        isValid = false;
    }else if(!allNumber(phoneInput)){
        phoneError.style.color = 'red';
        phoneError.innerHTML = "Phone Number: (Incorrect phone format)";
        isValid = false;
    }else{
        phoneError.style.color = 'black';
        phoneError.innerHTML = "Phone Number:";
    }

    if (addrInput.value.trim() === '') {
        addrError.style.color = 'red';
        addrError.innerHTML = "Shipping Address: (Please fill in this field)";
        isValid = false;
    }else{
        addrError.style.color = 'black';
        addrError.innerHTML = "Shipping Address:";
    }

    if (cityInput.value.trim() === '') {
        cityError.style.color = 'red';
        cityError.innerHTML = "City: (Please fill in this field)";
        isValid = false;
    }else{
        cityError.style.color = 'black';
        cityError.innerHTML = "City:";
    }

    if (usernameInput.value.trim() === '') {
        usernameError.style.color = 'red';
        usernameError.innerHTML = "User Name: (Please fill in this field)";
        isValid = false;
    }else{
        usernameError.style.color = 'black';
        usernameError.innerHTML = "User Name:";
    }

    if (passwordInput.value.trim() === '') {
        passwordError.style.color = 'red';
        passwordError.innerHTML = "Password: (Please fill in this field)";
        isValid = false;
    }else{
        passwordError.style.color = 'black';
        passwordError.innerHTML = "Password:";
    }

    if (confirmPasswordInput.value.trim() === '') {
        confirmPasswordError.style.color = 'red';
        confirmPasswordError.innerHTML = "Confirm Password: (Please fill in this field)";
        isValid = false;
    }else if(passwordInput.value !== confirmPasswordInput.value){
        confirmPasswordError.style.color = 'red';
        confirmPasswordError.innerHTML = "Confirm Password: (Password is not the same)";
        isValid = false;
    }else{
        confirmPasswordError.style.color = 'black';
        confirmPasswordError.innerHTML = "Confirm Password:";
    }

    return isValid;
}
