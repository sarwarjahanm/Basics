
<!doctype html> 
<title>Insert Data</title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<?php 
	 
$exists=false; 
	
if($_SERVER["REQUEST_METHOD"] == "POST") { 
	 
	include 'dbconnect.php'; 
	
	$username = $_POST["username"]; 
	$password = $_POST["password"]; 
	$backpage = $_GET["from"];
			
	$sql2 = "Select * from plaintext";
	$sql3 = "INSERT INTO `plaintext` ( `username`,`password`) VALUES ('$username','$password')";
	
	
	
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
function insertjs() {
  location.replace("http://localhost:81/Basics/cryptography/Plaintext.html")
}
</script>
	
<body> 

<div style="text-align:center;">

	<h2>Data Insertion Successful. Below are all data:</h2><br/>
	
<?php 

	  echo '<table style="border: 1px solid black;margin-left:auto;margin-right:auto; "> 
				<tr style="border: 1px solid black;">
					<th style="border: 1px solid black;">Username</th>
					<th style="border: 1px solid black;">Password</th>
				</tr>';
            while ($info = mysqli_fetch_array(
                        $result2,MYSQLI_ASSOC)):; 
            
			echo '<tr style="border: 1px solid black;">
					<td style="border: 1px solid black;">'.$info["username"].'</td>
					<td style="border: 1px solid black;">'.$info["password"].'</td>
					
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

