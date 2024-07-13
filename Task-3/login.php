<?php include ('server.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="loginstyle.css">
    </head>

    <body>
        <div class = "portal">
        <div class ="header">
            <h2>Login</h2>
        </div>

        <form method="post" action="login.php">
            <?php include ('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>

            <p>
                Not a member yet ? <a href="register.php">Sign in</a>
            </p>
        </form>
        </div>
    </body>
</html>