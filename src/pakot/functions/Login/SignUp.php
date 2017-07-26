<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/users/User.php';

	function signUp($request){
		$name = $request['name'];
		$email = $request['email'];
		$cpf = $request['cpf'];
		$phone = $request['phone'];
		$payment = $request['payment'];
		$rating = 'undefined';

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "INSERT INTO commonuser (name,cpf,rating,phone,payment)
		VALUES ('$name','$cpf','undefined','$phone','$payment')";
		$conn->query($sql);
		$conn->close();
	}

?>