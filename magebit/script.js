const email = document.getElementById("email")
const inputForm = document.getElementById("input-form")

inputForm.addEventListener('submit',(e) => {
    if(!emailValidation()){
        e.preventDefault();
    }
    emailValidation();
});

function emailValidation(){
    const emailAdd = email.value.trim();
    if(emailAdd === ""){
        setError(email, 'Email address is required');
        return false;
    }else if(!isEmail(emailAdd)){
        setError(email, 'Please provide a valid e-mail address');
        return false;
    }else if(!document.getElementById("checkbox").checked){
        setError(email, 'You must accept the terms and conditions');
        return false;
    }else if(emailAdd.substr(emailAdd.length - 3, emailAdd.length - 1) == '.co' && emailAdd.substr(emailAdd.length - 4, emailAdd.length - 1) != '.com'){
        setError(email, 'We are not accepting subscriptions from Colombia emails');
        return false;
    }else{
        setSuccess(email);
        return true;
    }
}

function setError(input, message){
    const inputForm = input.parentElement;
    const small = inputForm.querySelector('small');
    small.innerText = message;
    inputForm.className = 'input-form error';
} 
function setSuccess(input){
    const inputForm = input.parentElement;
    inputForm.className = 'input-form';
}

function checked(){
    if(!checkbox.checked){
        return false;
    }else{
        return true;
    }
}

function isEmail(email){
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(String(email).toLowerCase());
}