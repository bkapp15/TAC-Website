<?php
	
	require_once('custom_mysqli.php');
	
  if (isset($_GET["userName"])){
    $username = $_GET["userName"];
    $table = "Users";
    $dbConnection = db_connect();
    $result = mysqli_query($dbConnection, "SELECT * from $table WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    if ($row){
      echo "The username you entered already exists.";
    }
    db_disconnect($dbConnection, $result);
    return; 
  }

  elseif (isset($_GET["email"])){
    $email = $_GET["email"];
    $table = "Users";
    $dbConnection = db_connect();
    $result = mysqli_query($dbConnection, "SELECT * from $table WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);
    if ($row){
      echo "The email you entered is already in use.";
    }
    db_disconnect($dbConnection, $result);
    return;
  }
?>
