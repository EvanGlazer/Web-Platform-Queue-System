<?php
    require 'init.php';
	require 'inactivity.js';
	require 'QueueList.php';
	
	// OUTPUT BUFFER 
	ob_start();
	
	$case1 =  online < 500;
	
	$online = ob_get_contents(init.php);
	switch($online != "ERROR")
	{
		
		case $case1:
		{
			header("Location: http://www.weeblet.com/main.php");  
			exit();
		
		}
		default:
		{
			ExceedGuests();
		}
		
	}
	
	function ExceedGuests()
	{
		
		// ENTER MYSQL AND INSERT IP AND RANDOM ID IN TABLE
		// THEN SEND TO QUEUE LIST
		
		$IP = getIP();
		$insert = "INSERT INTO QueueList($IP), VALUES (?)";
		
		if ($connection->query($insert) === TRUE) {
		    // successful
		} else {
		    echo "Error";
		}
		
	}
	
	function getIP()
	{
		$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
		return $ip;
	}
	
	$connection->close();
?>