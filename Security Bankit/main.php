<!DOCTYPE html>
<html>
  <head>
    <title>Security BanKKit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>

  <body background="images/background.png">
    <div class="container">
      <div class="jumbotron">
        <h1>Security BanKKit</h1>      
            
        <!--<a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span> Search</a>-->
      </div>
    </div>

    <div class="container" background="images/background.png">
      <ul class="nav nav-tabs">
        <li class="active"><a href="dashboard.php">Dashboard</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add2.php">Add Details</a></li>
            <li><a href="#">Edit Details</a></li>
            <li><a href="#">Delete Details</a></li>                        
          </ul>
        </li>
        
      </ul>
    </div>
    
    <div class="container">
      <div class="row">
        <?php
	include "dashboard.php";
 ?>
      </div>
    </div>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
