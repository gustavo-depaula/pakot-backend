<?php
function getEmailsDeliveryMan(){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "SELECT email FROM deliveryman";
	$result = $conn->query($sql);
	$array = [];
	while($row = $result->fetch_assoc())
		array_push($array,$row['email']);


	$conn->close();
	return $array;
}
?>