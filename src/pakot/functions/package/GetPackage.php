<?php
	function getPackageById($id){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

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