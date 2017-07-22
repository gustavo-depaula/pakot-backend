<?php
	require $_SERVER['DOCUMENT_ROOT']. '/src/pakot/classes/Package.php';

	function getOpenPackages(){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

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