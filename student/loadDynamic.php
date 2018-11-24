<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "attendanceSelect.html";

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

for($i=1;$i<10;$i++){
	if($subjects[$i]==0){
		break;
	}
	else{
		$nested = "select name from course where code = \"".$subjects[$i]."\";";
		$nested = strtoupper($nested);
		$nestedResult = mysqli_query($conn, $nested);
		$name = mysqli_fetch_array($nestedResult)[0];
		echo "<script>".
		"var b = document.getElementById(\"subject\");".
		"var opt = document.createElement(\"option\");".
		"opt.value = \"".$subjects[$i]."\";".
		"opt.innerHTML = \"".$name."\";".
		"b.add(opt);".
		"</script>";
	}
}
?>