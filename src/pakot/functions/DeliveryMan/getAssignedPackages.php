<?php
	function getAssignedPackages($email){
		// get the logged user packages ids
		$deliveryMan = getDeliveryManData($email);

		// get all the packages by ids
		$packagesIds = explode(";", $deliveryMan->packages);

		$packages = [];
		for($i=0;$i<count($packagesIds);$i++){
			$p = getPackageById($packagesIds[$i]);
			if($p!="packageNotFound"){
				if($p['arrived']){
					array_push($packages, getPackageById($packagesIds[$i]));
					$packages[count($packages)-1]['price'] = intval($packages[count($packages)-1]['price']);
					$packages[count($packages)-1]['flag']=false;
				}
			}
		}
		return array_reverse($packages);
	}
?>