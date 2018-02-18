<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nsu Lost and Found</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
					<div class="navbar-form navbar-left">
						<div class="input-group">
			      			<span class="input-group-btn">
			    				<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
			  				</span>
			      			<input type="text" class="form-control" placeholder="Search for...">
		    			</div>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="#">Lost Items</a></li>
						<li><a href="#">Found Items</a></li>
						<li><a href="#">Search Items</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container coverpage">
		<div class="row">
			<div class="jumbotron pgcover">
				<h1>Lost and Found</h1> 
				<p>Help others to find their lost belongings and also find yours </p> 
			</div>
		</div>
	</div>
	<div class="container pagecon">
		<div class="col-md-3 sidebar">
		</div>
		<div class="col-md-8 col-md-offset-1 content">
			<div class="input-group col-md-7 col-md-offset-2 searchbox searchfor">
      			<input type="text" class="form-control" placeholder="Search for...">
  				<span class="input-group-btn">
    				<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
  				</span>
    		</div>
    		<div class="col-md-10 col-md-offset-1">
	           <div class="table-responsive searchtable">
            		<table class="table table-striped table-hover">
            			<thead>
							<tr>
								<strong><label><th>Item Name</th></label></strong>
								<strong><label><th>Type</th></label></strong>
								<strong><label><th>Post By</th></label></strong>
							</tr>
						</thead>
            		</table>
            	</div>
            </div>
		</div>
	</div>
	<div class="container pgfooter">
		<div class="row">
			<div class="col-md-9">
				<p class="navbar-text pull-left">Copyright nsu lost and found forum</p>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>