<?php
function getAllDeliveryManPackages($email){
	$deliveryMan = getDeliveryManData($email);

	$packagesIds = explode(";", $deliveryMan->packages);

	$packages = [];
	for($i=1;$i<count($packagesIds);$i++){
		$p = getPackageById($packagesIds[$i]);
			array_push($packages, getPackageById($packagesIds[$i]));
			$packages[$i-1]['flag'] = false;
			$packages[$i-1]['price'] = intval($packages[$i-1]['price']);
			$packages[$i-1]['deliveryCut'] = $packages[$i-1]['price'] * DELIVERYMANPERCENTAGE;				
	}
	return array_reverse($packages);
}
?>