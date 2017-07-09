<?php
	require 'C:\xampp\htdocs\src\pakot\classes\Package.php';

	function getOpenPackages(){
		$servername = "localhost";
		$username = "admin";
		$password = "123456";
		$dbname = "PakotDatabase";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM packages";
		$result = $conn->query($sql);
	
		$openPackages = [];			 
	    while($row = $result->fetch_assoc()) {
			if(!$row['assigned'])		
				array_push($openPackages,$row);
	    }
		$conn->close();	
		return $openPackages;
	}
?>