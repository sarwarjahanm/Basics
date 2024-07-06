
<!doctype html> 

<?php 
	 
$exists=false; 
	
if($_SERVER["REQUEST_METHOD"] == "POST") { 
	 
	include 'dbconnect.php'; 
	
	$fname = $_POST["fname"]; 
	$lname = $_POST["lname"]; 
	$address = $_POST["address"]; 
	$phone = $_POST["phone"];
	$backpage = $_GET["from"];
	
			
	$sql2 = "Select * from jsdemo";
	$sql3 = "INSERT INTO `jsdemo` ( `fname`, 
					`lname`,`address`,`phone`) VALUES ('$fname', 
					'$lname','$address','$phone')";
	
	
	
	$result3 = mysqli_query($conn, $sql3);
	$result2 = mysqli_query($conn, $sql2);
					 
}
	
?>
	
<html lang="en"> 

<head> 
	
	<!-- Required meta tags --> 
	<meta charset="utf-8"> 
	<meta name="viewport" content= 
		"width=device-width, initial-scale=1, 
		shrink-to-fit=no"> 
	
</head> 
	<script>
function insert() {
  location.replace("http://localhost:81/Basics/JS/withoutJS.html")
}
function insertjs() {
  location.replace("http://localhost:81/Basics/JS/withJS.html")
}
</script>
	
<body> 

<div style="text-align:center;">

	<h2>Data Insertion Successful. Below are all data:</h2><br/>
	
<?php 

	  echo '<table style="border: 1px solid black;margin-left:auto;margin-right:auto; "> 
				<tr style="border: 1px solid black;">
					<th style="border: 1px solid black;">First Name</th>
					<th style="border: 1px solid black;">Last Name</th>
					<th style="border: 1px solid black;">Phone</th>
					<th style="border: 1px solid black;">Address</th>
				</tr>';
            while ($info = mysqli_fetch_array(
                        $result2,MYSQLI_ASSOC)):; 
            
			echo '<tr style="border: 1px solid black;">
					<td style="border: 1px solid black;">'.$info["fname"].'</td>
					<td style="border: 1px solid black;">'.$info["lname"].'</td>
					<td style="border: 1px solid black;">'.$info["phone"].'</td>
					<td style="border: 1px solid black;">'.$info["address"].'</td>
					
				  </tr>'; 
      
            endwhile; 
			
      echo '</table>';
?>	
	
	
<?php 
if($backpage == 'withoutJS'){
	echo '<br/><button onclick="insert()">Go Back To Insert Page</button><br/><br/>';
}
else{
	echo '<br/><button onclick="insertjs()">Go Back To Insert Page</button><br/><br/>';
}
?>


</div> 
	
</body> 
</html> 

