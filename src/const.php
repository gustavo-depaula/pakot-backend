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
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/User/getEmails.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/User/updateUserWallet.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getDeliveryManData.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/AssignPackage.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getAssignedPackages.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getDonePackages.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getAllDeliveryManPackages.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getEmailsDeliveryMan.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/getGainData.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/DeliveryMan/updateDeliveryManWallet.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/wallet/getWallet.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/pakot/functions/mail/email.php';

	require $_SERVER['DOCUMENT_ROOT'] . '/src/phpmail/PHPMailerAutoload.php';

	define("DB_HOST", "us-cdbr-iron-east-03.cleardb.net:3306");
	define("DB_USER", "bd3294cb43e05c");
	define("DB_PASSWORD", "07b0f1c3");
	define("DB_NAME", "heroku_cacf46323b37948");

	define("DELIVERYMANPERCENTAGE",0.7);
	define("HTMLEMAILPATH",$_SERVER['DOCUMENT_ROOT'] . '/src/email.html');
?>