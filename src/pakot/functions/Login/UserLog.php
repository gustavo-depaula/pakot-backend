<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/users/User.php';

	function checkUser($request){
		$name = $request->getParam('name');
		$email = $request->getParam('email');

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

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
		return 'requireSignUp';
	}

?>