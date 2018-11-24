<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

include "addAdministrator.html";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$create = "insert into administrator values(".$_POST["id"].",\"".$_POST["name"]."\",\"default\");" ;

$create = strtoupper($create);

$result = mysqli_query($conn,$create);

if($result){
	echo"
	<script>alert(\"ADMINISTRATOR ADDED\")</script>
	";
}
else{
	echo"
	<script>alert(\"ADMINISTRATOR ADD UNSUCCESSFUL\")</script>
	";
}

mysqli_close($conn);
?>