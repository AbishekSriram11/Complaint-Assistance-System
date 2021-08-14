
function calEff(res,reg){
    if(res==reg){
        return 100;
    }
    else{
        return Math.ceil(res*100/reg);
    }
}
$(document).ready(function(){
    $.ajax({
        url: 'actionStats.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            
            document.getElementById("countReg").textContent=response.total.reg
            document.getElementById("countRes").textContent=response.total.res
            var cleaning=calEff(response.cleaning.res,response.cleaning.reg)
            var electricity=calEff(response.electricity.res,response.electricity.reg)
            var wifi=calEff(response.wifi.res,response.wifi.reg)
            var washroom=calEff(response.washroom.res,response.washroom.reg)
            var mess=calEff(response.mess.res,response.mess.reg)
            var architecture=calEff(response.architecture.res,response.architecture.reg)
            var others=calEff(response.others.res,response.others.reg)
            document.getElementById("cleaning").style.width=cleaning+"%"
            document.getElementById("electricity").style.width=electricity+"%"
            document.getElementById("wifi").style.width=wifi+"%"
            document.getElementById("washroom").style.width=washroom+"%"
            document.getElementById("mess").style.width=mess+"%"
            document.getElementById("architecture").style.width=architecture+"%"
            document.getElementById("others").style.width=others+"%"
            google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartReg);
google.charts.setOnLoadCallback(drawChartRes);

function drawChartReg() {
  var data = google.visualization.arrayToDataTable([
    ['Type', 'Registed Complaints'],
    ['Cleaning',     parseInt(response.cleaning.reg)],
    ['Electricity',      parseInt(response.electricity.reg)],
    ['Wifi',  parseInt(response.wifi.reg)],
    ['Washroom', parseInt(response.washroom.reg)],
    ['Mess',    parseInt(response.mess.reg)],
    ['Architecture',    parseInt(response.architecture.reg)],
    ['Others',    parseInt(response.others.reg)]
    
  ]);
  console.log(response.cleaning.reg)
  var options = {
    title: 'Total Registered Complaints'
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechartReg'));
  chart.draw(data, options);
}

function drawChartRes() {
    var data = google.visualization.arrayToDataTable([
      ['Type', 'Resolved Complaints'],
      ['Cleaning',     parseInt(response.cleaning.res)],
      ['Electricity',      parseInt(response.electricity.res)],
      ['Wifi',  parseInt(response.wifi.res)],
      ['Washroom', parseInt(response.washroom.res)],
      ['Mess',    parseInt(response.mess.res)],
      ['Architecture',    parseInt(response.architecture.res)],
      ['Others',    parseInt(response.others.res)]
    ]);
    var options = {
      title: 'Total Resolved Complaints'
    };
    var chart = new google.visualization.PieChart(document.getElementById('piechartRes'));
    chart.draw(data, options);
  }
        }
    });
});
