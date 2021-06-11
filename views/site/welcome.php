<?php
require_once "navigation.php";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.css">
        <link rel="icon" type="image/png" href="/OnlineStore/views/img/la_lakers.png">

    </head>
    <body>
        <div class="welcome"><h1>Hello <?php if (!empty($_SESSION) && !empty($_SESSION["full_name"])) echo $_SESSION["full_name"];?></h1>
        <h3>Welcome to Los Angeles Lakers Fanshop!</h3>
            <p>
                Here you can find a variety of high-quality original T-Shirts, Jerseys, Shorts and Pants, and Hats and Caps <br>
                Have a nice shopping in our Online Fanshop!
            </p>
            <img class= 'lakers-img' src="/OnlineStore/views/img/la_lakers.png" <br>
        <h4>See our brand new clothes NOW!</h4>
        </div>

        <div class="shortcut-btns">
            <a class="button" href="index.php?controller=tshirts&action=listAll">T-Shirts and Jerseys</a>
            <a class="button" href="index.php?controller=shorts&action=listAll">Shorts and Pants</a>
            <a class="button" href="index.php?controller=hats&action=listAll">Caps and Hats</a>
        </div>

    </body>
    </html>
<?php
require_once "footer.php";
?>