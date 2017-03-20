<!--
File name: groups.php
Authors: Blake Kappel, Brian Bargas
Date created: 10 Nov 2016
Date modified: 10 Nov 2016
-->

<?php
  if(!isset($_COOKIE["seshId"])) {
    header("Location: login.php");
    exit;
  }
?>

<!DOCTYPE html>

<html>
<head>
  <title>TAC: Groups</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" title="basic style" type="text/css" href = "./homepage.css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          <li class="active"><a href="./groups.php">Groups</a></li>
          <li><a href="./events.php">Events</a></li>
          <li><a href="./contactUs.php">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./logout.php">Log Out</a></li>
        </ul>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <div class="row" style="margin-top: 5%;">
        <div class="col-lg-6 col-lg-offset-3">
          <form align="center" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
              <label for="groups">Select Group</label>
              <select class="form-control" name="group">
                <option>Beauties & the Beat</option>
                <option>Collegium Musicum</option>
                <option>Fuse A Cappella</option>
                <option>Hum A Cappella</option>
                <option>One Note Stand</option>
                <option>Ransom Notes</option>
                <option>Soul Blend</option>
                <option>The Texas Songhorns</option>
              </select>
              <input type="hidden" name="page" value="selected" />
              <div><input class="btn btn-primary" type="submit" value="Learn More"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <?php
      if (isset($_POST["group"])) {
        $group = $_POST["group"];
        $myfile = fopen("groups.txt", "r");
        while (!feof($myfile)) {
          $currentLine = rtrim(fgets($myfile));
          if ($currentLine == $group) {
            $image = rtrim(fgets($myfile));
            $about = rtrim(fgets($myfile));
            $url = rtrim(fgets($myfile));
          }
        }
        fclose($myfile);

        print <<<DESC
        <div class="container">
          <div class="row">
            <div class="col-md-12" align="center">
                <h1>$group</h1>
                <img src="$image" /><br/>
                <h3>$about</h3>
                <h3><a href="$url">Even More</a></h3>
            </div>
          </div>
        </div>
DESC;
        print("\n");
      }
    ?>
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
