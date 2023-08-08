<?php
    session_start();
    if (isset($_SESSION['user'])){
        header('Location: ./index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lora&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;1,100;1,200;1,300;1,500;1,700&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <title>Login into Application</title>
</head>
<body>
    
    <form action="./inc/signIn.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Input your login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Input your password">
        <button type="submit">Log in</button>
        <p>You don't have an account? - <a href="./register.php">Register!</a></p>
        <?php 
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>