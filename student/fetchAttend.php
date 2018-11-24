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

$selectAttendance =  "select * from attendance where sid = ".$_SESSION["id"]." and cid = ".$_POST["subject"]." ;";

$selectAttendance = strtoupper($selectAttendance);

$result = mysqli_query($conn, $selectAttendance);

echo <<<'EOT'

<form name = "attendModify" id = "attendModify" action = "modifyAttend.php" target = "_self" method = "POST">

<table class="craftyTable" style="margin-top:40px;" name="attendTable" align = "center" width = "97%" border = "1" cellspacing = "0">
<tr>
<th class="heading craftyCell">DATE</th>
<th class="heading craftyCell">STUDENT ID</th>
<th class="heading craftyCell">FACULTY ID</th>
<th class="heading craftyCell">COURSE ID</th>
<th class="heading craftyCell">STATUS</th>
</tr>
EOT;

while($row = mysqli_fetch_array($result)){
	//echo "HI";
	echo "<tr style = \"background-color: WHITE\" align = \"center\" id = \"".$row["log"]."\">".
	"<td class=\"craftyCell\">".$row["log"]."</td>".
	"<td class=\"craftyCell\">".$row["sid"]."</td>".
	"<td class=\"craftyCell\">".$row["fid"]."</td>".
	"<td class=\"craftyCell\">".$row["cid"]."</td>";

	if($row["stat"] == "1"){
		echo "<td>PRESENT</td>";
		echo "<script>".
		"var k = document.getElementById(\"".$row["log"]."\");".
		"k.style = \"background-color: #B5F44A\";".
		"</script>";
	}
	else{
		echo "<td>ABSENT</td>";
		echo "<script>".
		"var k = document.getElementById(\"".$row["log"]."\");".
		"k.style = \"background-color: TOMATO\";".
		"</script>";
	}
	echo "</tr>";
}
echo "</table>";

echo "<br></form>";
mysqli_close($conn);
//echo "FINISHED";
?>