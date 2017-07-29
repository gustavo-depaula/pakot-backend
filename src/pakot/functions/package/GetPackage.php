<?php
	function getPackageById($id){
		$package;
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$sql = "SELECT * FROM packages";
		$result = $conn->query($sql);
	
	    while($row = $result->fetch_assoc()) {
			if($row['id'] == $id){
				$package = $row;	 
				$conn->close();
				return $package;
			}		
	    }
	    return 'packageNotFound';
	}

	function getPackagebyStatus($email){
		// get the logged user packages ids
		$user = getUser($email);

		// get all the packages by ids
		$packagesIds = explode(";", $user->packages);

		$packages = [];
		for($i=1;$i<count($packagesIds);$i++){
			array_push($packages, getPackageById($packagesIds[$i]));
		}
		return $packages;
	}
?>