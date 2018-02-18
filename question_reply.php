 <?php 
 	include 'config.php';
 	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Questions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
</head>
<body class="pgbody">
	<div class="container searchpg">  
    	<h2 align="center">Questions</h2>
        <?php
        	if (isset($_REQUEST['email']))
			{
			$qid = $_POST['qid'];
			$message = $_REQUEST['message'];
			$to = $_REQUEST['email'] ;
			$message = $_REQUEST['message'] ;
			$reply = $_REQUEST['reply'];
			$from =$_SESSION['first_name'];
			
			//mail($to,"***Question***<br>".$message."<br>***Answer***<br>".$reply, "From: $from" );
				
			mysqli_query($conn,"DELETE FROM contact WHERE qid = '".$qid."'" ); 
			mysqli_close($conn);
			
			echo "<h2 style='color:#428bca;'><center>Your message is sent</center></h2><br/>";
			echo 
				"<form action='ques.php' method='post'>
					<div align='center' class='row'><input type='submit' class='btn btn-primary' value='View More Message' /></div>
				</form><br/>";
			echo 
				"<form action='home.php' method='post'>
					<div align='center'class='row'><input type='submit' class='btn btn-primary' value='Go Home' /></div>
				</form>";	
		}
		else
		{
			echo "<h2 style='color:#428bca;'><center>Sorry an error occured!<center></h2><br/>";
			echo 
				"<form action='ques.php' method='post'>
					<div align='center' class='row'><input type='submit' class='btn btn-primary' value='View More Message' /></div>
				</form><br/>";
			echo 
				"<form action='home.php' method='post'>
					<div align='center' class='row'><input type='submit' class='btn btn-primary' value='Go Home' /></div>
				</form>";	
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