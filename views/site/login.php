<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/OnlineStore/views/css/style.css">
    <link rel="icon" type="image/png" href="/OnlineStore/views/img/la_lakers.png">
</head>
<body background="/OnlineStore/views/img/la_lakers.png">
<form class="login-container" action=<?php echo APPLICATION_PATH ?> method="post">
    <section class="logo">
        <h1>Online Store</h1>
        <h6>Login</h6>
    </section>
    <section class="login">
        <label for="uname">Username:</label>
        <input name="username" placeholder="Username" autocomplete="off">
        <br>
        <label for="pswd">Password:</label>
        <input type="password" name="password" placeholder="Password" autocomplete="off">
        <br>
        <input type="submit" value="Login" class="login-btn"/>
        <a href="<?php echo APPLICATION_PATH ?>index.php?register=true" class="have-a-registration">No registration?</a>
    </section>
</form>
</body>
</html>