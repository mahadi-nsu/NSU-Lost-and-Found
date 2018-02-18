<?php
	include 'config.php';
	if(empty($_SESSION))
	session_start();
	
	$fname= $_POST['first_name'];
	$lname= $_POST['last_name'];
	$uname= $_POST['username'];
	$pass= $_POST['password'];
	$d= $_POST['designation'];
	$ns= $_POST['nsuid'];
	$phone= $_POST['phone'];
	$type= $_POST['type'];


	$sql="Insert into `user`(`first_name`, `last_name`, `username`, `password`, `designation`, `nsuid`, `phone`, `type`)  values ('$fname', '$lname', '$uname' , MD5('$pass'), '$d', '$ns', '$phone', '$type')";
	echo $sql;
	if(mysqli_query($conn, $sql))
	{
		header('Location: register_complete.php');
	}
	else
	{
		header('Location: register.php');
	}
?>