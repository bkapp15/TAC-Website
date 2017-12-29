<?php
	
	require_once('custom_mysqli.php');
	session_start();

	$_SESSION["count"] = 0;

	$dbConnection = db_connect();

	function nameValid() {
		$name = $_POST["name"];
		if (empty($_POST)) {
			$_SESSION["name"] = "empty";
		}
		else {
			if (strlen($name) == 0) {
				$_SESSION["name"] = "error";
			}
			else {
				$_SESSION["count"]++;	
				$_SESSION["name"] = "valid";
			}
		}
	}

	function emailValid($mysqli) {
		$email = $_POST["email"];
		if (empty($_POST)) {
			$_SESSION["email"] = "empty";
			return;
		}
		$table = "Users";
		$result = mysqli_query($mysqli, "SELECT * from $table WHERE email='$email'");
		$row = mysqli_fetch_assoc($result);
		if (!preg_match("/^.+@.+\..+$/", $email)) {
			$_SESSION["email"] = "error";
		}
		// If the email is already taken
		elseif ($row) {
			$_SESSION["email"] = "errorTaken";
		}
		// If it's not taken, validate the new email as ready for updating the table
		else {
			$_SESSION["count"]++;	
			$_SESSION["email"] = "valid";
		}
		mysqli_free_result($result);
	}

	function userValid($mysqli) {
		$user = $_POST["username"];
		if (empty($_POST)) {
			$_SESSION["user"] = "empty";
			return;
		}
		$table = "Users";
		$result = mysqli_query($mysqli, "SELECT * from $table WHERE username='$user'");
		$row = mysqli_fetch_assoc($result);
		if (strlen($user) < 6 || strlen($user) > 20) {
			$_SESSION["user"] = "errorLen";
		}
		// If the username is already taken
		elseif ($row) {
			$_SESSION["user"] = "errorTaken";
		}
		// If it's not taken validate the new username as ready for updating the table
		else {	
			$_SESSION["count"]++;		
			$_SESSION["user"] == "valid";
		}
		mysqli_free_result($result);
	}

	// Double validating in conjunction with the js validation
	function passValid() {
		$pwd = $_POST["pwd"];
		if (empty($_POST)) {
			$_SESSION["pwd"] = "empty";
			return;
		}
		if (strlen($pwd) < 6 || strlen($pwd) > 20) {
			$_SESSION["pwd"] = "errorLen";
		}
		else {		
			$_SESSION["count"]++;	
			$_SESSION["pwd"] = "valid";
		}
	}

	function passTwoValid() {
		$pwd = $_POST["pwd"];
		$pwdTwo = $_POST["pwdTwo"];
		if (empty($_POST)) {
			$_SESSION["pwdTwo"] = "empty";
			return;
		}
		if (strlen($pwdTwo) == 0 || !preg_match("/$pwd/", $pwdTwo)) {
			$_SESSION["pwdTwo"] = "errorNoMatch";
		}
		else {			
			$_SESSION["count"]++;
			$_SESSION["pwdTwo"] == "valid";
		}
	}

	// Prints this html page if the user input doesn't validate
	function noValidateHtml(){
		print<<<ERROR
<html>
  <body>
	  <p>The username or password you entered is already taken. Please click <a href="signup.php">here</a> to try again.</p>
	</body>
</html>
ERROR;
	}
	
	function validated ($mysqli) {
		if ($_SESSION["count"] == 5) {
			$table = "Users";
			$name = $_POST["name"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$pwd = $_POST["pwd"];

			$stmt = mysqli_prepare ($mysqli, "INSERT INTO $table (username, email, fullname, password) VALUES (?, ?, ?, ?)");
			mysqli_stmt_bind_param ($stmt, 'ssss', $username, $email, $name, $pwd);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			setcookie("seshId", session_id());
			header("Location: homepage.php");
		}
		else {
			noValidateHtml();
		}
	}
	
	if (empty($_POST)){
		initialHtml();
	}
	
	elseif (!empty($_POST)){
		nameValid();
	  emailValid($dbConnection);
    userValid($dbConnection);
    passValid();
    passTwoValid();
    validated($dbConnection);

    mysqli_close($dbConnection);
	}
	
	function initialHtml(){
		$script = $_SERVER['PHP_SELF'];
		print<<<SIGNUP
		<!DOCTYPE html>
<html lang="en">
<head>
<title>TAC Sign-Up</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" title="basic style" type="text/css" href = "./homepage.css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./signup.js"></script>
<script type="text/javascript" src="./ajaxUser.js"></script>
</head>

<body>
	<div id="wrap">
	  <nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="./homepage.php"><span><img src="brand.jpeg" alt="logo" height="25" width="25"/></span>   TAC</a>
	      </div>
	      <div id="navbar" class="navbar-collapse collapse">
	      <ul class="nav navbar-nav">
	        <li><a href="./groups.php">Groups</a></li>
	        <li><a href="./events.php">Events</a></li>
	        <li><a href="./contactUs.php">Contact Us</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="./login.php">Login</a></li>
	        <li class="active"><a href="./signup.php">Sign Up</a></li>
	      </ul>
	      </div>
	    </div>
	  </nav>
	  <div class="container">
		  <div class="row" style="margin-top: 5%;">
		    <div class="col-lg-12">
		    	<div class="well well-sm">
						<form id="signup" method="post" action="$script" onsubmit="return validate();" style="width: 50%; margin: 0 auto;">
							<legend class="text-center header"> Sign-Up for TAC </legend>
						  <div id="name" class="form-group">
						    <input type="text" class="form-control" name="name" placeholder="Enter full name" maxlength="40">
					    </div>
					    <div id="email" class="form-group">
						    <input type="email" class="form-control" id="e-mail"name="email" placeholder="Enter email" maxlength="40" onchange="callServerEmail()">
						  </div>
						  <div id="username" class="form-group">
						  	<input type="text" class="form-control" id="user" name="username" placeholder="Enter username (must be 6-20 characters long)" maxlength="20" onchange="callServerUser()">
					  	</div>
					  	<div id="pwd" class="form-group">
					  		<input type="password" class="form-control" name="pwd" placeholder="Enter password (must be 8-20 characters long)" maxlength="20">
					  	</div>
					  	<div id="pwdTwo" class="form-group">
					  		<input type="password" class="form-control" name="pwdTwo" placeholder="Re-enter password" maxlength="20">
					  	</div>
					  	<div align="center">
					  		<button type="submit" class="btn btn-primary">Submit</button>
					  	</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	  <div id="push"></div>
  </div>

  <div id="footer">
    <div class="container">
      <div class = "row">
        <div class = "col-md-4 text-left">
          <p><a href = "./contactUs.php">Contact Us</a></p>
        </div>
        
        <div class = "col-md-4 text-left">
          <figure>
            <figcaption>Connect</figcaption>
            <img src = "" alt = "Facebook" />
            <img src = "" alt = "Twitter" />
            <img src = "" alt = "Instagram" />
          </figure>
        </div>
        
        <div class = "col-md-4 text-left">
          <p>&copy; 2016 Texas Acappella Community</p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

SIGNUP;
	}
?>