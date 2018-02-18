 <?php 
 	include 'config.php';
 	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | Lost and Found</title>
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
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".pagenav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse pagenav">
					<ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
		</div>
	</div>
	<div class="container searchpg">  
        <?php
        	$sql = "SELECT * FROM POST ORDER BY pid DESC LIMIT 5";
        	$res = mysqli_query($conn,$sql);
        	date_default_timezone_set('Asia/Dhaka');
			$timezone = date_default_timezone_get();
			$date = date('m/d/Y h:i:s a', time());
			$counter=1;
			while($row = mysqli_fetch_array($res))
			{
				$desc= $row["description"];
		   	 	$time= $row ["post_date"];
		   	 	$type=$row ["type"];
		   	 	$pid=$row['pid'];
		   	 	$img_typ=$row['image_type'];
		   	 	$uid=$row['userid'];
		   	 	$sql1 = "SELECT * FROM USER WHERE USERID='$uid'";
		   	 	$res1 = mysqli_query($conn,$sql1);
		   	 	$row1 = mysqli_fetch_array($res1);
		   	 	$fname=$row1["first_name"];
				$lname= $row1["last_name"];
			?>
				<form class='form-horizontal postbx' role='form' method='post' action="comment_process.php" name="cmnt_box" enctype='multipart/form-data'>
					<h4><?php echo $fname ;echo" ";echo  $lname;?></h4>
					<h6 class="col-md-6"><?php echo $time ?></h6><h6 class="col-md-6">Post Type: <?php echo $type ?></h6>
					<h5 class="col-md-11 col-md-offset-1"><?php echo $desc ?></h5>
					<div>
						<center>
						<?php
							if (($row['image_type'])&&($row['image']) != '')
							{
								echo 
								"<img src='data:".$row['image_type']."; base64, ".$row['image']."'/>";
							}	
						?>
						</center>
					</div>
					<div class="row cmnts" id="">
				<?php
					$sql2= "SELECT * FROM comment where pid='$pid' LIMIT 5";
					$res2 = mysqli_query($conn,$sql2);
					while($row2 = mysqli_fetch_array($res2))
					{
						$cdesc= $row2["cdesc"];
						$time1= $row2 ["cdate"];
						$uid1= $row2 ["userid"];
						$sql3= "SELECT * FROM USER WHERE USERID='$uid1'";
						$res3 = mysqli_query($conn,$sql3);
						$row3 = mysqli_fetch_array($res3);
						$fname1=$row3["first_name"];
						$lname1=$row3["last_name"];
						echo
						"<h4 class='col-md-4'>$fname1 $lname1</h4><p class='col-md-5'>$cdesc</p><h6 class='col-md-3'>$time1</h6>
						<br/>";
					?>
					<?php
						if(($row2['cimg_type'])&&($row2['cimage']) != '') 
						{
					?>
						<div>
							<center>
								<?php echo "<img class='col-md-12' src='data:".$row2['cimg_type']."; base64, ".$row2['cimage']."'/>";?>
							</center>
						</div>
					<?php			
						}
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