 <?php 
 	include 'config.php';
 	session_start();
 	
 	$output = '';
 	$sql = "SELECT * FROM post WHERE description LIKE '%".$_POST["search"]."%'";  
 	$result = mysqli_query($conn, $sql);

 	if(mysqli_num_rows($result) > 0)  
 	{
 		$output .= '<h4 align="center">Search Result</h4>';
 		$output .= '<div class="table-responsive searchtable">
 						<table class="table table bordered">
 							<tr>
 								<th>Type</th>   
                                <th>Description</th>  
                                <th>Date</th>
                            </tr>';
        while($row = mysqli_fetch_array($result))
        {
        	$output .= 
        			'<tr>
        				<td>
        					<div><a href="process.php?id='.$row["pid"].'  ">'.$row["type"].'</a>
	                    	</div>
	                    </td>
	                    <td>
	                    	<div><a href="process.php?id='.$row["pid"].'  ">'.$row["description"].'</a>
	                     	</div>
	                    </td>
	                    <td>
	                    	<div><a href="process.php?id='.$row["pid"].'  ">'.$row["post_date"].'</a>
	                    	</div>
	                    </td>
                    </tr>';
        }
        echo $output;
	}
	else  
 	{
 		echo 'Data Not Found';
 	}   
 ?>