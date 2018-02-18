<?php

	include 'config.php';
	if(empty($_SESSION))
		session_start();

	$uname= $_POST['username'];
	$sql= "SELECT * FROM `user` WHERE (`username`) = ('$uname')" ;
	$res = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($res);

	if($count==1)
	{
		while($row_query = mysqli_fetch_array($res)) 
    	{   
    		$temp=$_POST['password'];    
			if($row_query['password'] == MD5($temp))
	        {		
				$_SESSION['password'] = $_POST['password'];
	            $_SESSION['username'] = $_POST['username'];
	            $_SESSION['first_name']=$row_query['first_name'];
	            $_SESSION['last_name']=$row_query['last_name'];
				$_SESSION['nsuid']=$row_query['nsuid'];
				$_SESSION['userid']=$row_query['userid'];
				$_SESSION['type']=$row_query['type'];

				header("Location: home.php");
	        } 
	        else
	        { 
	        	header('Location: login.php');
	        }
    	}
	}
	else
	{	echo "Invalid username";
		header('Location: login.php');
	}
?>