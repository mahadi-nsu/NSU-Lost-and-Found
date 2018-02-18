 <?php 
 	include 'config.php';
 	session_start();

 	if(isset($_GET['id']))
	$id=$_GET['id'];
	else
	$id="";

	$sql = "SELECT * FROM post WHERE pid = '$id'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lost and Found</title>
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
						<li><a href="found.php">Found Items</a></li>
						<li><a href="search.php">Search Items</a></li>
					</ul>
					<div class="navbar-form navbar-left">
						<div class="input-group">
			      			<span class="input-group-btn">
			    				<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
			  				</span>
			      			<input type="text" class="form-control" placeholder="Search for...">
		    			</div>
					</div>
					<ul class="nav navbar-nav navbar-right">						
						<li><a href="post.php">Welcome - <?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"]; ?></a></li>						
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container coverpage">
		<div class="row">
			
		</div>
	</div>
	<div class="container searchpg">
		<?php
			if($id=="")
			{
				echo "<h3>Post Not Found.</h3>";
			}
			else
			{
				//echo "<h3>Post Found.</h3>";
				$pid=$row['pid'];
				$desc=$row['description'];
				$time=$row['post_date'];
				$type=$row['type'];
				$img_typ=$row['image_type'];
				$uid=$row['userid'];
				$counter=1;

				$sql1 = "SELECT first_name, last_name FROM user WHERE userid='$uid'";
				$res1 = mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_array($res1);
				$fname=$row1["first_name"];
				$lname= $row1["last_name"];
			?>
				<form class='form-horizontal postbx' role='form' method='post' action="comment_process.php" name="cmnt_box" enctype='multipart/form-data'>
					<h4><?php echo $fname ;echo" ";echo  $lname;?></h4>
					<h6 class="col-md-6"><?php echo $time ?></h6><h6 class="col-md-6">Post Type: <?php echo $type ?></h6>
					<h5 class="col-md-11 col-md-offset-1"><?php echo $desc ?></h5>
				<?php 
					if (($row['image_type'])&&($row['image']) != '')
					{
				?>	
						<div><center><?php echo "<img src='data:".$row['image_type']."; base64, ".$row['image']."'/>";?></center></div>
				<?php 
					}
				?>
					<div class="row cmnts collapse" id="cmnt_collapse">	
			<?php
				$sql2 = "SELECT cdesc, cdate, cimage, cimg_type, first_name, last_name
					FROM comment JOIN user
					ON comment.userid=user.userid
					and comment.pid='$pid'
					ORDER BY cid DESC
					LIMIT 5";
					$res2 = mysqli_query($conn,$sql2);	
					
				while($row2= mysqli_fetch_array($res2))
				{
					$fname2=$row2["first_name"];
					$lname2=$row2["last_name"];
					$cdesc= $row2["cdesc"];
					$time2= $row2["cdate"];
					echo
					"<h4 class='col-md-4'>$fname2 $lname2</h4><p class='col-md-5'>$cdesc</p><h6 class='col-md-3'>$time2</h6>";

			?>
			<?php 
				if(($row2['cimg_type'])&&($row2['cimage']) !='')
				{
			?>	
					<div><center><?php echo "<img src='data:".$row2['cimg_type']."; base64, ".$row2['cimage']."'/>";?></center></div>
			<?php 
				}
			?>
		<?php 
				}
		?>
				<div class='input-group col-md-12'>
					<input class='form-control col-md-6 col-md-offset-1' placeholder='Write your comments...' name='cmt_msg' id='cmt_msg<?php echo "$counter";?>' /><input type='hidden' name='txt_PID' value='<?php echo "$pid"; ?>'/>
					<div class='input-group-addon'>
						<label class='glyphicon glyphicon-camera cmt_icon'><input type='file' id="img_upload" name="img_upload" style='display: none;'>
					</div>
					<input type="submit" class="col-md-5 btn btn-primary" name="btn_cmt" id="" value="Comment">
				</div>		
			</div>
			</form>
			<button type="button" class="col-md-12 btn btn-primary cmnt_button" data-toggle="collapse" data-target="#cmnt_collapse">See Comment</button>			
		 <?php
			$counter++;	
			} 
		?>      
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