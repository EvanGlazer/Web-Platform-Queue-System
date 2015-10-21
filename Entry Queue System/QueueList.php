<?php
    require 'init.php';
	require 'inactivity.js';
	require 'QueueUpdate.php';
	
	// ECHOS QUEUE NUMBER BASED ON ID COUNT
	
	
	// QUEUE LIST CHECKS ONLINE COUNT AND LETS NEXT AVAILABLE GUEST IN 
	// BASED ON ORDER OF IP AND ID ASSIGNED IN TABLE
	// REMOVES FROM TABLE WITH QUEUE UPDATE
	
	
	function waitTime()
	{
		$Queue = mysql_query("SELECT * FROM QueueList", $connection);
		$num_rows = mysql_num_rows($result);
		
		$case1 = 1 < num_rows < 10;
		$case2 = 11 < num_rows < 20;
		$case3 = 21 < num_rows < 30;	
		$case4 = 31 < num_rows < 40;	
		
		switch (num_rows > 0)
		
		{
			case $case1:
				{
					echo "Wait time is is approx. 1 minute";
				}
			case $case2:
				{
					echo "Wait time is is approx. 3 minute";
				}
			case $case3:
				{
					echo "Wait time is is approx. 5 minute";
				}
			case $case4:
				{
					echo "Wait time is is approx. 7 minute";
				}
			default:
				{
					header("Location: http://www.weeblet.com/main.php");  
					exit();	
				}
			
		}
		
		function retrieveCurrent()
		{
			
			ob_start();
			$retrieve = ob_get_contents(init.php);			
			
			return $retrieve;
		}
		
		
		function QueueUsers()
		{
			
			$maxClient = 500;
			$current = retrieveCurrent();
			$user = "Select ID,IP FROM QueueList";
			$usersToEnter = ($maxClient - $current);
			while($current < $maxClient)
			{
				
				$current = mysqli_query($connection, $user);
		
				if (mysql_num_rows($current) > 0)
					{
						$user = mysqli_fetch_assoc($current);
						for($i = 0; $i>$usersToEnter; $i++)
							for($j = 0; $j>$usersToEnter; $j++)
								{
									$user[i] + $user[j];
									QueueUpdate();
									header("Location: http://www.weeblet.com/main.php");  
								}
				
			}

			}
			$connection->close();

		}

	}

?>