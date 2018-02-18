 <?php 
 	include 'config.php';
 	session_start();

 	$qid = $_POST['qid'];
 	$test_query = "SELECT * FROM contact where qid = '".$qid."'";
	$query_result = mysqli_query($conn,$test_query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Questions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<style type="text/css">
		textarea
		{
			color: black;
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
    	<h2 align="center">Questions</h2>
        <div class="row">
        	<div class="col-md-5 col-md-offset-3">
        		<div class="table-responsive">
            		<?php
						$row = mysqli_fetch_array($query_result);
					?>
					<center>
	            		<table class="table table bordered searchtable">
	            			<tr>
	            				<td><label><strong>From: </strong></label></td>
	            				<td><?php echo ($row['email']) ?><br></td>
	            			</tr>
	            			<tr>
								<td><label><strong>Name: </strong></label></td>
								<td><?php echo ($row['name']) ?> <br></td>
							</tr>
							<tr>
								<td><label><strong>Message: </strong></label></td> 
								<td><?php echo ($row['message']) ?> <br></td>
							</tr>
	            		</table>
	            	</center>
            	</div>
            	<div class="table-responsive">
	            	<table class="table table bordered searchtable">
						<form action = "question_reply.php" method = "post">
							<tr>
								<td><label><strong>Reply:</strong></label></br></td>
							</tr>
							<tr>
								<td align='center'><textarea name = "reply" style = "width: 100%; height: 196px;"></textarea></td>
								<input type = "hidden" name = "email" value = "<?php echo ($row['email']) ?>">
								<input type = "hidden" name = "subject" value = "<?php echo ($row['subject']) ?>">
								<input type = "hidden" name = "message" value = "<?php echo ($row['message']) ?>">
								<input type = "hidden" name = "qid" value = "<?php echo $qid ?>">
							</tr>
							<tr>
								<td><input type = "submit" name = "submit" class="btn btn-primary"value = "Send"></td>
							</tr>
						</form>
					</table>
				</div>
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