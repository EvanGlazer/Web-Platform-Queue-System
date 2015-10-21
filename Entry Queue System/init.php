<?php
   
    $host = '';
	$username = '';
	$password = '';
	$database = '';
	
	$connection = mysqli_connect($host, $username, $password, $database);
    
	if($connection)
	{
		echo "ERROR";
		
	}
	
	else
	 {
	 	// SUCCESSFUL
		
		$online_count = "SELECT online FROM $database";
		$count = mysqli_query($connection, $online_count);
		
		if (mysql_num_rows($count) > 0)
			{
			
				while($row = mysqli_fetch_assoc($count)) {
				echo $row["online"];
				
				
			}
				
			
		$connection->close();
		
			}
	
	 }
?>
