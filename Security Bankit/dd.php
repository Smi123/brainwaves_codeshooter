<?php

	session_start();
	include "include/check_session_in.php";
	include "include/functions.php";
	if(isset($_POST['generate']))
	{
		?>
			<script type="text/javascript">
				alert("Your request number is 143216 .Digitally signed DD will be sent toour registered email..!!");
				location="main.php";
			</script>
			<?php
			//exit;
		}
	
	?>

<!DOCTYPE html>
<html>
  <head>
    <title>Security BanKKit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>

  <body background="images/background.png">
       <div class="container" >
      <div class="jumbotron">
        <h1>Security Bank kit</h1>      
        <p>This page will grow as we add more and more components from Bootstrap...</p>      
        <!--<a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span> Search</a>-->
      </div>
    </div>

    <div class="container">
      <ul class="nav nav-tabs">
        <li class="active"><a href="main.php">Dashboard</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Add Account</a></li>
            <li><a href="#">Edit Account</a></li>
            <li><a href="#">Delete Account</a></li>                        
          </ul>
        </li>
        
      </ul>
    </div>
    
  &nbsp;
    &nbsp;
      <div class="container">
      <ul class="nav nav-pills">
        <li><a href="#">Payment/Transfer</a></li>
        <li><a href="#">Bill Payment</a></li>
		<li><a href="#">Demand Draft</a></li>
        <li><a href="#">E-Tax</a></li>
        <li><a href="#">E-Cards</a></li>
		<div class="container">
	<div class="row">
        <div class="col-sm-12">
            
        </div>
       
        <div class="col-sm-5">
            <h4>Draft Form:</h4>
			<form method="post">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">In Favour Of</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="concept" name="concept">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Drawn On</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Comission Rate</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount">
                        </div>
                    </div><div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount">
                        </div>
                    </div>
                    
                </div>
            </div> 
    <div class="row">
                <div class="col-xs-4">
                    <hr style="border:1px dashed #dddddd;">
                    <input class="btn" type="submit" value="Generate DD" name="generate">
                </div>                
            </div>	
</form>			
        </div>
        
           
          
        </div>
	</div>
</div>
      </ul>
    </div>
   
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<a href="main.php">Back to dashboard</a>
  </body>
</html>

  </body>
</html>
