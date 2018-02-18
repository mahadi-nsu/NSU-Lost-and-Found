<?php
	include 'config.php';
	if(empty($_SESSION))
	session_start();
	
	$name= $_POST['name'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$message= $_POST['message'];

	$sql="Insert into `contact`(`qid`, `name`, `email`, `phone`, `message`)  values ('','$name', '$email', '$phone', '$message')";

	if(mysqli_query($conn, $sql))
	{
		header('Location: index.php');
	}
	else
	{
		header('Location: register.php');
	}
?>