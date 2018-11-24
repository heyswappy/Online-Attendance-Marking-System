<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

include"addBatch.html";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$create = "insert into batch values(\"".$_POST["batch"]."\");";

$create = strtoupper($create);

//echo $create;

$one = mysqli_query($conn, $create); 

$create = "insert into classsub values(\"".$_POST["batch"]."\"";

for($i=1;$i<10;$i++){
	if($_POST[(string)$i]==""){
		$_POST[(string)$i]="0";
	}
	$create = $create.", \"".$_POST[(string)$i]."\"";
}
$create = $create.");";

$create = strtoupper($create);

//echo $create;

$two = mysqli_query($conn, $create);

$create = "insert into classfac values(\"".$_POST["batch"]."\"";

for($i=10;$i<19;$i++){
	if($_POST[(string)$i]==""){
		$_POST[(string)$i]="0";
	}
	$create = $create.", ".$_POST[(string)$i];
}
$create = $create.");";

$create = strtoupper($create);

//echo $create;

$three = mysqli_query($conn,$create);

if($one && $two && $three){
	echo"
	<script>alert(\"BATCH ADDED\");</script>
	";
}
else{
	echo"
	<script>alert(\"BATCH ADD UNSUCCESSFUL\");</script>
	";
}

mysqli_close($conn);
?>