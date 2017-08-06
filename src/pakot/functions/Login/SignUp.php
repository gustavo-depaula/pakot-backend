<?php
	function signUp($request){
		$name = $request['name'];
		$email = $request['email'];
		$cpf = $request['cpf'];
		$phone = $request['phone'];
		$payment = $request['payment'];
		
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$result = $conn->query("SELECT * FROM commonuser WHERE email = '$email'");
		if($result->num_rows>0)
			return 'emailAlreadySigned';

		$result = $conn->query("SELECT * FROM commonuser WHERE cpf = '$cpf'");
		if($result->num_rows>0)
			return 'cpfAlreadySigned';

		$sql = "INSERT INTO commonuser (name,email,cpf,rating,phone,payment,packages) VALUES ('$name','$email','$cpf','undefined','$phone','$payment','')";
		if ($conn->query($sql) === TRUE)
			return 'SignUpSuccess';
		else 
			return 'SignUpError';
		$conn->close();
	}

	function signUpDeliveryMan($request){
		$name = $request['name'];
		$email = $request['email'];
		$cpf = $request['cpf'];
		$phone = $request['phone'];
		
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$result = $conn->query("SELECT * FROM deliveryman WHERE email = '$email'");
		if($result->num_rows>0)
			return 'emailAlreadySigned';

		$result = $conn->query("SELECT * FROM deliveryman WHERE cpf = '$cpf'");
		if($result->num_rows>0)
			return 'cpfAlreadySigned';

		$sql = "INSERT INTO deliveryman (name,email,cpf,rating,phone,packages) VALUES ('$name','$email','$cpf','undefined','$phone','')";
		if ($conn->query($sql) === TRUE)
			return 'SignUpSuccess';
		else 
			return 'SignUpError';
		$conn->close();
	}
?>