<?php
	require 'C:\xampp\htdocs\src\pakot\classes\Package.php';

	function getOpenPackages(){
		$conn = new mysqli("localhost", "admin","123456", "PakotDatabase");

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