<!--
File name: homepage.html
Authors: Blake Kappel, Brian Bargas
Date created: 19 Oct 2016
Date modified: 19 Oct 2016
-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>TAC Homepage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" title="basic style" type="text/css" href = "./homepage.css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-image: url('jumbotron.jpg'); background-size: cover; height: 400px;">
      <div class="row" style="margin-top: 5%">
        <div class="col-lg-12">
          <h1>Texas Acappella <br/>Community</h1>
        </div>
      </div>
    </div>
    
    <!--The About Section-->
    <div class = "container">
      <div class = "row" id = "about">
        <div class = "col-lg-12 text-center">
          <h1>About</h1>
          <p>We aim to provide a one-stop shop for anyone interested in the acappella community, whether you are currently a member or not. Use this website to explore the diversity that the Texas Acappella Community has to offer!</p>
        </div>
      </div>
    </div>
    
    <!--3 columns for Groups, Recent Media, and an Events Calendar-->
    <div class = "container">
      <div class = "row">
      
        <!--Left column for group information and their respective links/descriptions -->
        <div class = "col-md-4 text-center">
          <h2>Groups</h2>
          <table class = "table table-striped table-responsive">
            <tr>
              <td><img src = "./img/BATB.png" class = "img-circle" alt = "Beauties and the Beat" height="75" width="75"/></td>
              <td><h4>Beauties & the Beat</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="Beauties & the Beat" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/colmus.png" class = "img-circle" alt = "Collegium Musicum" height="75" width="75" /></td>
              <td><h4>Collegium Musicum</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="Collegium Musicum" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/fuse.png" class = "img-circle" alt = "Fuse" height="75" width="75"/></td>
              <td><h4>Fuse A Cappella</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="Fuse A Cappella" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/hum.png" class = "img-circle" alt = "Hum" height="75" width="75" /></td>
              <td><h4>Hum A Cappella</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="Hum A Cappella" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/ONS.png" class = "img-circle" alt = "One Note Stand" height="75" width="75" /></td>
              <td><h4>One Note Stand</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="One Note Stand" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/ransomnotes.png" class = "img-circle" alt = "Ransom Notes" height="75" width="75"/></td>
              <td><h4>Ransom Notes</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="Ransom Notes" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/soulblend.jpg" class = "img-circle" alt = "Soul Blend" height="75" width="75"/></td>
              <td><h4>Soul Blend</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="Soul Blend" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
            <tr>
              <td><img src = "./img/txsongs.png" class = "img-circle" alt = "Texas Songhorns" height="75" width="75"/></td>
              <td><h4>The Texas Songhorns</h4></td>
              <td>
                <form method="post" action="./groups.php">
                  <input type="hidden" name="group" value="The Texas Songhorns" />
                  <input type="submit" class="btn btn-primary" value="Learn More">
                </form>
              </td>
            </tr>
          </table>
        </div>
        
        
        <!-- Middle column for the recent media released by the groups -->
        <div class = "col-md-4 text-center">
          <h2>Recent Media</h2>
          <table class = "table table-responsive table-striped">
            <tr>
              <td><img src = "./img/ONS.png" class = "img-rounded" alt = "One Note Stand" height="75" width="75" /></td>
              <td><h4>Latch - One Note Stand</h4></td>
            </tr>
            <tr>
              <td><img src = "./img/colmus.png" class = "img-rounded" alt = "Collegium Musicum" height="75" width="75" /></td>
              <td><h4>Home - Collegium Musicum</h4></td>
            </tr>
            <tr>
              <td><img src = "./img/BATB.png" class = "img-rounded" alt = "Beauties and the Beat" height="75" width="75"/></td>
              <td><h4>Golddigger - Beauties & the Beat</h4></td>
            </tr>
            <tr>
              <td><img src = "./img/txsongs.png" class = "img-rounded" alt = "Texas Songhorns" height="75" width="75"/></td>
              <td><h4>Its Not Unusual - Texas Songhorns</h4></td>
            </tr>
          
          </table>
        </div>
        
        <!-- Right column for upcoming events, used embedded Google calendar for it -->
        <div class = "col-md-4 text-center">
          <h2>Events Calendar</h2>
          <iframe src="https://calendar.google.com/calendar/embed?src=bargasb93%40gmail.com&ctz=America/Chicago" width="300" height="350" frameborder="0" scrolling="no"></iframe>
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
