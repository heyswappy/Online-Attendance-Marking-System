<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_destroy();

$t = "../loginFaculty.html";

header("Location: ".$t);
exit();
?>