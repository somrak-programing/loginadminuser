<?php
    session_start();
    require_once("connection.php");
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if($user['username'] === $username){
            echo "<script>alert('Username already exists')</script>";
        } else{
            // เข้ารหัส password
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, userlevel)
                    VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($conn, $query);

            if($result){
                $_SESSION['success'] = "Insert user sucessfully";
                header("location: index.php");
            }else{
                $_SESSION['error'] = "Somthing went wrong";
                header("Location: index.html");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter your username" required>
        <br>
        <label for="password">password</label>
        <input type="text" name="password" placeholder="Enter your password" required>
        <br>
        <label for="firstname">firstname</label>
        <input type="text" name="firstname" placeholder="Enter your firstname" required>
        <br>
        <label for="lastname">lastname</label>
        <input type="text" name="lastname" placeholder="Enter your lastname" required>
        <br>
        <input type="submit" name="submit" value="submit"> 
    </form>
    
    <a href="index.php">Go back to index.</a>
</body>
</html>