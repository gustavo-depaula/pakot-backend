<?php
	require 'C:\xampp\htdocs\src\pakot\classes\Package.php';

	function getPackageById($id){
		$conn = new mysqli("localhost", "admin","123456", "PakotDatabase");

		$sql = "SELECT * FROM packages";
		$result = $conn->query($sql);
	
	    while($row = $result->fetch_assoc()) {
			if($row['id'] == $id)		
				$package = $row;	 
	    }
		$conn->close();
		return $package;
	}
?>