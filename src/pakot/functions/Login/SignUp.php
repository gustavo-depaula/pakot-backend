<?php
	function signUp($request){
		$name = $request['name'];
		$email = $request['email'];
		$cpf = $request['cpf'];
		$phone = $request['phone'];
		$payment = $request['payment'];

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "INSERT INTO commonuser (name,email,cpf,rating,phone,payment,packages)
		VALUES ('$name','$email','$cpf','undefined','$phone','$payment','undefined')";
		if ($conn->query($sql) === TRUE)
			return 'SignUpSuccess';
		else 
			return 'SignUpError';
		$conn->close();
	}

?>