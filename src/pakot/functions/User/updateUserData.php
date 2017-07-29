<?php
	function updateUserData($request, $email){
		$name = $request['name'];
		$cpf = $request['cpf'];
		$phone = $request['phone'];
		$payment = $request['payment'];

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "UPDATE commonuser SET name='$name', cpf='$cpf', phone='$phone', payment='$payment' WHERE email='$email'";
		$conn->query($sql);
		$conn->close();
		return new User($name,$email,$phone,$payment,$cpf);
	}

?>