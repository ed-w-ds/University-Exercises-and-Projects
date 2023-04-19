window.onload=function(){
   
  
const form = document.querySelector('form');
const submit = document.getElementById('submit-button');
const message = document.getElementById("message");

function verifyPassword(e) {  
  e.preventDefault();  
  var pw = document.getElementsByName("Password")[0].value;
  var cpw = document.getElementsByName("Password_Confirmation")[0].value;    
  
  if(pw == "" || cpw == "") {
    message.textContent = "Fill in the Password and/or Password Confirmation box";
    return false;  
  }  
   
  if(pw.length < 8) {  
     message.textContent = "**Password length must be at least 8 characters";  
     return false;  
  }  
  
  //maximum length of password validation  
  if(pw.length > 15) {  
     message.textContent = "**Password length must not exceed 15 characters";  
     return false;  
  }

  if (pw != cpw) {
    message.textContent = "The passwords don't match. Try again."
    return false;
  }
  else {
    form.submit();
  }
}  

form.addEventListener('submit', verifyPassword);
}
