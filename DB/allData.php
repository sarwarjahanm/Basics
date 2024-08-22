<?php
	include 'dbconnect.php';
	$showError = false;	
	$cond = false;
	
?>


<!doctype html> 
	
<html> 
<head>
<title>All Data</title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>


<script>
function mainpage() {
  location.replace("http://localhost:81/Basics/DB/Main.html")
}
</script>

<body style="background-image: url(http://localhost:81/Basics/DB/img/show.png); background-position: center"> <button onclick="mainpage()">Main Page</button><br/>
	
<div style="text-align:center;"> 
<img src="Logo.png" height=150 width=150/>
<h2>All User Details</h2>
<?php 
		
		if($cond == false){
		$sql = "SELECT * from dbdemo"; 		
		$result = mysqli_query($conn, $sql);
		
		
			if (mysqli_num_rows($result) > 0) {
				$cond = true;
			} 
			else {
				$showError = "Aww snap! No Data found!";
			}		
		}

	if($cond == true){
		
	  echo '<table style="border: 1px solid black;margin-left:auto;margin-right:auto; "> 
				<tr style="border: 1px solid black;">
					<th style="border: 1px solid black;">First Name</th>
					<th style="border: 1px solid black;">Last Name</th>
					<th style="border: 1px solid black;">Phone #</th>
				</tr>';
            while ($details = mysqli_fetch_array(
                        $result,MYSQLI_ASSOC)):; 
            
			echo '<tr style="border: 1px solid black;">
					<td style="border: 1px solid black;">'.$details["fname"].'</td>
					<td style="border: 1px solid black;">'.$details["lname"].'</td>
					<td style="border: 1px solid black;">'.$details["phone"].'</td>
				  </tr>'; 
      
            endwhile; 
			
      echo '</table>';
	  
	}
	  
if($showError) { 
	
		echo ' <div style="text-align:center;" class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
		<strong>'.$showError.'</strong>';
}

?>
</div>
</body> 
</html> 
