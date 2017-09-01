<?php
	function updateDeliveryManWallet($email,$value){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "UPDATE deliveryman SET wallet=$value WHERE email='$email'";
		$conn->query($sql);
		$conn->close();
		return 'Done';
	}
?>