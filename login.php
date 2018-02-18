<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Panel | Lost and Found</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<br/>
    <div class="container" style="width:700px;">
    	<h3 align="center">Login to see the complete site.</h3>
    	<br/>
    	<div align="center">
            <form method="post" action="login_process.php" id="loginform">
    		<button type="button" name="login" id="login" class="btn btn-success" data-toggle="collapse" data-target="#login_collapse">Login</button>  
                <div id="login_collapse" class="collapse col-md-12" style="border:1px solid #ccc; background-color:#f1f1f1; margin-top:16px;">
                	<h3 align="center">Login</h3>
                	<label>Username</label>
                	<input type="text" name="username" id="username" class="form-control" />  
                    <br />
                    <label>Password</label>  
                    <input type="password" name="password" id="password" class="form-control" />  
                    <br />
                    <input type="submit" name="login_button" Value="Login" class="btn btn-warning"> 
                    <br /><br />  
                </div>
            </form>  
        </div>
    </div>
    <br />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</body>
</html>