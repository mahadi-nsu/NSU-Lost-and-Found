 <?php 
 	include 'config.php';
 	session_start();

 	$uid = $_POST['uid'];
 	$test_query = "SELECT * FROM user where userid = '".$uid."'";
	$query_result = mysqli_query($conn,$test_query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<style type="text/css">
		input,select,option
		{
			background-color: black;
			color: white;
			text-align: center;
		}
	</style>
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
	<div class="container searchpg">  
    	<h2 align="center">Edit User</h2>
    	<br>
    	<br>
        <div class="col-md-8 euser">
	        <div class="table-responsive col-md-10 col-md-offset-3">
	        	<?php
					$row = mysqli_fetch_array($query_result);
				?>
	        	<table class="table table bordered searchtable">
        			<form action='edit_user_process.php' method='post'>
        				<tr>
        					<td><label><strong>Fisrt Name: </strong></label></td>
        					<td>
        						<input type="text" name="fname" value=<?php echo ($row['first_name']) ?> readonly>
        					</td>
        				</tr>
        				<tr>
							<td><label><strong>Last Name: </strong></label></td>
							<td>
    							<input type="text" name="lname" value=<?php echo ($row['last_name']) ?> readonly>
    						</td>
						</tr>
						<tr>
							<td><label><strong>Username: </strong></label></td> 
							<td>
								<input type="text" name="uname" value=<?php echo ($row['username']) ?> readonly>
							</td>
						</tr>
						<tr>
							<td><label><strong>Designation: </strong></label></td> 
							<td>
								<input type="text" name="desi" value=<?php echo ($row['designation']) ?> readonly>
							</td>
						</tr>
						<tr>
							<td><label><strong>Nsu Id: </strong></label></td> 
							<td>
								<input type="text" name="nid" value=<?php echo ($row['nsuid']) ?> readonly>
							</td>
						</tr>
						<tr>
							<td><label><strong>Phone: </strong></label></td> 
							<td>
								<input type="text" name="phone" value=<?php echo ($row['phone']) ?> readonly>
							</td>
						</tr>
						<tr>
							<td><label><strong>Type: </strong></label></td> 
							<td>
								<input type='hidden' name='uid' value="<?php echo ($row['userid']) ?>">
								<select class="form-control" data-style="btn-primary" name="type">
                        			<option value=<?php echo ($row['type']) ?> ><?php echo ($row['type']); ?></option>
                        			<option value="admin">Admin</option>
                        			<option value="user">User</option>
                    			</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Modify" class="btn btn-primary btn-block btn-lg" onclick= "validate()">
							</td>
						</tr>
					</form>
        		</table>
	        </div>
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