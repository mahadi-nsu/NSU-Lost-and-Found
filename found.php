 <?php 
 	include 'config.php';
 	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Found</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
						<li class="active"><a href="found.php">Found Items</a></li>
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
        <h2 align="center">List of all the Lost Items!</h2>
        <br />
        	<div class="col-md-8 col-md-offset-2">
            	<div class="table-responsive">
            		<table class="table table bordered searchtable">
            			<?php
							$sql="SELECT * FROM post where type='found'";
							$query = mysqli_query($conn,$sql);
							$total = mysqli_num_rows($query);
							
							echo 
							"<thead>
								<tr>
									<strong><label><th>Type</th></label></strong>
									<strong><label><th>Description</th></label></strong>
									<strong><label><th>Date</th></label></strong>
								</tr>
							</thead>";
							while($row = mysqli_fetch_array($query))
							{
								$id=$row['pid'];
								$type=$row['type'];
								$desc=$row['description'];
								$date=$row['post_date'];
								
								echo 
								'<tr>
			        				<td>
			        					<div><a href="process.php?id='.$row["pid"].'  ">'.$row["type"].'</a>
				                    	</div>
				                    </td>
				                    <td>
				                    	<div><a href="process.php?id='.$row["pid"].'  ">'.$row["description"].'</a>
				                     	</div>
				                    </td>
				                    <td>
				                    	<div><a href="process.php?id='.$row["pid"].'  ">'.$row["post_date"].'</a>
				                    	</div>
				                    </td>
                    			</tr>';
							}
						?>
            		</table>
            	</div>
            </div>  
        <br />  
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