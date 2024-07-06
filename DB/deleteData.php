<?php
	include 'dbconnect.php';
	$showError = false;	
	$cond = false;
	
?>


<!doctype html> 
	
<html> 


<script>
function mainpage() {
  location.replace("http://localhost:81/Basics/DB/Main.html")
}
function insert() {
  location.replace("http://localhost:81/Basics/DB/insertData.html")
}
</script>

<body> <button onclick="mainpage()">Main Page</button> <button onclick="insert()">Insert Data</button><br/>
	
<div style="text-align:center;"> 
<h2>Which User you want to Delete?</h2>
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
			$showError = "Enter atleast one input & click on Delete.";				
		}
		else{
				$sql = "DELETE from dbdemo WHERE fname='".$fname."' OR lname='".$lname."' OR phone='".$phone."'"; 		
				$result = mysqli_query($conn, $sql);
				$count = mysqli_affected_rows($conn);
				
				if ($count > 0) {
					$showError = "".$count." records deleted from database:";
				}
				else {
					$showError = "Entered User Details not present in Database, so no deletion happened.";
				}				
				
				$sql = "SELECT * from dbdemo"; 		
				$result = mysqli_query($conn, $sql);
		
			}
}
	
	  echo '<br/> Enter Fname or Lname or Phone# to delete the details.<br/><br/>';
	  echo '<form name="searchUser" action="http://localhost:81/Basics/DB/deleteData.php" method="POST">
			Fname <input type="text" name="fname">
			Lname <input type="text" name="lname">
			Phone <input type="text" name="phone"><br/><br/>';
	  echo '<input type="submit" value="Delete"></pre><br/><br/></form> ';

if($showError) { 
	
		echo ' <div style="text-align:center;" class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
		<strong>'.$showError.'</strong><br/>';
}

	if($cond == true){
		
	  echo '<br/><table style="border: 1px solid black;margin-left:auto;margin-right:auto; "> 
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
	  

?>
</div>
</body> 
</html> 
