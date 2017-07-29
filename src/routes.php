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
	$request = $request->getParsedBody();
	$package = createPackage($request);
	// package properties are private
	return $package->toJson();
});

$app->get('/package/getopen',function ($request, $response, $args) {
	$packages = getOpenPackages();
	return json_encode($packages);
});

$app->get('/package/getpackage/{id}',function ($request, $response, $args) {
	$package = getPackageById($args['id']);
	return json_encode($package);
});

$app->post('/package/getallpackages',function ($request, $response, $args) {
	$request = $request->getParsedBody();
	$email = $request['email'];
	$packages = getPackagebyStatus($request['email']);
	return json_encode($packages);
});


$app->post('/package/update/',function ($request, $response, $args) {
	$request = $request->getParsedBody();
	return json_encode(updatePackageStatus($request));
});

$app->post('/login/User',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	// if user exists -> return 'dataFound'
	// else -> return 'requireSignUp'
	return json_encode(checkUser($email));
});

$app->post('/login/SignUp',function ($request, $response, $args){
	$request = $request->getParsedBody();
	return signUp($request);
});

$app->post('/User/getData',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getUserData($email);
	return json_encode($data);
});

$app->post('/User/update',function ($request, $response, $args){
	// if data is updated, a new user object is returned
	$request = $request->getParsedBody();
	$email = $request['email'];
	return json_encode(updateUserData($request,$email));
});

$app->get('/',function ($request, $response, $args){
	return 'I am working!';
});

// TO DO
// calculo de preço a partir de distancia

// pegar pacotes passados de um cliente
// pegar pacotes em aberto de um cliente
// pegar pacotes em andamento de um cliente


$app->post('/login/DeliveryMan',function ($request, $response, $args){
	/*require '';
	if()*/
});