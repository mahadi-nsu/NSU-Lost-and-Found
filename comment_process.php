<?php
	include 'config.php';
	if(empty($_SESSION))
		session_start();
	
	$uid =$_SESSION["userid"];
	$fname=$_SESSION["first_name"];
	$lname=$_SESSION["last_name"];
	$comment=$_POST['cmt_msg'];
	$pid=$_POST['txt_PID'];
	//$file_type='';
	//$file='';
	//$data='';
	//$content='';

	if(isset($_FILES['img_upload']))
	{
		$file=$_FILES['img_upload']['tmp_name'];
		$data=file_get_contents($file);
		$file_type=$_FILES['img_upload']['type'];		
		$content=base64_encode($data);
	}

	date_default_timezone_set('Asia/Dhaka');
   	$timezone = date_default_timezone_get();
   	$date = date('Y-m-d H:i:s', time());
	
	$sql="Insert into `comment`(`pid`, `userid`, `cdesc`, `cdate`, `cimage`, `cimg_type`) values ('$pid', '$uid', '$comment', '$date', '$content', '$file_type')";
	
	if (mysqli_query($conn, $sql)) 
	{
		header('Location: post.php');
	}
	else
	{
		header('Location: index.php');
	}
?>