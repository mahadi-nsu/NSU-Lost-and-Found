<?php 
 	include 'config.php';
?>
<style type="text/css">
	body
	{
		margin-top: 50px;
	}
	.navbar
	{
		border-radius: 0px;
	}
	.affix
	{
		top: 50px;
		width:100%;
	}
	.navbar-form 
	{
	   padding-left: 0;
	}

	.navbar-collapse
	{
		padding-left:0; 
	}
</style>
</head>
<?php
	$val=$_SESSION['type'];
	if($val=='admin')
	{
		echo
		"<nav class='navbar navbar-inverse navbar-lower' role='navigation'>
			<div class='container'>
			<button class='navbar-toggle' data-toggle='collapse' data-target='.pagenav2'>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
	    	<div class='collapse navbar-collapse pagenav2'>
		      	<ul class='nav navbar-nav navbar-left'>
					<li><a href='create_admin.php'>Create Admin</a></li>
					<li><a href='user_list.php'>User List</a></li>
					<li><a href='ques.php'>Questions</a></li>
					<li><a href='post_list.php'>Post List</a></li>
				</ul>
	    	</div>
  		</div>
		</nav>
		";
	}
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="jquery-3.1.0.min.js" type="text/javascript"></script>
</body>
</html>