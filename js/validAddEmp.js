function validatename(){
    const regName =new RegExp("^[a-zA-Z]+ [a-zA-Z]+$");
    if(regName.test(document.getElementById("fname").value)==false){
        alert("Invalid Name\nName should contain only Alphabets and Whitespace");
        document.getElementById("fname").value="";
    }
}
function validatepaswd(){
    var paswd=document.getElementById("paswd").value;
    var paswd1=document.getElementById("paswd1").value;
    if(paswd1.length<7 || !(paswd1===paswd)){
        alert("Invalid Passwords");
        document.getElementById("paswd").value="";
        document.getElementById("paswd1").value="";
    }
}
function validateuname(){
    const uname=new RegExp("^emp[0-9]{4}$");
    if(!uname.test(document.getElementById("uname").value)){
        alert("Invalid UserName");
        document.getElementById("uname").value="";
    }
}
document.getElementById("paswd1").addEventListener("change",validatepaswd);
document.getElementById("uname").addEventListener("change",validateuname);
document.getElementById("fname").addEventListener("change",validatename);