<?php
		$servername = "localhost";
		$username = "angeline"; 
		$password = "Calona@22"; 
		$dbname = "mybook"; 

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {    
			die("Connection failed: " . $conn->connect_error);

		}
?> 
