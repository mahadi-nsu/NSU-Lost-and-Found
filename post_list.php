 <?php 
 	include 'config.php';
 	session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/lost_found.css">
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
					<ul class="nav navbar-nav navbar-right"><li><a href="post.php">Welcome - <?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"]; ?></a></li>						
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
		<h2 align="center">Post List</h2>
        <div class="col-md-10 col-md-offset-1">
        	<div class="table-responsive">
        		<table class="table table bordered searchtable">
        			<?php
        				if(isset($_GET['view']))
						$view=$_GET['view'];
						else
						$view="1";
						$x=($view-1)*20;

						$sql="SELECT * FROM post";
						$query = mysqli_query($conn,$sql);
						$total = mysqli_num_rows($query);

						$sql="SELECT * FROM post LIMIT $x,21";
						$query = mysqli_query($conn,$sql);
						$count = mysqli_num_rows($query);
						$ct=0;
						
						$on=$x+1;
						$to=$x+$count;

						echo "<h2 align='center'>Showing result from $on to $to of total $total</h2>";
						echo
						"<thead>
						<tr>
							<strong><label><th>Post</th></label></strong>
							<strong><label><th>Type</th></label></strong>
							<strong><label><th>Date</th></label></strong>
							<strong><label><th>Options</th></label></strong>
						</tr>
						</thead>";

						while($row = mysqli_fetch_array($query))
						{
							$post=$row['description'];
							$date=$row['post_date'];
							$type=$row['type'];
							$pid=$row['pid'];
							
							echo
							"<tr>
								<strong><label><td class='col-md-4'>$post</td></label></strong>
								<strong><label><td class='col-md-2'>$type</td></label></strong>
								<strong><label><td class='col-md-2'>$date</td></label></strong>
								<strong><label><td class='col-md-2'>";
						?>	
							<form class='col-md-2' action = 'delete_post.php?id=<?php echo $pid ?>' method = 'post'>
								<input type='hidden' name='pid' value="<?php echo ($row['pid']) ?>">
								<input type = 'submit' value = 'Delete' class="btn btn-danger">
							</form>
						<?php
							"</td></label></strong>
							</tr>";
						}
						
						$next=$view+1;
						$back=$view-1;

						echo "<tr>
						<td></td>
						<td></td>
						<td>";

						if($back>0)
						echo 
						"<form action='post_list.php?view=$back' method='post'>
						<div><input type='submit' value='<<Back' /></div>
						</form>";

						echo 
						"</td>
						<td>";

						if($ct>=20 && $count==21)
						echo 
						"<form action='post_list.php?view=$next' method='post'>
							<div><input type='submit' value='Next>>' /></div>
						</form>";
					
						echo 
						"</td>
						</tr>";
        			?>
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