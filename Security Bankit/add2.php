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
		<div class="container">
	<div class="row">
        
        <!-- panel preview -->
        <div class="col-sm-5">
            
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Bank Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="concept" name="concept">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Account Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div> 
					<div class="form-group">
                        <label for="description" class="col-sm-3 control-label">IFSC Code:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-default preview-add-button">
                                <span class="glyphicon glyphicon-plus"></span> Add
                            </button>
                        </div>
						&nbsp;
						<div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Add Cell Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div> <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Add Thumb Impression:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div> <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Eye Scan:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div> 
						<div class="row">
                <div class="col-xs-5">
                    <hr style="border:1px dashed #dddddd;">
                    <button type="button" class="btn btn-primary btn-block">Next</button>
                </div>                
            </div>
                    </div>
                </div>
            </div>            
        </div> <!-- / panel preview -->
        
            
        </div>
	</div>
</div>
        
      </ul>
    </div>
    
  
  </body>
</html>
