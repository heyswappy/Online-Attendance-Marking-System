<?php
session_start();
session_destroy();

$t = "../loginStudent.html";

header("Location: ".$t);
exit();
?>