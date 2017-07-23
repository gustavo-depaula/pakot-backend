<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/Package.php';

	function createPackage($request){
		$nickname = $request['nickname'];
		$description = $request['description'];
		$priority = $request['priority'];
		$size = $request['size'];
		$weight = $request['weight'];
		$origin = $request['origin'];
		$destination = $request['destination'];

	    $package = new Package($nickname,$description,$priority,$size,$weight,$origin,$destination);

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "INSERT INTO packages (nickname,description,priority,size,weight,origin,destination)
		VALUES ('$nickname','$description','$priority','$size','$weight','$origin','$destination')";
		$conn->query($sql);
		$package->setId($conn->insert_id);
		$conn->close();

	    return $package;		
	}
?>