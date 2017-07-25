<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/users/User.php';

	function checkUser($request){
		$name = $request['name'];
		$email = $request['email'];

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$sql = "SELECT * FROM commonuser";
		$result = $conn->query($sql);

	    while($row = $result->fetch_assoc()) {
			if($row['email'] == $email){
				$row = (object) $row;
				$conn->close();
				session_start();
				$_SESSION['currentUser'] = $row;
				return 'dataFound';
			}
	    }
		$conn->close();
		return 'requireSignUp';
	}

?>