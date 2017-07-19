<?php
	require 'C:\xampp\htdocs\src\pakot\classes\users\User.php';

	function createUser($request){
		$newUser = new User($request->getParam('name'),$request->getParam('email'),$request->getParam('phone'));
		$newUser->new = true;
		return $newUser;
	}

	function checkUser($request){
		$name = $request->getParam('name');
		$email = $request->getParam('email');

		$conn = new mysqli("localhost", "admin","123456", "PakotDatabase");

		$sql = "SELECT * FROM commonuser";
		$result = $conn->query($sql);

	    while($row = $result->fetch_assoc()) {
			if($row['Email'] == $email){
				$row = (object) $row;
				$row->new = false;
				$conn->close();
				return $row;
			}
	    }

		$conn->close();
		return createUser($request);
	}

?>