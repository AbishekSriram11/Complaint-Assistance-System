function ValidateEmail() 
{ var re=new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$")
 if (re.test(document.getElementById("Email").value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    document.getElementById("Email").value=""
    return (false)
}

function validateName(){
    const re=new RegExp("^[A-Za-z ]{1,}$")
    if(re.test(document.getElementById("Name").value)){
        return true
    }
    else{
        alert("You have entered and invalid name")
        document.getElementById("Name").value=""
        return false
    }
}

function validateRegno(){
    const re=new RegExp("^[0-9]{2}[A-Z]{3}[0-9]{4}$")
    if(re.test(document.getElementById("Regno").value.trim().toUpperCase())){
        return true
    }
    else{
        alert("You have entered a invalid Registration Number")
        document.getElementById("Regno").value=""
        return false
    }
}

document.regForm.Email.addEventListener("change",ValidateEmail);
document.regForm.Name.addEventListener("change",validateName);
document.regForm.Regno.addEventListener("change",validateRegno)
