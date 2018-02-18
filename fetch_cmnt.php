<?php
	include 'config.php';
	if(empty($_SESSION))
		session_start();

	$uid=$_SESSION["userid"];
	$pid=$row['pid'];
	$pid=$_POST['txt_PID'];
	$sql = "SELECT comment.cdesc, comment.cdate, user.first_name, user.last_name FROM comment 
			INNER JOIN user 
			ON comment.userid=user.userid 
			ORDER BY cid ASC LIMIT 5";

   	$res = mysqli_query($conn,$sql);
   	date_default_timezone_set('Asia/Dhaka');
   	$timezone = date_default_timezone_get();
   	$date = date('m/d/Y h:i:s a', time());

   	while($row = mysqli_fetch_array($res))
	{
   	 	$fname=$_SESSION["first_name"];
   	 	$lname=$_SESSION["last_name"];
   	 	$cdesc= $row["cdesc"];
   	 	$time= $row ["cdate"];

		echo 
		"<form class='form-horizontal' role='form' method='post'>
			<h4>$fname $lname</h4>
			<div><img src='data: base64, ".$row['image']."'/></div>
			<h5>$desc</h5>
			<h6 class='col-md-3 pull-left'>$type</h6><h6 class='col-md-9 pull-right'>$time</h6>
			<div class='input-group'>
				<input class='form-control col-md-12' placeholder='Write your comments...' name='cmt_msg' id='cmt_msg'>
				<div class='input-group-addon'>
					<label class='glyphicon glyphicon-camera cmt_icon'><input type='file' style='display: none;'>
				</div>
			</div>
        </form>";
	}
?>