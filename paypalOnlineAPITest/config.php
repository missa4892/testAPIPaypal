<?php
$currency = '$'; //Currency sumbol or code

//db settings
$db_username = 'testpaypal';
$db_password = 'Paypal2015#';
$db_name = 'testpaypal';
$db_host = 'testpaypal.db.11948890.hostedresource.com';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

//paypal settings
$PayPalMode 			= 'sandbox';
$PayPalApiUsername 		= 'm_issa_4892-facilitator_api1.hotmail.com'; //PayPal API Username
$PayPalApiPassword 		= '5BF6M67CVVR4U489'; //Paypal API password
$PayPalApiSignature 	= 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-AbgltXiu2BgDZgJ0b2KzKxDbBu5c'; //Paypal API Signature
$PayPalCurrencyCode 	= 'SGD'; 
$PayPalReturnURL 		= 'http://roboticsfest.com/paypalOnlineAPITest/paypal-express-checkout/process.php';
$PayPalCancelURL 		= 'http://roboticsfest.com/paypalOnlineAPITest/paypal-express-checkout/cancel_url.php'; //Cancel URL if user clicks cancel

?>