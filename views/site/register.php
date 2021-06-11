<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.css">
    <link rel="icon" type="image/png" href="/OnlineStore/views/img/la_lakers.png">
</head>
<body background="/OnlineStore/views/img/la_lakers.png" ">
<form class="register-container" action="<?php echo APPLICATION_PATH ?>index.php" method="post">
    <section class="logo">
        <h1>LA Lakers Fan Shop</h1>
        <h6>Welcome</h6>
    </section>
    <section class="register">
        <label>Username</label> <input name="username" placeholder="Username" autocomplete="off"> <br>
        <label>First Name</label> <input name="first_name" placeholder="First Name" autocomplete="off"> <br>
        <label>Last Name</label> <input name="last_name" placeholder="Last Name" autocomplete="off"> <br>
        <label>Password</label> <input type="password" name="password" placeholder="Password" autocomplete="off"> <br>
        <input type="submit" name="sign_up" value="Sign Up" class="sign_up-btn">
        <a href="<?php echo APPLICATION_PATH ?>index.php?login=true" class="have-a-registration">Alredy have a registration?</a>
    </section>
</form>
</body>
</html>