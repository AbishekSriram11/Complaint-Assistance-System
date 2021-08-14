function validateuname(){
    const uname=new RegExp("^emp[0-9]{4}$");
    if(!uname.test(document.getElementById("uname").value)){
        alert("Invalid UserName");
        document.getElementById("uname").value="";
    }
    else{
        if(!confirm("Are you sure you want to delete this record")){
            document.getElementById("uname").value="";
        }
    }
}
document.getElementById("uname").addEventListener("change",validateuname);