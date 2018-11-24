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

$getSubInd = "select * from  classfac where batch = \"".$_POST["batch"]."\";";

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

$getSubInd = "select * from  classsub where batch = \"".$_POST["batch"]."\";";

$getSubInd = strtoupper($getSubInd);

$result = mysqli_query($conn, $getSubInd);

$t = mysqli_fetch_array($result,MYSQLI_NUM);

$cid = $t[$cid];

$selectUser = "select id from student where batch = \"".$_POST["batch"]."\";";

$selectUser = strtoupper($selectUser);

$result = mysqli_query($conn, $selectUser);

while($row = mysqli_fetch_array($result)){
	//echo $row["id"];
	//echo "<br>";
	$temp = "insert into attendance values( \"".$_POST["date"]."\", ".$row[0].", ".$facId.", ".$cid.", 0);";
	$temp = strtoupper($temp);
	mysqli_query($conn, $temp);
	//echo $temp;
	//echo "<br>";
}

echo "<div class=\"heading small\" style=\"padding-top: 100px; color: #36413E !important;\">ATTENDANCE CREATED</div>";

mysqli_close($conn);
?>