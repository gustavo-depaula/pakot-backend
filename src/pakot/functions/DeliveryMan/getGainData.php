<?php
function getGains($email){
	$packages = getDonePackages($email);
	
	$total = 0;
	$assigned = 0;
	$dispatched = 0;
	$arrived = 0;
	$canceled = 0;

	$gains = new stdClass();
	
	$array = [];
	for($i=0;$i<count($packages);$i++){
		if($packages[$i]['assigned']=="true")
			$assigned++;
		if($packages[$i]['dispatched']=="true")
			$dispatched++;
		if($packages[$i]['arrived']=="true")
			$arrived++;
		if($packages[$i]['canceled']=="true")
			$canceled++;

		$obj = new stdClass();
		$obj->id = $packages[$i]['id'];
		$obj->priceWithCut = intval($packages[$i]['price'] * DELIVERYMANPERCENTAGE);	
		array_push($array,$obj);
		
		$total += $packages[$i]['price'] * DELIVERYMANPERCENTAGE;
	}

	$obj = new stdClass();
	$obj->assigned = $assigned;
	$obj->dispatched = $dispatched;
	$obj->arrived = $arrived;
	$obj->canceled = $canceled;

	$gains->valuePerId = $array;
	$gains->qtPerStatus= $obj;

	if(count($packages) == 0)
		$gains->averagePerPackage = 0;
	else
		$gains->averagePerPackage = intval($total/count($packages));
	$gains->totalWon = intval($total);

	return $gains;
}

?>