<?php
function updatePackageStatus($request){
	$id = $request['id'];
	$status = $request['status'];
	$value = $request['value'];

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('d/m/Y', time());

	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "UPDATE packages SET $status='$value', date$status = '$date' WHERE id='$id'";
	$conn->query($sql);
	$conn->close();
	return "Package-$id $status = $value";
}
?>