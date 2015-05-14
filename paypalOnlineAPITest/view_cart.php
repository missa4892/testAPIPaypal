<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paypal API Test</title>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="style/style.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div class="col-md-2"></div>
	<div class="col-md-8">
	 <h1>View Cart</h1>
	 <div class="view-cart">
	 	<?php
	    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		if(isset($_SESSION["products"]))
	    {
		    $total = 0;
			echo '<form method="post" action="paypal-express-checkout/process.php">';
			echo '<ul>';
			$cart_items = 0;
			foreach ($_SESSION["products"] as $cart_itm)
	        {
	           $product_code = $cart_itm["code"];
			   $results = $mysqli->query("SELECT * FROM products WHERE product_code='$product_code' LIMIT 1");
			   $obj = $results->fetch_object();
			   
			    echo '<li class="cart-itm">';
				echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
				echo '<div class="p-price">'.$currency.$obj->price.'</div>';
	            echo '<div class="product-info">';
				echo '<h5>'.$obj->product_name.' (Code :'.$product_code.')</h5> ';
	            echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'" style="height:100px;width:100px;border-style: solid;border-width: 4px;"></div>';
	            echo '<div><p>'.$obj->product_desc.'<p></div>';
				echo '</div>';
	            echo '</li>';
				$subtotal = ($cart_itm["price"]);
				$total = ($total + $subtotal);

				echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->product_name.'" />';
				echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
				echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->product_desc.'" />';
				echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
				$cart_items ++;
				
	        }
	    	echo '</ul>';
			echo '<span class="check-out-txt">';
			echo '<strong>Total : '.$currency.$total.'</strong>  ';
			echo '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif">';
			echo '</span>';
			echo '<img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_37x23.gif" align="left" style="margin-right:7px;"><span style="font-size:11px; font-family: Arial, Verdana;">The safer, easier way to pay.</span>';
			echo '</form>';
			
	    }else{
			echo 'Your Cart is empty';
		}
		
	    ?>
	    </div>
	</div>
	 <div class="col-md-2"></div>
</body>
</html>
