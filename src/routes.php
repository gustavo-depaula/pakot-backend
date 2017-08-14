<?php
// Routes

require 'const.php';

$app->post('/package/create',function ($request, $response, $args) {
	$request = $request->getParsedBody();
	$email = $request['email'];
	$package = createPackage($request,$email);
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

$app->post('/package/price',function ($request, $response, $args){
	// assign the price to package id and returns the price 
	$request = $request->getParsedBody();
	$price = calculatePrice($request);

	updatePrice($request['id'],$price->price);
	return json_encode($price);
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

$app->post('/login/DeliveryMan',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	// if deliveryMan exists -> return 'dataFound'
	// else -> return 'requireSignUp'
	return json_encode(checkDeliveryMan($email));
});

$app->post('/login/SignUpDeliveryMan',function ($request, $response, $args){
	$request = $request->getParsedBody();
	return signUpDeliveryMan($request);
});

$app->post('/DeliveryMan/getData',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getDeliveryManData($email);
	return json_encode($data);
});

$app->post('/DeliveryMan/getAssigned',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getAssignedPackages($email);
	return json_encode($data);
});

$app->post('/DeliveryMan/assignPackage',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$packageId = $request['id'];

	$param = array();
	$param['id'] = $packageId;
	$param['status'] = 'assigned';
	$param['value'] = 'true';

	updatePackageStatus($param);
	return json_encode(assignPackage($email,$packageId));
});

/* 	DEVELOPING ROUTES 
	DELETE IN PUBLISHED APP
*/

$app->get('/cleanAll',function ($request, $response, $args){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "DROP TABLE commonuser";
	$conn->query($sql);
	$sql = "CREATE TABLE `commonuser` (
		`name` text NOT NULL,
		`email` varchar(255) NOT NULL,
		`rating` text NOT NULL,
		`phone` text NOT NULL,
		`packages` text NOT NULL,
		`payment` text NOT NULL,
		`cpf` varchar(255) NOT NULL,
		`id` bigint(20) NOT NULL AUTO_INCREMENT,
		PRIMARY KEY (`id`),
		UNIQUE KEY `email` (`email`),
		UNIQUE KEY `cpf` (`cpf`)
		);";
	$conn->query($sql);

	$sql = "DROP TABLE packages";
	$conn->query($sql);
	$sql = "CREATE TABLE `packages` (
		`id` bigint(20) NOT NULL AUTO_INCREMENT,
		`nickname` text NOT NULL,
		`description` text NOT NULL,
		`priority` text NOT NULL,
		`size` text NOT NULL,
		`weight` text NOT NULL,
		`sender` text NOT NULL,
		`deliveryman` text NOT NULL,
		`price` text NOT NULL,
		`payment` text NOT NULL,
		`assigned` text NOT NULL,
		`dispatched` text NOT NULL,
		`arrived` text NOT NULL,
		`experienceRating` text NOT NULL,
		`origin` text NOT NULL,
		`destination` text NOT NULL,
		`datecreate` text NOT NULL,
		`dateassigned` text NOT NULL,
		`datedispatched` text NOT NULL,
		`datearrived` text NOT NULL,
		PRIMARY KEY (`id`)
		);";
	$conn->query($sql);
	$sql = "DROP TABLE deliveryman";
	$conn->query($sql);
	$sql = "CREATE TABLE `deliveryman` (
		`name` text NOT NULL,
		`email` varchar(255) NOT NULL,
		`rating` text NOT NULL,
		`phone` text NOT NULL,
		`packages` text NOT NULL,
		`cpf` varchar(255) NOT NULL,
		`id` bigint(20) NOT NULL AUTO_INCREMENT,
		PRIMARY KEY (`id`),
		UNIQUE KEY `email` (`email`),
		UNIQUE KEY `cpf` (`cpf`)
		);";
	$conn->query($sql);
	$conn->close();
	return "All tables cleaned";
});