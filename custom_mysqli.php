<?php

require_once('protected/config.php');

// Connects to database and returns mysqli connection object
function dbconnect(){
	$connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

  if ($connection->connect_errno)
  {
    die("mysqli_connect failed: " . mysqli_connect_errno());
  }
	return $connection;
}

// Takes in a mysqli connection object and retrieves everything from from the Users table and returns the result
function mysqli_select_all_users($connection){
	$sql = "SELECT * from ".DBTABLE;
  $result = mysqli_query($connection, $sql);
	return $result;
}

// Takes in connection object, username and password variables, returns mysqli query result
function check_user_pass($connection, $user, $pass){
	$result = mysqli_query($connection, "SELECT username, password from ".DBTABLE." WHERE username='$user'");
	$row = mysqli_fetch_assoc($result);
  $chkPwd = $row['password'];
	assert ($chkPwd == $pass);
	if ($row && $pass == $chkPwd) {
		return TRUE;
	}
	return FALSE;
}

// Frees the result memory and closes connection of given result and connection objects
function db_disconnect($connection, $result){
	mysqli_free_result($result);
  mysqli_close($connection);
}

$newConnection = dbconnect();
$newResult = mysqli_select_all_users($newConnection);

while($row = mysqli_fetch_assoc($newResult)) {
  $user = $row['username'];
  $pass = $row['password'];
  print("username is $user and password is $pass");
}

db_disconnect($newConnection, $newResult);

////$chkPwd = openssl_decrypt("$row[1]", 'aes-128-cbc', 'acapella');
//              print("$pwd, $row[1], $chkPwd");
//if ($row && $pwd == $chkPwd) {
//	$sname = "seshId";
//	setcookie($sname,session_id());
//	header("Location: homepage.php");
//	exit;
//}
//if (!$row || $pwd != $chkPwd) {
//	$_SESSION["valid"] = false;
//}
//	}
	?>