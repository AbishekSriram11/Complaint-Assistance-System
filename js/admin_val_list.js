function complaintRetrieve(){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("arena").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET","trackercompV.php",true);
    xhttp.send();
}
document.getElementById("vrfyComp").addEventListener("click",complaintRetrieve)
window.onload=function(){
complaintRetrieve();
}

function valComp(id){
var xttp=new XMLHttpRequest();
    xttp.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
        if(this.responseText=="0"){
            window.location="dashboardV.php"
        }
        else{
            console.log("Error in updating status");
        }    
    }
};
xttp.open("POST","admin_Validate.php",true);
xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
var query="id=";
query=query.concat(id);
console.log(query);
xttp.send(query);
}