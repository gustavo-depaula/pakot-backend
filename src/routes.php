<?php
// Routes
require 'const.php';

$app->post('/package/create',function ($request, $response, $args) {
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/CreatePackage.php';

	$package = createPackage($request);
	return $package->toJson();
});

$app->get('/package/getopen',function ($request, $response, $args) {
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/GetOpenPackages.php';

	$packages = getOpenPackages();
	return json_encode($packages);
});

$app->get('/package/getpackage/{id}',function ($request, $response, $args) {
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/GetPackage.php';

	$package = getPackageById($args['id']);
	return json_encode($package);
});

$app->post('/login/User',function ($request, $response, $args){
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/Login/UserLog.php';

	$user = checkUser($request);

	// if user exists -> return user info
	// else -> return flag to require sign up
	
	return json_encode($user);
});

$app->get('/',function ($request, $response, $args){
	return 'I am working!';
});

$app->post('/login/DeliveryMan',function ($request, $response, $args){
	/*require '';
	if()*/
});