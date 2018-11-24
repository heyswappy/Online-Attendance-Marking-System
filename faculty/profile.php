<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "loadDynamic.php";

$facId = $_SESSION["id"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

echo "<div style=\"color: #36413E; font-weight: bold; font-size:40px; padding-top: 100px;\">PROFILE<br>".
$_SESSION["name"]." (".$_SESSION["id"].")".
"</div>";

$getSub = "select * from classfac;";

$getSub = strtoupper($getSub);

$result =  mysqli_query($conn, $getSub);

echo"<table class=\"craftyTable heading\" style=\"font-size: 30px; color: #36413E; font-weight: bold; border-color: #36413E;\">";

echo"<tr><td align=\"center\" class=\"craftyCell\" style=\"border-color: #36413E;\"width=\"50%\">"."SUBJECT".
"</td><td align=\"center\" class=\"craftyCell\" style=\"border-color: #36413E; width=\"50%\">"."BATCH"."</td></tr>";

while($teach=mysqli_fetch_array($result)){
	for($i=1; $i<10; $i++){
		if($teach[$i]==0){
			break;
		}
		else if($teach[$i]==$facId){
			$sub = "select * from classsub where batch=\"".$teach[0]."\";";
			$sub = mysqli_query($conn, strtoupper($sub));
			$sub = (mysqli_fetch_array($sub))[$i];
			$subName = "select * from course where code=".$sub.";";
			$subName = mysqli_query($conn, strtoupper($subName));
			$subName = mysqli_fetch_array($subName);
			echo"<tr><td align=\"center\" class=\"craftyCell\" style=\"border-color: #36413E;\"width=\"50%\">".$subName["name"]."(".$sub.")".
			"</td><td align=\"center\" class=\"craftyCell\" style=\"border-color: #36413E; width=\"50%\">".$teach[0]."</td></tr>";
		}
	}
}
echo"</table>";

mysqli_close($conn);
//echo "FINISHED";
?>