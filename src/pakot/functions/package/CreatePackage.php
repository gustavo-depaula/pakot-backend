<?php
	function createPackage($request,$email){
		$nickname = $request['nickname'];
		$description = $request['description'];
		$priority = $request['priority'];
		$size = $request['size'];
		$weight = $request['weight'];
		$origin = $request['origin'];
		$destination = $request['destination'];
		 	
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('d/m/Y', time());

	    $package = new Package($nickname,$description,$priority,$size,$weight,$origin,$destination,$date);

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "INSERT INTO packages (nickname,description,priority,size,weight,origin,destination,assigned,dispatched,arrived,dateCreate)
		VALUES ('$nickname','$description','$priority','$size','$weight','$origin','$destination','false','false','false','$date')";
		$conn->query($sql);
		$package->setId($conn->insert_id);

		// insert in logged user the package id created
		$user = getUser($email);	
		if(sizeof($user->packages)==0)
			$packageIds = $package->getId();
		else
			$packageIds = $user->packages . ';' . $package->getId();

		$sql = "UPDATE commonuser SET packages='$packageIds' WHERE email='$email'";
		$conn->query($sql);
		$conn->close();

	    return $package;		
	}
?>