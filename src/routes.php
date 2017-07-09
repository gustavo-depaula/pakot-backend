<?php
// Routes

$app->post('/package/create',function ($request, $response, $args) {
	require 'pakot\functions\package\CreatePackage.php';

	$package = createPackage($request);

	return $package->toJson();
});