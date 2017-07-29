<?php
function updatePackageStatus($request){
	$id = $request['id'];
	$status = $request['status'];
	$value = $request['value'];

	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "UPDATE packages SET $status='$value' WHERE id='$id'";
	$conn->query($sql);
	$conn->close();
	return "Package-$id $status = $value";
}
?>