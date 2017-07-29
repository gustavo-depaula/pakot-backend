<?php

function getUser($email){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "SELECT * FROM commonuser";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		if($row['email'] == $email){
			$user = (object) $row;
			$conn->close();
			return $user;
		}
	}
	$conn->close();
	return 'undefined';
}

?>