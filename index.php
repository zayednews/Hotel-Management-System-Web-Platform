<?php
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result= $mysqli->query("SELECT * FROM hotel ORDER BY id ");


session_start();
$signal="oka";
//$un="";
//$signal=$_SESSION["flag"];
//$un=$_SESSION["fla"];
if($signal=="oka" ||$signal=="okt"){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
</head>

<script>
function showHint() {
  var strI=document.getElementById('mytext').value;
  var str = strI.toString();
	//document.getElementById("spinner").style.visibility= "visible";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);
			msg="";
			//msgC="";
			for(i=0;i<resp.length;i++){
				msg=msg+"Name: "+resp[i].name+" Address: "+resp[i].address+"<br>";
				//msgC=msgC+resp[i].cgpa+"<br>";
			}
			document.getElementById("txtHint").innerHTML = msg;
			//document.getElementById("spinner").style.visibility= "hidden";
		}
	};
	var url="hotelChk.php?signal=readData&id="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
} 
</script>

<body>

	<form>
<input type="text" id="mytext" onkeyup="showHint()">
<span id="txtHint"></span>
  
  </select>
</form>
<br>

	
	<a  href="login.php" ><p align="right">Login</p></a>
	<h3 align="center">Hotel Information</h3>
	<p></p>
	<table width="80%" border="0" align="center">
		<tr bgcolor="#cccccc">
			<th>SL</th>
			<th>Hotel Name</th>
			<th>Star</th>
			<th>Address</th>
			<th>Facility</th>
			<th>Room</th>
		</tr>
		<?php
			while($res=$result->fetch_object())
			{
				echo "<tr>";
				echo "<td>".$res->id."</td>";
				echo "<td>".$res->name."</td>";
				echo "<td>".$res->star."</td>";
				echo "<td>".$res->address."</td>";
				echo "<td>";
				$fac=explode(',', $res->facility);
				echo "<ul>";
				foreach ($fac as $k) {
				echo "<li>".$k. "</li>";
				}	
				echo "</ul>";
				echo "</td>";
				//echo "<td>".$res->facility."</td>";
				echo "<td>".$res->room."</td>";

			}

		?>
		
	</table>
	


</body>
</html>
<?php
}
else{
	header("www.google.com");
}
?>