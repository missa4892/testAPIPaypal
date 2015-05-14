<?php
$currency = '$'; //Currency sumbol or code

//db settings
$db_username = 'root';
$db_password = 'silversense123';
$db_name = 'testpaypal';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

//paypal settings
$PayPalMode 			= 'sandbox';
$PayPalApiUsername 		= 'm_issa_4892-facilitator_api1.hotmail.com'; //PayPal API Username
$PayPalApiPassword 		= '5BF6M67CVVR4U489'; //Paypal API password
$PayPalApiSignature 	= 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-AbgltXiu2BgDZgJ0b2KzKxDbBu5c'; //Paypal API Signature
$PayPalCurrencyCode 	= 'SGD'; 
$PayPalReturnURL 		= 'http://localhost/paypal-shopping-cart-example/paypal-express-checkout/process.php';
$PayPalCancelURL 		= 'http://localhost/paypal-shopping-cart-example/paypal-express-checkout/cancel_url.php'; //Cancel URL if user clicks cancel

?>