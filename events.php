<!--
File name: events.html
Authors: Blake Kappel, Brian Bargas
Date created: 10 Nov 2016
Date modified: 10 Nov 2016
-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>TAC Events</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" title="basic style" type="text/css" href = "./homepage.css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <div id ="wrap">
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
					<li class="active"><a href="./events.php">Events</a></li>
					<li><a href="./contactUs.php">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
        <?php
          if (!isset($_COOKIE["seshId"])) {
            print <<< NOLOGIN
              <li><a href="./login.php">Login</a></li>
              <li><a href="./signup.php">Sign Up</a></li>
NOLOGIN;
          }
          else {
            print <<< LOGGEDIN
              <li><a href="./logout.php">Log Out</a></li>
LOGGEDIN;
          }
        ?>
				</ul>
				</div>
			</div>
		</nav>
		
		<div class="container" style="margin-top: 5%">
			<h1 style="text-align: center">Events</h1>
			<dl>
				<dt><h3>Acapalooza!</h3></dt>
				<dd><img src="./img/acapalooza.jpg" /></dd>
				<dd><a href="https://www.facebook.com/events/1607054276257166/"><h4>Facebook Event</h4></a></dd>
				<dd>Come on out to the 4th annual ACAPALOOZA, benefitting Voices Against Violence at UT Austin!<br/><br/>Admission is just $5, and all proceeds will go to this amazing organization dedicated to raising awareness of and combating relationship violence in our community.</dd>
				<br/><br/>
				<dt><h3>Come back for more updates on upcoming events!</h3></dt>
			</dl>
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
