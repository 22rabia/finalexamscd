var password = document.getElementById("pass").value;

var email = document.getElementById("username").value;

function execute() {
  if(password.length>0 || email.length>0){
    document.querySelector(".usernotfound").innerHTML = "";
 
  }
}
setTimeout(execute, 3000);

document.getElementById("form").onsubmit=function resetForm(){
  document.getElementById("form").reset();
}

document.getElementById("submit").onclick=function(){
  document.getElementById("pass").input.value="";
}

