<!DOCTYPE html>
<html>
<head>
	<title>Sarthi</title>
	<link rel="icon" href="icon.png" type="image/x-icon"> 
<script type="text/javascript">
function findtrain()
{
var changedata="";
var trainname=document.getElementById('train').value;
var data = JSON.stringify({
	"search": ""+trainname
});
var xhr = new XMLHttpRequest();
xhr.withCredentials = true;
xhr.addEventListener("readystatechange", function () {
	if (this.readyState === this.DONE) {
		changedata=JSON.parse(this.responseText);
		console.log(changedata);
		console.log();
		var i;
var finaldata="";
for(i=0;;i++)
{
	if(changedata[i]==undefined)
	{
		break;
	}
	var y=changedata[i];
	var x=y.data;
	var trainno=y.train_num;
	var name=y.name;
	var days=x.days;
	var froms=y.train_from;
	var depr=x.departTime;
	var to=y.train_to;
	var arival=x.arriveTime;

	finaldata=finaldata+"<tr> <td id='sn'> "+(i+1)+"</td> <td id='tn'> "+trainno+"</td> <td id='tname'>"+name+" </td> <td id='days'> <table width='100%' border='2' id='inner'> <tr> <td>"+days.Mon+"</td> <td>"+days.Tue+"</td> <td>"+days.Wed+"</td> <td>"+days.Thu+"</td> <td>"+days.Fri+"</td> <td>"+days.Sat+"</td> <td>"+days.Sun+"</td> </tr> </table> </td> <td id='from'> "+froms+" </td> <td id='Dep'> "+depr+"  </td> <td id='to'> "+to+"  </td> <td id='ariv'> "+arival+" </td>  </tr>";
}
document.getElementById('trainallset').innerHTML=finaldata;
var y=document.getElementById('trainallset').innerHTML;
if(y=='')
{
	document.getElementById('trainallset').innerHTML="<tr><td colspan=8><h1 style='color: darkblue; font-size: 60px'><center>No Train Found</center></h1></td></tr>"
}
}
});
xhr.open("POST", "https://trains.p.rapidapi.com/");
xhr.setRequestHeader("x-rapidapi-host", "trains.p.rapidapi.com");
xhr.setRequestHeader("x-rapidapi-key", "4cf82eef84msh2a295f3617c47a8p13e65fjsn168c6e5518cc");
xhr.setRequestHeader("content-type", "application/json");
xhr.setRequestHeader("accept", "application/json");
xhr.send(data);
}
</script>
</head>
<style type="text/css">
	body{
		margin:0;
		background-color: lightblue;
	}
	#data{
		width: 94%;
		height: 100%;
		background-color: #f4edff;
		border: 2px solid black;
		margin-left: 2%;
		margin-top: 4vh;
		border-radius: 20px;
	}
	#traindata
	{
		height: 100%;
		width: 90%;
		border:3px solid darkblue;
		font-size: 20px;
		margin-left: 5%;
	}
	#sn
	{
		width: 2%;
		text-align: center;
	}
	#tn
	{
		width: 10%;
	}
	#tname
	{
		width: 30%;
	}
	#days
	{
		width: 30%;
		/*background-color: darkblue;*/
	}
	#from
	{
		width: 5%;
	}
	#Dep
	{
		width: 10%;
	}
	#to
	{
		width: 5%;
	}
	#ariv
	{
		width: 10%;
	}
	#train{
		width: 50%;
		height: 40px;
		font-size: 40px;
	}
	#findbut{
		height: 51px;
		font-size: 40px;
	}
	#inner{
		background-color: white;
	}
	@media(max-width: 1000px)
	{
		#traindata{
			font-size: 30px;
			margin-left: 0%;
			width: 100%;
		}
	}
</style>
<body>
	<h1 style="color: darkblue; font-size: 60px"><center>Train Enquiry System</center></h1>
	<div class="main" id="data"><br>
		<input type="text" placeholder="Train name/ City name" id="train" name="" style="margin-left: 5%;"><input type="button" value="Search" name="" onclick="findtrain()" id="findbut"><br><br>
		<table id="traindata" border="1">
			<thead style="font-weight: bold;">
				<tr>
					<td id="sn">
						S.NO
					</td>
					<td id="tn" style="text-align: center;">
						Train<br>No
					</td>
					<td id="tname" style="text-align: center;">
						Train Name
					</td>
					<td id="days" style="text-align: center;">
						
						<table width="100%" border="2" id="inner" >
						<tr>
						<td>M</td>
						<td>Tu</td>
						<td>W</td>
						<td>Th</td>
						<td>F</td>
						<td>Sa</td>
						<td>Su</td>
						</tr>
						</table>
					
					</td>
					<td id="from" style="text-align: center;">
						From
					</td>
					<td id="Dep" style="text-align: center;">
						Dept
					</td>
					<td id="to" style="text-align: center;">
						To
					</td>
					<td id="ariv" style="text-align: center;">
						Arrival
					</td>
				</tr>
			</thead>
			<tbody id="trainallset">
				
			</tbody>
		</table>
		<br><br><br>
	</div>

</body>
</html>