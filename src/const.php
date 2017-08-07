<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/users/User.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/classes/Package.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/CreatePackage.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/GetOpenPackages.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/GetPackage.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/package/updatePackageStatus.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/Login/UserLog.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/Login/SignUp.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/Login/DeliveryManLog.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/User/getUser.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/User/getUserData.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/User/updateUserData.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getDeliveryManData.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/AssignPackage.php';

	define("DB_HOST", "us-cdbr-iron-east-03.cleardb.net:3306");
	define("DB_USER", "bd3294cb43e05c");
	define("DB_PASSWORD", "07b0f1c3");
	define("DB_NAME", "heroku_cacf46323b37948");
?>