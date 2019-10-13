<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CSRF Protection</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
  </head>
    
    <style>
        body{
            margin: 0;
            padding: 0;
            background: url(Gray-plain-website-background.jpg);
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        
    </style>
    
  <body>
  
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">CSRF Protection</a>
      </div>
      <ul class="nav navbar-nav">
        <?php
          if (isset($_COOKIE['session_cookie'])) {
            echo "<li class='active'><a href='user-profile.php'>Profile</a></li>";
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if (!isset($_COOKIE['session_cookie'])) {
            echo "<li><a href='user-login.php'><span class='glyphicon glyphicons-log-in'></span> Login </a></li>";
          }
        ?><?php
          if (isset($_COOKIE['session_cookie'])) {
            echo "<li><a href='user-logout.php'><span class='glyphicon glyphicons-log-out'></span> Logout</a></li>";
          }
        ?>
      </ul>
    </div>
  </nav>
</body>
</html>
