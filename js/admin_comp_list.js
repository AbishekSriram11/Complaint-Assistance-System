function complaintRetrieve(){
        var xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                document.getElementById("arena").innerHTML=this.responseText;
            }
        };
        xhttp.open("GET","trackercompA.php",true);
        xhttp.send();
}
document.getElementById("mngComp").addEventListener("click",complaintRetrieve)
window.onload=function(){
    complaintRetrieve();
}

function empAssign(id){
    var xttp=new XMLHttpRequest();
        xttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            if(this.responseText=="0"){
                window.location="dashboard.php"
            }
            else{
                console.log("Error in updating status");
            }    
        }
    };
    xttp.open("POST","admin_Assign.php",true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var emp_id=document.getElementById(id).value;
    var query="id=";
    query=query.concat(id);
    query=query.concat("&uid=");
    query=query.concat(emp_id);
    console.log(query);
    xttp.send(query);
}