function complaintRetrieve(){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("arena").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET","trackercompE.php",true);
    xhttp.send();
}
document.getElementById("rptComp").addEventListener("click",complaintRetrieve)
window.onload=function(){
complaintRetrieve();
}

function reptGen(id){
    var xttp=new XMLHttpRequest();
        xttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            if(this.responseText=="0"){
                window.location="dashboardE.php"
            }
            else{
                console.log("Error in updating status");
            }    
        }
    };
    xttp.open("POST","emp_report.php",true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var emp_report=document.getElementById(id).value;
    var query="id=";
    query=query.concat(id);
    query=query.concat("&report=");
    query=query.concat(emp_report);
    console.log(query);
    xttp.send(query);
}