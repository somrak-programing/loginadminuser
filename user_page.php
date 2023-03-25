<?php
    session_start();

    if(!$_SESSION['userid']){
        header("location: index.php");
    } else {

   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Member Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>You are Member.</h1>
        <h3>Hi, <?php echo $_SESSION['user']; ?></h3>
        <p><a href="logout.php">Logout</a></p>





        <script src="" async defer></script>
    </body>
</html>


<?php } ?>