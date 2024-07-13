<?php include ('server.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Register</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="loginstyle.css">
    </head>

    <body>
        <div class = "portal">
        <div class ="header">
            <h2>Register</h2>
        </div>

        <form method="post" action="register.php">
            <?php include ('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div class="input-group">
                <label>E-mail</label>
                <input type="email" name="email">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>

            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>

            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>

            <p>
                Already a member ? <a href="login.php">Log in</a>
            </p>
        </form>
        </div>
    </body>
</html>