 <?php 
 	include 'config.php';
 	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/lost_found.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
</head>
<body class="pgbody">
	<div class="container">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".pagenav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse pagenav">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="lost.php">Lost Items</a></li>
						<li><a href="found.php">Found Items</a></li>
						<li><a href="search.php">Search Items</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">						
						<li><a href="post.php">Welcome - <?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"]; ?></a></li>						
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
		include 'menu.php';
	?>
	<div class="container coverpage">
		<div class="row">
			
		</div>
	</div>
	<div class="container searchpg">  
        <br />  
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-3 col-md-offset-3" align="center">
			<form method="Post" action="create_admin_process.php" name="login">
				<h2>Create Admin <small>. . . to find some help.</small></h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" >
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" >
						</div>
					</div>			
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<input type="text" name="username" id="username" class="form-control input-lg" placeholder="UserName" tabindex="3" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="4" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password1" id="password1" class="form-control input-lg" placeholder="Confirm Password" tabindex="5" required>
						</div>
					</div>
				</div>			
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<input type="text" name="nsuid" id="nsuid" class="form-control input-lg" placeholder="NSU ID" tabindex="6" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="designation" id="designation" class="form-control input-lg" placeholder="Designation" tabindex="7" >
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone" tabindex="8">
						</div>
					</div>			
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<select class="form-control" data-style="btn-primary" name="type">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
					</div>
				</div>
				<br/>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" onclick= "validate()"> 
					</div>
				</div>					
			</form>
		</div>    
    </div>
	<div class="container pgfooter">
		<div class="row">
			<div class="navbar-text pull-left">
				<p>Copyright Lost and found</p>
			</div>
			<div class="navbar-text pull-right">
				<div class="col-md-5">
					<h3>Address</h3>
					<p>15 NSU Main Campus Rd, Dhaka 1229, Bangladesh</p>
				</div>
				<div class="col-md-5">
					<h3>Contacts</h3>
					<p>15 NSU Main Campus Rd, Dhaka 1229, Bangladesh</p>
				</div>
			</div>	
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="jquery-3.1.0.min.js" type="text/javascript"></script>
</body>
</html>