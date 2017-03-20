<?php

  if (isset($_GET["userName"])){
    $username = $_GET["userName"];
    $table = "Users";
    $mysqli = connect();
    $result = mysqli_query($mysqli, "SELECT * from $table WHERE username='$username'");
    $row = $result->fetch_row();
    if ($row){
      echo "The username you entered already exists.";
      $result->free();
      return; 
    }
    $result->free();
  }

  elseif (isset($_GET["email"])){
    $email = $_GET["email"];
    $table = "Users";
    $mysqli = connect();
    $result = mysqli_query($mysqli, "SELECT * from $table WHERE email='$email'");
    $row = $result->fetch_row();
    if ($row){
      echo "The email you entered is already in use.";
      $result->free();
      return;
    }
    $result->free();
  }


  function connect(){
    $host = "fall-2016.cs.utexas.edu";
    $user = "tylrnoe";
    $pwd = openssl_decrypt("Wn07mUreOuTUaGy2cBdUSg==", 'aes-128-cbc', 'acapella');
    $dbs = "cs329e_tylrnoe";
    $port = "3306";

    $connection = mysqli_connect($host, $user, $pwd, $dbs, $port);

    if (empty($connection)){
      die("mysqli_connect failed" . mysqli_connect_error());
    }

    return $connection;
    //print "Connected to " . mysqli_get_host_info($connect) . "<br/><br/> \n";
  }
?>
