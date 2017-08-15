<?php
	function createPackage($request,$email){
		$nickname = $request['nickname'];
		$description = $request['description'];
		$priority = $request['priority'];
		$size = $request['size'];
		$weight = $request['weight'];
		$origin = $request['origin'];
		$destination = $request['destination'];
		$price = calculatePrice($request)->price; 	

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('d/m/Y', time());

	    $package = new Package($nickname,$description,$priority,$size,$weight,$origin,$destination,$date,$price);

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "INSERT INTO packages (nickname,description,priority,size,weight,origin,destination,assigned,dispatched,arrived,canceled,dateCreate,price)
		VALUES ('$nickname','$description','$priority','$size','$weight','$origin','$destination','false','false','false','false,'$date',$price)";
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
	function calculatePrice($request){
		$price = 0;
		$priority = $request['priority'];		
		$distance = $request['distance'];
		$size = $request['size'];
		$weight = $request['weight'];

		// priority
		if($priority == 0)
			$price += 16 + ($distance * 1.3);
		else if($priority == 1)
			$price += 12 + ($distance * 1.1);			
		else if($priority == 2)
			$price += 6 + ($distance * 0.8);			

		// size
		if($size == 4)
			$price += 3.5;
		else if($size == 5)
			$price += 5;			
		else if($size == 6)
			$price += 10;

		// weight
		if($weight == 2)
			$price += 3;
		else if($weight == 3)
			$price += 3.5;			
		else if($weight == 4)
			$price += 5;					
		else if($weight == 5)
			$price += 10;			
		else if($weight == 6)
			$price += 25;

		$obj = new stdClass;
		$obj->price = $price;
		return $obj;
	}
?>