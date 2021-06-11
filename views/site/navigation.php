<?php
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.css">
    <link rel="icon" type="image/png" href="/OnlineStore/views/img/la_lakers.png">
<!--<link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.scss">-->
</head>
<body>
<nav>
    <ul class="nav nav-pills">
        <section class="logo">
            <a href="<?php echo APPLICATION_PATH ?>">
                <img src="/OnlineStore/views/img/la_lakers.png" class="background_image-nav">
<!--                <h1>Online Store</h1>-->
            </a>
        </section>

        <li class="nav-item"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?php echo APPLICATION_PATH?>index.php?controller=products&action=listAll">Products</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?controller=products&action=listAll">ALL</a>
                <a class="dropdown-item" href="index.php?controller=tshirts&action=listAll">T-Shirts and Jerseys</a>
                <a class="dropdown-item" href="index.php?controller=shorts&action=listAll">Shorts and Pants</a>
                <a class="dropdown-item" href="index.php?controller=hats&action=listAll">Hats and Caps</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?php echo APPLICATION_PATH?>index.php?controller=about&action=listAll">About</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo APPLICATION_PATH?>index.php?controller=contacts&action=listAll">Contacts</a></li>
        <?php
        echo "<li>
                    <form action='" . APPLICATION_PATH . "index.php?login=true' method='post'>
                        <input type='submit' value='Login' class='login-btn'";
        echo (!empty($_SESSION["uid"])) ? "Logout" : "Login";
        echo "'>
                    </form>
                </li>";
        ?>
    </ul>
</nav>
</body>
</html>
