<?php
	//create connection
	$connect=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//check connection 
	if(mysqli_connect_errno()){

		//connection failed
		echo "Failed to connect MYSQL".mysqli_connect_errno();
	}