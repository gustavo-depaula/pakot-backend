<?php
	function createPackage($request,$email){
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

		// insert in logged user the package id created
		$user = getUser($email);		
		if(count($user->packages)==0)
			$packageIds = $package->getId();
		else
			$packageIds = $user->packages . ';' . $package->getId();

		$sql = "UPDATE commonuser SET packages='$packageIds' WHERE email='$email'";
		$conn->query($sql);
		$conn->close();

	    return $package;		
	}
?>