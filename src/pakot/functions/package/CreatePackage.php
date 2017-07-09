<?php
	require 'C:\xampp\htdocs\src\pakot\classes\Package.php';

	function createPackage($request){
		$nickname = $request->getParam('nickname');
		$description = $request->getParam('description');
		$priority = $request->getParam('priority');
		$size = $request->getParam('size');
		$weight = $request->getParam('weight');

	    $package = new Package($nickname,$description,$priority,$size,$weight);

	    $conn = new mysqli('localhost','admin','123456','PakotDatabase');
		$sql = "INSERT INTO packages (nickname,description,priority,size,weight)
		VALUES ('$nickname','$description',$priority,'$size',$weight)";
		$conn->query($sql);
		$package->setId($conn->insert_id);
		$conn->close();

	    return $package;		
	}
?>