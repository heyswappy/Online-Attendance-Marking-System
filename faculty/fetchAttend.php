<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// first extract the faculty id

include "loadDynamic.php";

$facId = $_SESSION["id"];

$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance";

$conn = mysqli_connect($host,$user,$pass);

$nr = mysqli_select_db($conn,$db);

$getSubInd = "select * from classfac where batch = \"".$_POST["batch"]."\";";

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

$selectAttendance =  "select * from attendance where log = \"".$_POST["date"]."\" and fid = ".$facId." and cid = ".$cid." and sid in (select id from student where batch = \"".$_POST["batch"]."\" );";

$selectAttendance = strtoupper($selectAttendance);

//echo $selectAttendance;

$result = mysqli_query($conn, $selectAttendance);

echo <<<'EOT'

<form style="positon: relative; padding-top: 100px; z-index: 0;" name = "attendModify" id = "attendModify" action = "modifyAttend.php" target = "_self" method = "POST">

<table class="craftyTable" style="border-color: #36413E; color: #36413E !important;" name="attendTable" align = "center">
<tr style="background-color: rgba(255,255,255,0.5);">
<th class="craftyCell" style="border-color: #36413E; border-weight: 3px; width: "20%">DATE</th>
<th class="craftyCell" style="border-color: #36413E; border-weight: 3px; width: "20%">STUDENT ID</th>
<th class="craftyCell" style="border-color: #36413E; border-weight: 3px; width: "20%">FACULTY ID</th>
<th class="craftyCell" style="border-color: #36413E; border-weight: 3px; width: "20%">COURSE ID</th>
<th class="craftyCell" style="border-color: #36413E; border-weight: 3px; width: "20%">STATUS</th>
</tr>
EOT;

while($row = mysqli_fetch_array($result)){
	//echo "HI";
	echo "<tr align = \"center\" style=\"background-color: rgba(255,255,255,0.5);\">".
	"<td class=\"craftyCell\" style=\"border-color: #36413E;\">".$row["log"]."</td>".
	"<td class=\"craftyCell\" style=\"border-color: #36413E;\">".$row["sid"]."</td>".
	"<td class=\"craftyCell\" style=\"border-color: #36413E;\">".$row["fid"]."</td>".
	"<td class=\"craftyCell\" style=\"border-color: #36413E;\">".$row["cid"]."</td>".
	"<td class=\"craftyCell\" style=\"border-color: #36413E;\"><select class=\"selectBatch\" style=\"margin-bottom: 0px; margin-top: 0px; width: 40%;\" id = \"".$row["sid"]."\" "."name = \"".$row["sid"]."\">".
	"<option value = \"0\" style = \"background-color: WHITE\">ABSENT</option>".
	"<option value = \"1\" style = \"background-color: WHITE\">PRESENT</option>".
	"</select></td>"."</tr>";

	if($row["stat"] == "1"){
		echo "
		<script>
		var s = document.getElementById(\"".$row["sid"]."\");
		(s.options[1]).selected = \"selected\";
		s.style=\"margin-bottom: 0px; margin-top: 0px; width: 40%; background-color: chartreuse\";
		</script>";
	}
	else{
		echo "
		<script>
		var s = document.getElementById(\"".$row["sid"]."\");
		(s.options[0]).selected = \"selected\";
		s.style=\"margin-bottom: 0px; margin-top: 0px; width: 40%; background-color: orange\";
		</script>";
	}
	//echo "<BR>";
}
echo "</table>";

echo "<br><br><input class=\"selectButton\" style=\"width: 15%; margin-bottom: 10px;\"  type = \"submit\" value = \"SAVE ATTENDANCE\">";
echo "<input type = \"hidden\" name = \"hidDate\" id = \"hidDate\" value = \"".$_POST["date"]."\">";
echo "<input type = \"hidden\" name = \"hidBatch\" id = \"hidBatch\" value = \"".$_POST["batch"]."\">";
echo "</form>";

mysqli_close($conn);
//echo "FINISHED";
?>