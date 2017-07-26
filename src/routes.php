<?php
// Routes

require 'const.php';
ob_start();  

if(!isset($_SESSION))
    session_start();

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

$app->post('/login/User',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$_SESSION['currentUserEmail'] = $request['email'];
	// if user exists -> return 'dataFound'
	// else -> return 'requireSignUp'
	return json_encode(checkUser($_SESSION['currentUserEmail']));
});

$app->post('/login/SignUp',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$_SESSION['currentUserEmail'] = $request['email'];
	return signUp($request);
});

$app->get('/User/getData',function ($request, $response, $args){
	if(isset($_SESSION["currentUserEmail"])){
		$data = getUserData($_SESSION['currentUserEmail']);
		return json_encode($data);
	}
	else
		return 'noUserLogged';
});

$app->post('/User/getData',function ($request, $response, $args){
	if(isset($_SESSION["currentUserEmail"])){
		$data = getUserData($_SESSION['currentUserEmail']);
		return json_encode($data);
	}
	else
		return 'noUserLogged';
});

$app->post('/User/update',function ($request, $response, $args){
	// if data is updated, a new user object is returned
	if(isset($_SESSION["currentUserEmail"])){
		$request = $request->getParsedBody();
 		return json_encode(updateUserData($request,$_SESSION['currentUserEmail']));
	}
	else
		return 'noUserLogged';
});

$app->post('/logoff/User',function ($request, $response, $args){
	unset($_SESSION["currentUserEmail"]);
	session_destroy();
	return 'LoggedOut';
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