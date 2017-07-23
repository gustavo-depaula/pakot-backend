<?php
// Routes

require 'const.php';



$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->post('/package/create',function ($request, $response, $args) {
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/CreatePackage.php';

	$request = $request->getParsedBody();

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