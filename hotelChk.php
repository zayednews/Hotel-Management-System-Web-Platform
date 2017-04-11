<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","test");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
if($_REQUEST["signal"]=="readData"){
	//echo "Zn";
	echo getJSONFromDB("select name,address from hotel where name like '".$_REQUEST["id"]"%'");
	//echo getJSONFromDB("select name,address from hotel where id=".$_REQUEST["id"]);
}
else if($_REQUEST["signal"]=="read"){
	//echo "Naim";
	echo getJSONFromDB("select * from hotel ");
}
else{
	echo "Invalid request";
}
$str="";for($i=0;$i<100000;$i++){$str.="slowing down";}
?>