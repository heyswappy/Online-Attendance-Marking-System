<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "loadDynamic.php";

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$batch = $_SESSION["batch"];

$subjects = "select * from classsub where batch = \"".$batch."\" ;"; 

$subjects = strtoupper($subjects);

$result = mysqli_query($conn, $subjects);

$subjects = mysqli_fetch_array($result,MYSQLI_NUM);

echo"<table class=\"craftyTable heading\" style=\"font-size: 30px; font-weight: bold;\">";

echo"<tr><td align=\"center\" class=\"craftyCell\" style=\"border-width: 3px;\" width=\"50%\">"."SUBJECT NAME".
		"</td><td align=\"center\" class=\"craftyCell\" style=\"border-width: 3px;\" width=\"50%\">"."PERCENTAGE"."</td></tr>";

for($i=1;$i<10;$i++){
	if($subjects[$i]==0){
		break;
	}
	else{
		$all = "select count(*) from attendance where cid = \"".$subjects[$i]."\" and sid = ".$_SESSION["id"].";";
		$present = "select count(*) from attendance where cid = \"".$subjects[$i]."\" and sid = ".$_SESSION["id"]." and stat = 1 ;";
		$all = strtoupper($all);
		$present = strtoupper($present);
		$all = mysqli_query($conn, $all);
		$present = mysqli_query($conn, $present);
		$all = mysqli_fetch_array($all)[0];
		$present = mysqli_fetch_array($present)[0];
		if($all>0){
			$per = ($present/$all)*100;
		}
		else{
			$per = 0;
		}
		$sub = mysqli_fetch_array(mysqli_query($conn, "select name from course where code = \"".$subjects[$i]."\";"))[0];
		echo"<tr><td align=\"center\" class=\"craftyCell\" width=\"50%\">".$sub."(".$subjects[$i].")".
		"</td><td align=\"center\" class=\"craftyCell\" width=\"50%\">".$per."%"."</td></tr>";
	}
}
echo"</table>";

mysqli_close($conn);
//echo "FINISHED";
?>