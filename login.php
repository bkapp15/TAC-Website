<!--
File name: login.php
Authors: Blake Kappel, Brian Bargas
Date created: 21 Nov 2016
Date modified: 21 Nov 2016
-->

<!DOCTYPE html>

<?php
	session_start();

	if (isset($_POST["login"])) {
		$host = "fall-2016.cs.utexas.edu";
		$user = "tylrnoe";
		$pwdDB = openssl_decrypt("Wn07mUreOuTUaGy2cBdUSg==", 'aes-128-cbc', 'acapella');
		$dbs = "cs329e_tylrnoe";
		$port = "3306";

		$mysqli = new mysqli($host, $user, $pwdDB, $dbs);

		if ($mysqli->connect_errno)
		{
		  die("mysqli_connect failed: " . mysqli_connect_errno());
		}

		$table = "Users";
		$username = $_POST["username"];
		$pwd = openssl_encrypt ($_POST["passwd"], 'aes-128-cbc', 'acapella');
                $pwd = $_POST["passwd"];
		$result = mysqli_query($mysqli, "SELECT username, pwd from $table WHERE username='$username'");
		$row = $result->fetch_row();
		$chkPwd = $row[1];
		//$chkPwd = openssl_decrypt("$row[1]", 'aes-128-cbc', 'acapella');
                print("$pwd, $row[1], $chkPwd");
		if ($row && $pwd == $chkPwd) {
			$sname = "seshId";
			setcookie($sname,session_id());
			header("Location: homepage.php");
			exit;
		}
		if (!$row || $pwd != $chkPwd) {
			$_SESSION["valid"] = false;
		}
	}


	head();
	login();
	foot();

  function head(){
  	$script = $_SERVER['PHP_SELF'];
	  print<<<HEAD
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
			      	<li class="active"><a href="./login.php">Login</a></li>
			        <li><a href="./signup.php">Sign Up</a></li>
			      </ul>
			      </div>
			    </div>
			  </nav>
			  <div class="container">
				  <div class="row" style="margin-top: 5%;">
				    <div class="col-lg-12">
				    	<div class="well well-sm">
								<form method="post" action="$script" style="width: 50%; margin: 0 auto;">
									<legend class="text-center header"> Login </legend>
HEAD;
  }

  function foot(){
    print<<<FOOT
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
FOOT;
  }

  function login(){
	  if (empty($_POST)) {
		  print<<<LOGINEMPTY
			  <div id="username" class="form-group">
			    <input type="text" class="form-control" name="username" placeholder="Enter username">
		    </div>
			  <div id="passwd" class="form-group">
			    <input type="password" class="form-control" name="passwd" placeholder="Enter password">
		    </div>
		  	<div align="center">
		  		<button type="submit" name="login" class="btn btn-primary">Login</button>
		  	</div>
LOGINEMPTY;
  	}
	  if ($_SESSION["valid"] == false && !empty($_POST)) {
	  	print<<<LOGINERROR
			  <div id="username" class="form-group has-error has-feedback">
			    <input type="text" class="form-control form-control-error" name="username" placeholder="Enter username">
			    <small class="form-text">Please enter valid username and password.</small>
			    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
		    </div>
			  <div id="passwd" class="form-group has-error has-feedback">
			    <input type="password" class="form-control form-control-error" name="passwd" placeholder="Enter password">
			    <small class="form-text">Please enter valid username and password.</small>
			    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
		    </div>
		  	<div align="center">
		  		<button type="submit" name="login" class="btn btn-primary">Login</button>
		  	</div>
LOGINERROR;
  	}
	}
  
?>
