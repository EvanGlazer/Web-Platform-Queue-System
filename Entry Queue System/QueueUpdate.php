<?php
	
   require 'init.php';
   require 'inactivity.js';
   require 'QueueList.php';
   require 'QueueCheck.php';
   
   // UPDATES MYSQL BY DELETING ID AND IP FROM QUEUE LIST 
   // OR
   // WORKING WITH INACTIVITY.JS TO MINUS INACTIVE USERS FROM ONLINE COUNT
   
   function deleteQueue()
   {
   	return "DELETE from QueueList WHERE id, IP BETWEEN 0 AND $usersToEnter";
   }
   
   function updateActivity()
   {
	$update = "UPDATE online SET online= ' ' " .retrieveCurrent() - 1;
	
	if ($conn->query($update) === TRUE) 
	{
	    // successful
	} else {
	    // error
	}

	$connection->close();

   }
   
   function updateID()
   {
   	
	return 
	
	"CREATE TRIGGER update_ID AFTER DELETE on QueueList
	FOR EACH ROW
	BEGIN
	    UPDATE
	        QueueList
	    SET
	        QueueList.'ID' = QueueList.'ID' - 1
	    WHERE QueueList.'ID' > old.`ID`;
	END";
	
   }
   
   function QueueUpdate()
   {
		   	
	if ($usersToEnter > 0)
	{
		deleteQueue();
		updateID();
	}
	
	else 
	{
		// nothing
	}
	
   }

?>