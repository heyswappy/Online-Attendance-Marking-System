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

$getSubInd = "select * from classfac where batch = \"".$_POST["hidBatch"]."\";";

$getSubInd = strtoupper($getSubInd);

$result = mysqli_query($conn, $getSubInd);

$t = mysqli_fetch_array($result,MYSQLI_NUM);

$cid = 0;

for($i=1;$i<10;$i++){
	if($t[$i]==0){
			break;
	}
	else if($t[$i]==$facId){
		$cid = $i;
	}
	else{
		continue;
	}
}

$getSubInd = "select * from  classsub where batch = \"".$_POST["hidBatch"]."\";";

$getSubInd = strtoupper($getSubInd);

$result = mysqli_query($conn, $getSubInd);

$t = mysqli_fetch_array($result,MYSQLI_NUM);

$cid = $t[$cid];

$selectRoll =  "select sid from attendance where log = \"".$_POST["hidDate"]."\" and fid = ".$facId." and sid in (select id from student where batch = \"".$_POST["hidBatch"]."\" );";

$selectRoll = strtoupper($selectRoll);

$result = mysqli_query($conn, $selectRoll);

while($row = mysqli_fetch_array($result)){
	$q = "update attendance".
	" set stat = ".$_POST[$row[0]].
	" where log = \"".$_POST["hidDate"]."\"".
	" and fid = ".$facId.
	" and sid = ".$row[0].
	" and cid = ".$cid.";";

	$t = mysqli_query($conn, $q);
}

echo "<div class=\"heading small\" style=\"padding-top: 100px; color: #36413E !important;\">ATTENDANCE UPDATED</div>"
?>