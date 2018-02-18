<?php	
	include 'config.php'; 
	session_start();

	$pid=$_POST['pid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
</head>
<body class="pgbody">
	<div class="container searchpg">  
    	<h2 align="center">Delete Post</h2>
        <div class="col-md-8 col-md-offset-2">
	        <?php
	        	if($pid=="")
				{
					echo "<h3 align='center'>User Not Found</h3>";
				}
				else
				{
					if (mysqli_connect_errno()) 
					{
						echo "<h3 align='center'>Failed to connect to MySQL: </h3>" . mysqli_connect_error();
					}
					else
					{
						mysqli_query($conn,"delete from post where pid=$pid");
						echo "<h2 style='color:#428bca;'><center>Post has been removed successfully.</center></h2>";
					}
				}
				echo "<br/>";
				echo "<form action='post_list.php' method='post'>
					<div align='center'><input type='submit' class='btn btn-primary' value='Post List' /></div>
					</form>";
	        ?>
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