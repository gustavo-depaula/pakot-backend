<?php
	function checkDeliveryMan($email){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$sql = "SELECT * FROM deliveryman";
		$result = $conn->query($sql);

	    while($row = $result->fetch_assoc()){
			if($row['email'] == $email){
				$row = (object) $row;
				$conn->close();
				return 'LoginSuccess';
			}
	    }
		$conn->close();
		return 'requireSignUp';
	}

?>