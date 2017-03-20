<!--
File name: contactUs.php
Authors: Blake Kappel & Brian Bargas
Date created: 09 Nov 2016
Date modified: 21 Nov 2016
-->
<!DOCTYPE html>


<html>

<head>
        <title>TAC: Contact Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" type = "text/css" href="./contactUs.css" />
        <link rel="stylesheet" title="basic style" type="text/css" href = "./homepage.css" media="all" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<script>
          function validate(){
            if ((document.getElementById("fname").value == "") || (document.getElementById("lname").value == "") || (document.getElementById("email").value == "") || (document.getElementById("message").value == "")){
              window.alert("Please fill out all fields before submitting.");
              return false;
            }
            return true;
          }
        </script>-->
        <script type="text/javascript" src="./contactHandler.js"></script>
</head>

<body>
        <div id="wrap">
    <!--Universal Navigation bar-->
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
          <li class="active"><a href="./contactUs.php">Contact Us</a></li>
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

<?php
        function contactForm(){
                $script = $_SERVER['PHP_SELF'];
                print<<<CONTACT
                <div class="container" id = "display">
                        <div class="row" style="margin-top: 5%">
                                <div class="col-md-12">
                                        <div class="well well-sm">
                                                <form class="form-horizontal" method="post" action="$script" onsubmit="return thankYou();" style = "margin: 40px auto; width: 50%;">
                                                        <fieldset>
                                                                <legend class="text-center header">Contact us</legend>

                                                                <div class="form-group">
                                                                        <input name="fname" id="fname" type="text" placeholder="First Name" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                        <input name="lname" id="lname" type="text" placeholder="Last Name" class="form-control" />
                                                                </div>

                                                                <div class="form-group">
                                                                        <input name="email" id="email" type="text" placeholder="Email Address" class="form-control" />
                                                                </div>

                                                                <div class="form-group">
                                                                        <textarea class="form-control" name="message" id="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                        <div class="col-md-12 text-center">
                                                                                <input type="submit" class="btn btn-primary btn-lg" name="contact" value = "Submit">
                                                                        </div>
                                                                </div>
                                                        </fieldset>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
          <div id="push>"</div>
  </div>
CONTACT;
  }

        function foot(){
          print<<<FOOT
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

  function missingInput(){
    print<<<REDO
<div class="container" id = "display">
                        <div class="row" style="margin-top: 5%">
                                <div class="col-md-12">
                                        <div class="well well-sm">
                                        <p style="text-align:center;">Please go back and fill out all fields in the contact form.</p>
                                        </div>
                                </div>
                        </div>
                </div>
          <div id="push>"</div>
  </div>
REDO;
  }

  function invalidEmail(){
    print<<<REDO
<div class="container" id = "display">
                        <div class="row" style="margin-top: 5%">
                                <div class="col-md-12">
                                        <div class="well well-sm">
                                        <p style="text-align:center;">Sorry, please go back and enter a valid email.</p>
                                        </div>
                                </div>
                        </div>
                </div>
          <div id="push>"</div>
  </div>
REDO;
  }


  function thankYou(){
    print<<<THANKS
<div class="container" id = "display">
                        <div class="row" style="margin-top: 5%">
                                <div class="col-md-12">
                                        <div class="well well-sm">
                                        <p style="text-align:center;">Thank you for submitting your inquiry!<br/> We will get back to you as soon as we can.</p>
                                        </div>
                                </div>
                        </div>
                </div>
          <div id="push>"</div>
  </div>
THANKS;
  }
//The php script that handles the posted contact form data
  if (empty($_POST)){
    contactForm();
    foot();
  }

  if (!empty($_POST)){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    if (($fname == "") || ($lname == "") || ($email == "") || ($message == "")){
      missingInput();
      foot();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      invalidEmail();
      foot();
    }
    else{
      $emailMessage = fopen("./message.txt", "w");
      fwrite($emailMessage, "From: ".$fname." ".$lname."\n");
      fwrite($emailMessage, "Email: ".$email."\n");
      fwrite($emailMessage, "Message: ".$message);
      fclose($emailMessage);
      thankYou();
      foot();
    }
  }
?>
