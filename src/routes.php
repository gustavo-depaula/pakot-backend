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