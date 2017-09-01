<?php
function getUserWallet($email){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	$sql = "SELECT wallet FROM commonuser";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$obj = new stdClass();
		$obj->wallet = $row['wallet'];		
		$conn->close();
		return $obj;
	}
	$conn->close();
	return 'noDataFound';
}

function getDeliveryManWallet($email){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	$sql = "SELECT wallet FROM deliveryman";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$obj = new stdClass();
		$obj->wallet = $row['wallet'];		
		$conn->close();
		return $obj;
	}
	$conn->close();
	return 'noDataFound';
}
?>