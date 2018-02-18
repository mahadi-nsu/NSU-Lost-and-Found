 <?php 
 	include 'config.php';
 	session_start();

 	$test_query = "SELECT * FROM contact";
	$query_result = mysqli_query($conn,$test_query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Qustions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<style type="text/css">
		.table-hover :hover
		{
			color: #428bca;
			background-color: #000000;
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
	<div class="container coverpage">
		<div class="row">
		</div>
	</div>
	<div class="container searchpg">  
    	<h2 align="center">Questions</h2>
        <div class="col-md-5 col-md-offset-3">
	        <div class="table-responsive">
	        	<table class="table table bordered searchtable">
		        	<thead>
						<tr>
							<strong><label><th>Name</th></label></strong>
							<strong><label><th>Options</th></label></strong>
						</tr>
					</thead>
					<?php
						while($row = mysqli_fetch_array($query_result))
						{
					?>
						<tr>
							<strong><label><td><?php echo $row['name'];?></td></label></strong>
							<td>
								<form action = 'see_ques.php' method = 'post'>
									<input type='hidden' name='qid' value="<?php echo ($row['qid']) ?>">
									<input type = 'submit' value = 'View' class="btn btn-primary">
								</form>
							</td>
						</tr>
						<?php } ?>
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