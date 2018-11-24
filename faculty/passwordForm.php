<?php
include"loadDynamic.php";
echo <<<'EOT'
	<html>
	<head>
		<title>
			CHANGE PASSWORD
		</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body class="faculty">
		<div style="padding-top: 100px; color: #36413E !important;" class="heading small">CHANGE PASSWORD</div>
		<form name="addCourse" action="password.php" method="POST">
			<table style="margin-left: auto; margin-right: auto; color: #36413E !important;"  width="95%" border="0px">
				<tr>
					<td width="20%">
						<label style="color: #36413E !important;" class="inputLabel" for="old">Current Password</label>
					</td>
					<td>
						<input class="loginInput" type="password" name="old" id="old"><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label style="color: #36413E !important;" class="inputLabel" for="new">New Password</label>
					</td>
					<td>
						<input class="loginInput" type="password" name="new" id="new"><br><br>
					</td>
				</tr>

				<tr>
					<td align="center">
						<input style="width: 200px;" class="loginButton" type="submit" value="Change Password">
					</td align="center">
					<td align="center">
						<input style="width: 150px;" class="loginButton" type="reset" value="Reset">
						<a href="dashboard.html">
							<input style="width: 150px;" class="loginButton" type="button" value="Return">
						</a>
					</td align="center">
				</tr>
			</table>
		</form>
	</body>
	</html>
EOT;
?>