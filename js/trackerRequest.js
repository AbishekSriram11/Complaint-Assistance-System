function validateRegno(){
    const re=new RegExp("^[0-9]{2}[A-Z]{3}[0-9]{4}$")
    if(re.test(document.getElementById("regNo").value.trim().toUpperCase())){
        return true
    }
    else{
        alert("You have entered a invalid Registration Number")
        document.getElementById("regNo").value=""
        return false
    }
}

function complaintRetrieve(){
    if(document.getElementById("regNo").value==""){
        alert("Enter Registration number");
        return ;
    }
    else if(validateRegno()){
        if(document.getElementById("compdis").innerHTML!=""){
            document.getElementById("compdis").innerHTML="";
        }
        var xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                document.getElementById("compdis").innerHTML=this.responseText;
            }
        };
        xhttp.open("GET","trackercomp.php?regno="+document.getElementById("regNo").value,true);
        xhttp.send();
    }
}
document.getElementById("regNo").addEventListener("change",validateRegno)
document.getElementById("submit").addEventListener("click",complaintRetrieve)
