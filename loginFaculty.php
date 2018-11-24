<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION["id"] = $_POST["id"];

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

include"loginFaculty.html";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$selectUser = "select * from faculty where id=\"".$_POST["id"]."\";";

$result = mysqli_query($conn, $selectUser);

if(!$result){
	echo"<script>".
	"document.getElementById(\"lname\").style=\"color: C03221;\";".
	"document.getElementById(\"lpass\").style=\"color: C03221;\";".
	"document.getElementById(\"id\").style=\"background-color: C03221; color: #F1FFFA;\";".
	"document.getElementById(\"pass\").style=\"background-color: C03221; color: #F1FFFA;\";".
	"document.getElementById(\"lpass\").innerHTML=\"Check Password\";".
	"document.getElementById(\"lname\").innerHTML=\"Check Roll Number\";".
	"</script>";
	exit();
}

$data = mysqli_fetch_assoc($result);

$_SESSION["name"] = $data["name"];

if( $data["pass"] === $_POST["pass"] ){
	
	$t = "faculty\loadDynamic.php";

	header("Location: ".$t);

	exit();
} 
else{
	echo"<script>".
	"document.getElementById(\"lname\").style=\"color: C03221;\";".
	"document.getElementById(\"lpass\").style=\"color: C03221;\";".
	"document.getElementById(\"id\").style=\"background-color: C03221; color: #F1FFFA;\";".
	"document.getElementById(\"pass\").style=\"background-color: C03221; color: #F1FFFA;\";".
	"document.getElementById(\"lpass\").innerHTML=\"Check Password\";".
	"document.getElementById(\"lname\").innerHTML=\"Check Roll Number\";".
	"</script>";
	exit();
}

mysqli_close($conn);
?>