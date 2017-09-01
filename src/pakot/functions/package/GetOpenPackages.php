<?php
	function getOpenPackages(){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$sql = "SELECT * FROM packages";
		$result = $conn->query($sql);
	
		$openPackages = [];			 
	    while($row = $result->fetch_assoc()) {
			if($row['assigned'] == "false")	{
				$row['price'] = intval($row['price']) * DELIVERYMANPERCENTAGE;
				array_push($openPackages,$row);

			}
	    }
		$conn->close();	
		return $openPackages;
	}
?>