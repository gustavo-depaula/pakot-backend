<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/users/Package.php';

	function createPackage($request){
		$nickname = $request->getParam('nickname');
		$description = $request->getParam('description');
		$priority = $request->getParam('priority');
		$size = $request->getParam('size');
		$weight = $request->getParam('weight');

	    $package = new Package($nickname,$description,$priority,$size,$weight);

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "INSERT INTO packages (nickname,description,priority,size,weight)
		VALUES ('$nickname','$description',$priority,'$size',$weight)";
		$conn->query($sql);
		$package->setId($conn->insert_id);
		$conn->close();

	    return $package;		
	}
?>