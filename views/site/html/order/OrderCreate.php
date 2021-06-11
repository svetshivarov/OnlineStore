<?php

$message_sent = false;
if(isset($_POST['email']) && $_POST['email'] != '') {

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        //submit the form
        $name = $_POST['person_name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $prd_name = $_POST['prd_name'];
        $quantity = $_POST['quantity'];

        $to = "svetlinshivarov@abv.bg";
        $to_client = $email;
        $subject = "New Order";
        $body = "";

        $body .= "From :".$name. "\r\n";
        $body .= "Product Name :".$prd_name. "\r\n";
        $body .= "City :".$city. "\r\n";
        $body .= "Address :".$address. "\r\n";
        $body .= "Email :".$email. "\r\n";
        $body .= "Quantity".$quantity. "\r\n";

        mail($to,$to_client,$subject,$body);

        if($message_sent = true) {
            echo "<p class='order-successful'><i>Thank you! The product will be shipped to you in a couple of days.</i></p>";
        }
    }
}

echo "
<html>
<head>
    <title>Order</title>
    <link rel='stylesheet' type='text/css' href='/OnlineStore/views/css/style.css'>
</head>
<div class='orders-container'>
<form action='" . APPLICATION_PATH . "index.php?controller=orders&action=create' method='post' enctype='multipart/form-data'>
<h3>Order Details</h3>
    <label>Product Name</label>
    <input type='text' name='prd_name' placeholder='Product Name' required><br>
    <label>Quantity</label>
    <input type='number' name='quantity' placeholder='Quantity' required><br>
    <label>Size</label>
    <select id='prd_size' name='prd_size' required>
        <option value='S'>S</option>
        <option value='M'>M</option>
        <option value='L'>L</option>
        <option value='XL'>XL</option>
        <option value='XXL'>XXL</option>
  </select> <br>
    <label>Email</label>
    <input type='email' name='email' placeholder='Email' required><br>
    <label>First and Last Name</label>
    <input type='text' name='person_name' placeholder='Your Name' required><br>
    <label>City</label>
    <input type='text' name='city' placeholder='City' required><br>
    <label>Address</label>
    <input type='text' name='address' placeholder='Address' required><br>
    <button name='create' value='true' onclick='OrderAlert()' class='product_order-btn'>Submit Order</button>
</form>
</div>
</html>

<script>

        function OrderAlert() {
            var submit_alert;
            if (confirm('Confirm the order?')) {
                submit_alert = 'Successfully ordered';
            } else {
                submit_alert = 'Error in ordering!';
            }
            document.getElementsByClassName('product_order-btn').innerHTML = submit_alert;
        }
    </script>
";

?>
<!---->
<!-- Тук идеята е след натискане на бутона Order Now! да се препраща към форма с данни за поръчката, като името на продукта вече да е въведено.-->
<!-- Крайната цена ще  се пресмята в зависимост от броя поръчени продукти.-->
<!-- След попълване на данните и натискне на бутона Order ще се появява страница с вече попълнените данни за поръчка, като ще има възможност за ъпдейт на данните, ако са сгрешени-->
<!--След направата на поръчката ще се изпраща имейл-->