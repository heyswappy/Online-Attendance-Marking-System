<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "loadDynamic.php";

$userName = $_SESSION["id"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

echo "<div class=\"heading\" style=\"font-size:40px; margin-top: 50px;\">PROFILE</div><br>".
"<div class=\"heading small\">".$_SESSION["name"]." (".$_SESSION["id"].")"."    ".$_SESSION["batch"].
"</div>";

$getSub = "select * from classsub where batch like \"".$_SESSION["batch"]."\";";
$getFac = "select * from classfac where batch like \"".$_SESSION["batch"]."\";";
$getSub = strtoupper($getSub);
$getFac = strtoupper($getFac);

$getSub =  mysqli_query($conn, $getSub);
$getFac =  mysqli_query($conn, $getFac);

$sub = mysqli_fetch_array($getSub);
$teach =  mysqli_fetch_array($getFac);

echo"<table class=\"craftyTable heading\" style=\"font-size: 30px; font-weight: bold;\">";

echo"<tr><td align=\"center\" class=\"craftyCell\" style=\"border-width: 3px;\" width=\"50%\">"."SUBJECT NAME".
		"</td><td align=\"center\" class=\"craftyCell\" style=\"border-width: 3px;\" width=\"50%\">"."FACULTY NAME"."</td></tr>";

for($i=1; $i<10; $i++){
	if($sub[$i]!=0){
		$fac = "select name from faculty where id=".$teach[$i].";";
		$name = "select name from course where code=".$sub[$i].";";
		$tName = mysqli_fetch_array(mysqli_query($conn, $fac))[0];
		$subName = mysqli_fetch_array(mysqli_query($conn, $name))[0];
		echo"<tr><td align=\"center\" class=\"craftyCell\" width=\"50%\">".$subName."(".$sub[$i].")".
		"</td><td align=\"center\" class=\"craftyCell\" width=\"50%\">".$tName."(".$teach[$i].")"."</td></tr>";
	}
}

echo"</table>";

mysqli_close($conn);
//echo "FINISHED";
?>