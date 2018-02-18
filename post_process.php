<?php
	include 'config.php';
	if(empty($_SESSION))
		session_start();
	
	$uid =$_SESSION["userid"];
	$fname=$_SESSION["first_name"];
	$lname=$_SESSION["last_name"];
	$post=$_POST['post_msg'];
	$type=$_POST['type'];
	$file_type='';
	$file='';
	$data='';
	$content='';

	if(isset($_FILES['file_upload']))
	{
		$file=$_FILES['file_upload']['tmp_name'];
		$data=file_get_contents($file);
		$file_type=$_FILES['file_upload']['type'];		
		$content=base64_encode($data);
	}

	date_default_timezone_set('Asia/Dhaka');
   	$timezone = date_default_timezone_get();
   	$date = date('Y-m-d H:i:s', time());
	
	$sql="Insert into `post`(`userid`, `description`, `type`, `post_date`, `image`, `image_type`) values ('$uid', '$post', '$type', '$date', '$content', '$file_type')";
	if (mysqli_query($conn, $sql)) 
	{
		header('Location: post.php');
	}
	else
	{
		header('Location: index.php');
	}
?>