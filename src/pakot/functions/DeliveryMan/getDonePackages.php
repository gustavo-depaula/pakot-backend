<?php
	function getDonePackages($email){
		// get the logged user packages ids
		$deliveryMan = getDeliveryManData($email);

		// get all the packages by ids
		$packagesIds = explode(";", $deliveryMan->packages);

		$packages = [];
		for($i=1;$i<count($packagesIds);$i++){
			$p = getPackageById($packagesIds[$i]);
			if($p->arrived){
				array_push($packages, getPackageById($packagesIds[$i]));
				$packages[$i-1]['flag']=false;
			}
		}
		return array_reverse($packages);
	}
?>