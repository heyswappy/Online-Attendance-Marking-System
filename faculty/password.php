<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

include "loadDynamic.php";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$create = "select pass from faculty where id=".$_SESSION["id"].";";

$result = mysqli_query($conn,$create);

$result = mysqli_fetch_array($result);

if($result[0]==$_POST["old"]){
	$create = "update faculty set pass=\"".$_POST["new"]."\" where id=".$_SESSION["id"].";";
	$result = mysqli_query($conn,$create);
}
else{
	exit();
}

mysqli_close($conn);
?>