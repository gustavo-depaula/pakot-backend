<?php
// Routes

$app->post('/package/create',function ($request, $response, $args) {
	require 'pakot\functions\package\CreatePackage.php';

	$package = createPackage($request);
	return $package->toJson();
});

$app->post('/package/getopen',function ($request, $response, $args) {
	require 'pakot\functions\package\GetOpenPackages.php';

	$packages = getOpenPackages();
	return json_encode($packages);
});

$app->post('/package/getpackage/{id}',function ($request, $response, $args) {
	require 'pakot\functions\package\GetPackage.php';

	$package = getPackageById($args['id']);
	return json_encode($package);
});

$app->post('/login/User',function ($request, $response, $args){
	require 'pakot\functions\login\UserLog.php';

	$user = checkUser($request);

	return json_encode($user);

});

$app->post('/login/DeliveryMan',function ($request, $response, $args){
	/*require '';
	if()*/
});
