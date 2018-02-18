 <?php 
 	include 'config.php';
 	session_start();
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
					<ul class="nav navbar-nav navbar-right">						
						<li class="active"><a href="post.php">Welcome - <?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"]; ?></a></li>						
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
	<div class="container postpg">
		<div class="row">
			<div class="main-con">
				<div class="col-md-10 col-md-offset-1 postbox">
					<form class="form-horizontal" role="form" id="myForm" method="post" action= "post_process.php" enctype='multipart/form-data'>
						<h4>What's New</h4>
						<div class="form-group" style="padding:14px;">
							<textarea class="form-control" placeholder="Update your status" name="post_msg" id="post_msg"></textarea>
						</div>
						<input type="submit" class="btn btn-primary pull-right" name="btn_post" id="" value="Post">
						<ul class="list-inline">
							<li>
								<label class="glyphicon glyphicon-camera"><input type="file" id="file_upload" name="file_upload" style="display: none;">
								</label>
							</li>
							<li>
								<select class="form-control slct" data-style="btn-primary" name="type" id="type">
									<option value="lost">Lost</option>
								    <option value="found">Found</option>
								 </select>
							</li>
						</ul>
	              	</form>
            	</div>
			</div>
			<div class="col-md-10 col-md-offset-1 showpost" id="showpost">
				<?php 
					$uid=$_SESSION["userid"];
					$sql = "SELECT * FROM POST WHERE USERID='$uid' ORDER BY pid DESC LIMIT 5";

   					$res = mysqli_query($conn,$sql);
   					date_default_timezone_set('Asia/Dhaka');
   					$timezone = date_default_timezone_get();
   					$date = date('m/d/Y h:i:s a', time());
   					$counter=1;
				   	while($row = mysqli_fetch_array($res))
					{
				   	 	$fname=$_SESSION["first_name"];
				   	 	$lname= $_SESSION["last_name"];
				   	 	$desc= $row["description"];
				   	 	$time= $row ["post_date"];
				   	 	$type=$row ["type"];
				   	 	$pid=$row['pid'];
				   	 	$img_typ=$row['image_type'];
				   	?>
						<form class='form-horizontal postbx' role='form' method='post' action="comment_process.php" name="cmnt_box" enctype='multipart/form-data'>
							<h4><?php echo $fname ;echo" ";echo  $lname;?></h4>
							<h6 class="col-md-6"><?php echo $time ?></h6><h6 class="col-md-6">Post Type: <?php echo $type ?></h6>
							<h5 class="col-md-11 col-md-offset-1"><?php echo $desc ?></h5>
							<div><center><?php echo "<img src='data:".$row['image_type']."; base64, ".$row['image']."'/>";?></center></div>
						<div class="row cmnts" id="">
							<?php 
								$sql1 = "SELECT cdesc, cdate, cimage, cimg_type, first_name, last_name
										FROM comment
										JOIN user
										ON comment.userid=user.userid
										where comment.pid='$pid'
										ORDER BY cid DESC
										LIMIT 5";

							   	$res1 = mysqli_query($conn,$sql1);
							  
							   	while($row1 = mysqli_fetch_array($res1))
								{
							   	 	$fname1=$row1["first_name"];
							   	 	$lname1=$row1["last_name"];
							   	 	$cdesc= $row1["cdesc"];
							   	 	$time1= $row1 ["cdate"];

									echo
									"<h4 class='col-md-4'>$fname1 $lname1</h4><p class='col-md-5'>$cdesc</p><h6 class='col-md-3'>$time1</h6>";
									?>
									<?php
										if(($row1['cimg_type'])&&($row1['cimage']) != '') 
										{
									?>
											<div><center><?php echo "<img src='data:".$row1['cimg_type']."; base64, ".$row1['cimage']."'/>";?></center></div>
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
						
				    <?php
				    	$counter++;
					}
				?>
			</div>
		</div>
	</div>
	<div class="container pgfooter">
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
</body>
</html>