Author: Saloni Kaur
Purpose: Paypal interview API test 

Flow of web app:
On the index page, there are a list of items retrieved from the database. Clicking on "Add to Cart" will add it into the shopping cart and it will be displayed in the shopping cart section of the page. This happens in cart_update.php which again retrieves the product from the database and includes it in the card only if it is not already there. PHP SESSIONS are used to transfer data from index.php to cart_update via POST. 

Next on the shopping cart section itself, once the user is done shopping, they can click "Checkout" which directs them to the view_cart.php page where all the items in the cart are shown as a confirmation before the user decides to click on paypal express checkout button to make the payment. 

Then the process.php page is called and the paypal api is used here to make the transaction. 

A paypal class for the environment set up for the sandbox mode and HttpPost requests was required to be set up. --> paypal.class.php
With this class, a POST request is sent to the Paypal server API with account details and transaction details. Upon successful request, PayPal sends a token key.

There are three API operations for Paypal Express Checkout. They were called in the following order.
1) SetExpressCheckout: This mainly includes the variables to be shown to the user on the paypal page. It includes specifying the ReturnUrl and the CancelUrl along other details of the payment like the additional taxes and shipping costs. 

After this we redirect the user to the paypal checkout website with the token received.

We then receive the payer id.

2) DoExpressCheckoutPayment: This is called to receive the payment from the user. This does a verification of the variables sent to paypal before the payment transaction is done.

After which the SUCCESS message is shown to the user and further info is given. 

3) GetExpressCheckoutDetails: This provides the customer's transaction details to be stored by the website. In this case, I have displayed all on the page instead of saving them to the database. This is received using the token received by Paypal earlier.