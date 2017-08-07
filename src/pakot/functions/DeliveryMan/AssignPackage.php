<?php
function assignPackage($email,$id){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	$sql = "SELECT * FROM deliveryman";
	$result = $conn->query($sql);

	$deliveryMan = new stdClass();

	while($row = $result->fetch_assoc()) {
		if($row['email'] == $email)
			$deliveryMan = (object) $row;
	}
	$packages = $deliveryMan->packages . $id . ";";

	$sql = "UPDATE deliveryman SET packages='$packages' WHERE email='$email'";
	$conn->query($sql);
	$conn->close();
	return "Success";
}
?>