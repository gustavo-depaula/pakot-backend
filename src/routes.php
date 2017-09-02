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

$app->post('/package/update',function ($request, $response, $args) {
	$request = $request->getParsedBody();
	return json_encode(updatePackageStatus($request));
});

$app->post('/package/price',function ($request, $response, $args){
	// assign the price to package id and returns the price 
	$request = $request->getParsedBody();
	$email = $request['email'];
	$price = calculatePrice($request)->price;

	$wallet = getUserWallet($email)->wallet;

	$obj = new stdClass();
	$obj->p = $price;
	$obj->w = $wallet;
	if($price > $wallet){
		$obj->price = 'insufficient';
		return json_encode($obj);
	}
	else{
		$obj->price = $price;
		return json_encode($obj);
	}

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
	$email = $request['email'];
	sendEmail($email);

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

$app->post('/email',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];

	return sendEmail($email);
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
	$email = $request['email'];
	sendEmail($email);

	return signUpDeliveryMan($request);
});

$app->post('/DeliveryMan/getData',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getDeliveryManData($email);
	return json_encode($data);
});

$app->post('/DeliveryMan/getAll',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getAllDeliveryManPackages($email);
	return json_encode($data);
});

$app->post('/DeliveryMan/getAssigned',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getAssignedPackages($email);
	return json_encode($data);
});

$app->post('/DeliveryMan/getDone',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$data = getDonePackages($email);
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

$app->post('/DeliveryMan/getGainData',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];

	return json_encode(getGains($email));
});

$app->post('/User/emails',function ($request, $response, $args){
	$request = $request->getParsedBody();
	return json_encode(getEmails());
});

$app->post('/DeliveryMan/emails',function ($request, $response, $args){
	$request = $request->getParsedBody();
	return json_encode(getEmailsDeliveryMan());
});

$app->post('/User/updateWallet',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$value = $request['value'];
	return json_encode(updateUserWallet($email,$value));
});

$app->post('/DeliveryMan/updateWallet',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$value = $request['value'];
	return json_encode(updateDeliveryManWallet($email,$value));
});

$app->post('/User/getWallet',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	return json_encode(getUserWallet($email));
});

$app->post('/DeliveryMan/getWallet',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	return json_encode(getDeliveryManWallet($email));
});

$app->post('/DeliveryMan/done',function ($request, $response, $args){
	$request = $request->getParsedBody();
	$email = $request['email'];
	$id = $request['id'];

	//change status
	$obj = [];
	$obj['id'] = $id;
	$obj['status'] = 'arrived';
	$obj['value'] = 'true';
	updatePackageStatus($obj);

	$package = getPackageById($id);
	$price = $package['price'];
	$sender = $package['sender'];
	$priceWithCut = $price * DELIVERYMANPERCENTAGE;

	//do paymants for client and for deliveryMan
	updateUserWallet($sender,($price*-1));
	updateDeliveryManWallet($email,$priceWithCut);

	//store the pakot share in our account
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$pakotgain = $price - $priceWithCut;
	$sql = "UPDATE pakotgain SET wallet=$pakotgain WHERE id=2";
	$conn->query($sql);
	$conn->close();
	return 'Done';
});

$app->get('/pakotGains',function ($request, $response, $args){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	$sql = "SELECT wallet FROM pakotgain";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$conn->close();
		return $row['wallet'];
	}
});


/* 	DEVELOPING ROUTES 
	DELETE IN PUBLISHED APP
*/

$app->get('/cleanAll',function ($request, $response, $args){
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "TRUNCATE TABLE commonuser; ";
	$conn->query($sql);
	$sql ="TRUNCATE TABLE packages; ";
	$conn->query($sql);
	$sql ="TRUNCATE TABLE deliveryman; ";
	$conn->query($sql);
	$sql ="TRUNCATE TABLE pakotgain; ";
	$conn->query($sql);
	$sql ="INSERT INTO pakotgain(wallet) values (0);";
	$conn->query($sql);
	$conn->close();
	return "All tables cleaned";
});