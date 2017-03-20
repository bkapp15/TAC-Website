<?php
	setcookie("seshId", session_id(), 0);
	session_destroy();
	header("Location: homepage.php");
	exit;
?>