<?php
	include 'dbconnect.php';
	$showError = false;	
	$cond = false;
	
?>


<!doctype html> 
	
<html> 
<head>
<title>Update Data</title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>


<script>
function mainpage() {
  location.replace("http://localhost:81/Basics/DB/Main.html")
}
</script>

<body style="background-image: url(http://localhost:81/Basics/DB/img/db.png); background-position: center"> <button onclick="mainpage()">Main Page</button><br/>
	
<div style="text-align:center;"> 
<img src="Logo.png" height=150 width=150/>
<h2>Update Details</h2>
<?php 
	
	if($cond == false){
		$sql = "SELECT * from dbdemo"; 		
		$result = mysqli_query($conn, $sql);
		
		
			if (mysqli_num_rows($result) > 0) {
				$cond = true;
			} 
			else {
				$showError = "Aww snap! No Data found!";
				$cond = false;
			}		
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$cond = false;
		if($cond == false){
		$sql = "SELECT * from dbdemo"; 		
		$result = mysqli_query($conn, $sql);
		
		
			if (mysqli_num_rows($result) > 0) {
				$cond = true;
			} 
			else {
				$showError = "Aww snap! No Data found!";
				$cond = false;
			}		
		}
		
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$phone = $_POST["phone"];

		if($fname == '' && $lname == '' && $phone == ''){
			$showError = "All inputs are required and cannot be blank!";				
		}
		else{
				$sql = "UPDATE `dbdemo` SET fname='".$fname."', lname='".$lname."' WHERE phone='".$phone."'";  		
				$result = mysqli_query($conn, $sql);
				$count = mysqli_affected_rows($conn);
				
				if ($count > 0) {
					$showError = "Records updated";
				}
				else {
					$showError = "Entered Phone# not present in Database, so no updation happened.";
				}				
				
				$sql = "SELECT * from dbdemo"; 		
				$result = mysqli_query($conn, $sql);
		
			}
}
	
	  echo '<br/> Enter Phone# whose details to be updated and provide other details which will update.<br/><br/>';
	  echo '<form name="updateUser" action="http://localhost:81/Basics/DB/updateData.php" method="POST">
			Phone <input type="text" name="phone">
			Fname <input type="text" name="fname">
			Lname <input type="text" name="lname"><br/><br/>';
	  echo '<input type="submit" value="Update Data"></pre><br/><br/></form> ';

if($showError) { 
	
		echo ' <div style="text-align:center;" class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
		<strong>'.$showError.'</strong><br/>';
}

	if($cond == true){
		
	  echo '<br/><table style="border: 1px solid black;margin-left:auto;margin-right:auto; "> 
				<tr style="border: 1px solid black;">
					<th style="border: 1px solid black;">Phone #</th>
					<th style="border: 1px solid black;">First Name</th>
					<th style="border: 1px solid black;">Last Name</th>
				</tr>';
            while ($details = mysqli_fetch_array(
                        $result,MYSQLI_ASSOC)):; 
            
			echo '<tr style="border: 1px solid black;">
					<td style="border: 1px solid black;">'.$details["phone"].'</td>
					<td style="border: 1px solid black;">'.$details["fname"].'</td>
					<td style="border: 1px solid black;">'.$details["lname"].'</td>
				  </tr>'; 
      
            endwhile; 
			
      echo '</table>';
	  
	}
	  

?>
</div>
</body> 
</html> 
