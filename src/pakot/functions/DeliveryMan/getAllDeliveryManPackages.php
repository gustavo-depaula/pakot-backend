<?php
function getAllDeliveryManPackages($email){
	$deliveryMan = getDeliveryManData($email);

	$packagesIds = explode(";", $deliveryMan->packages);

	$packages = [];
	for($i=0;$i<count($packagesIds);$i++){
		$p = getPackageById($packagesIds[$i]);
		if($p!="packageNotFound"){
			array_push($packages, getPackageById($packagesIds[$i]));
			$packages[count($packages)-1]['flag'] = false;
			$packages[count($packages)-1]['price'] = intval($packages[count($packages)-1]['price']);
			$packages[count($packages)-1]['deliveryCut'] = intval($packages[count($packages)-1]['price'] * DELIVERYMANPERCENTAGE);				
		}
	}
	return array_reverse($packages);
}
?>