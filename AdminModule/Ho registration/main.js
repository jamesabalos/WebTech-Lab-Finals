function closeSignUpOpenLogIn(){
   document.getElementById('registration').style.display='none'; 
   document.getElementById('login').style.display='block'; 
   document.getElementById('first_button').style.background="rgba(160, 179, 176, 0.25)"; 
   document.getElementById('second_button').style.background="green"; 

}

function closeLogInOpenSignUp(){
   document.getElementById('registration').style.display='block'; 
   document.getElementById('login').style.display='none'; 
   document.getElementById('second_button').style.background="rgba(160, 179, 176, 0.25)"; 
   document.getElementById('first_button').style.background="green"; 

   



}

