<?php
	function getUserData($email){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$sql = "SELECT * FROM commonuser";
		$result = $conn->query($sql);

	    while($row = $result->fetch_assoc()) {
			if($row['email'] == $email){
				$row = (object) $row;
				$conn->close();
				return $row;
			}
	    }
		$conn->close();
		return 'noDataFound';
	}

?>