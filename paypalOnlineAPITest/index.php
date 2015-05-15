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
 
<div class="col-md-6">
    <h1>Products</h1>
    <div class="col-md-12" style="padding-left:0;">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'" style="height:100px;width:100px;border-style: solid;border-width: 4px;"></div>';
            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
            echo '<div class="product-info">';
			echo 'Price '.$currency.$obj->price. '   ';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<button class="add_to_cart">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
    ?>
    <h4>Disclaimer: All images are obtained from <a href="https://www.flickr.com/search/?q=clothing%20photos">Creative Commons</a>.</h4>
    <h4>Author: Saloni Kaur</h4>
    </div>
</div>


    
<div class="col-md-2">
    <h2>Your Shopping Cart</h2>
    <div class="shopping-cart">
        <?php
        if(isset($_SESSION["products"]))
        {
            $total = 0;
            echo '<ol>';
            foreach ($_SESSION["products"] as $cart_itm)
            {
                echo '<li class="cart-itm">';
                echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
                echo '<h3>'.$cart_itm["name"].'</h3>';
                echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
                echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
                echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
                echo '</li>';
                 $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                $total = ($total + $subtotal);
            }
            echo '</ol>';
            echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
        	echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
        }else{
            echo 'Your Cart is empty';
        }
        ?>
    </div>
</div>

    <div class="col-md-2"></div>

</body>
</html>
