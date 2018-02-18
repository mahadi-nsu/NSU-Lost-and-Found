<!DOCTYPE html>
<html>
<head>
	<title>Register Panel| Lost and Found </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
	<link rel="stylesheet" type="text/css" href="css/lost_found.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script type="text/javascript">
		var error=0;
		function c1(v1)
		{
			if(v1.length<3 || v1.length>10)
			{
				document.getElementById('e1').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e1').innerHTML="<img src='images/r.png'>";
			}
		}
		function c2(v2)
		{
			if(v2.length<5 || v2.length>12)
			{
			
				document.getElementById('e2').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e2').innerHTML="<img src='images/r.png'>";
			}
		}
		function c3(v3)
		{
			if(v3.length<5 || v3.length>12)
			{
			
				document.getElementById('e3').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e3').innerHTML="<img src='images/r.png'>";
			}
		}
		function c4(v4)
		{
			if(v4.length<5 || v4.length>12)
			{
			
				document.getElementById('e4').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e4').innerHTML="<img src='images/r.png'>";
			}
		}
		function c5(v5)
		{
			if((document.getElementById('password').value)!=(document.getElementById('password1').value))
			{
				document.getElementById('e5').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e5').innerHTML="<img src='images/r.png'>";
			}
		}
		function c6(v6)
		{
			if(v6.length<=9)
			{
			
				document.getElementById('e6').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e6').innerHTML="<img src='images/r.png'>";
			}
		}
		function c7(v7)
		{
			if(v7.length<=6)
			{
			
				document.getElementById('e7').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e7').innerHTML="<img src='images/r.png'>";
			}
		}
		function c8(v8)
		{
			if(isNaN(v8) || v8.length!=11)
			{
			
				document.getElementById('e8').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e8').innerHTML="<img src='images/r.png'>";
			}
		}
		function c9(v9)
		{
			if(v9.value=="")
			{
			
				document.getElementById('e9').innerHTML="<img src='images/w.gif'>";
				error++;
			}
			else
			{
				document.getElementById('e9').innerHTML="<img src='images/r.png'>";
			}
		}
		
	</script>	
</head>

<body>
<center>	
	<div class="container">
    	<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form method="Post" action="register_process.php" name="login">
				<br>
				<br>
				<br>
				<h2>Register <small>. . . to find whats lost.</small></h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" onblur="c1(this.value)" required>
							<span id="e1">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" onblur="c2(this.value)" required>
							<span id="e2">
						</div>
					</div>			
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<input type="text" name="username" id="username" class="form-control input-lg" placeholder="UserName" tabindex="3" onblur="c3(this.value)" required>
						<span id="e3">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="4" onblur="c4(this.value)" required>
							<span id="e4">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password1" id="password1" class="form-control input-lg" placeholder="Confirm Password" tabindex="5" onblur="c5(this.value)" required>
							<span id="e5">
						</div>
					</div>
				</div>			
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<input type="text" name="nsuid" id="nsuid" class="form-control input-lg" placeholder="NSU ID" tabindex="6" onblur="c6(this.value)" required>
						<span id="e6">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="designation" id="designation" class="form-control input-lg" placeholder="Designation" tabindex="7" onblur="c7(this.value)" required>
							<span id="e7">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
	                        <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone" tabindex="8" onblur="c8(this.value)" required>
							<span id="e8">
						</div>
					</div>			
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<select class="form-control" data-style="btn-primary" name="type" onblur="c9(this.value)" required>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="stuff">Stuff</option>
                        </select>
                        <span id="e9">
					</div>
				</div>
				<hr class="colorgraph">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group" style="margin-left: 100px; margin-right: 100px;">
						<input type="submit" value="Register" class="btn btn-primary btn-block btn-lg"> 
					</div>
				</div>						
			</form>
		</div>
	</div>
</center>
</body>
</html>