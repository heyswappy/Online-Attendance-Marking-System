<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

include "addFaculty.html";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$create = "insert into faculty values(".$_POST["id"].",\"".$_POST["name"]."\",\"default\");" ;

$create = strtoupper($create);

$result = mysqli_query($conn,$create);

if($result){
	echo"
	<script>alert(\"FACULTY ADDED\")</script>
	";
}
else{
	echo"
	<script>alert(\"FACULTY ADD UNSUCCESSFUL\")</script>
	";
}

mysqli_close($conn);
?>