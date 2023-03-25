<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php echo $_SESSION['success'] ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php echo $_SESSION['error'] ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required>
        <br>
        <label for="password">Password</label>
        <input type="text" name="password" placeholder="Password" required>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>

    <a href="register.php">Go to register page</a>

</body>

</html>
<?php
    if(isset($_SESSION['success']) || isset($_SESSION['error'])){
        session_destroy();
    }
?>