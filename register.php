<?php
    session_start();
    if (isset($_SESSION['user'])){
        header('Location: ./index.php?page=0');
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
    <title>Register into Application</title>
</head>
<body>
    
    <form action="./inc/signUp.php" method="post">
        <label>Full name</label>
        <input type="text" name="full_name" placeholder="Input your full name">
        <label>Login</label>
        <input type="text" name="login" placeholder="Input your login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Input your password">
        <label>Confirmation of password</label>
        <input type="password" name="password_confirm" placeholder="Input your password">
        <button type="submit">Register</button>
        <p>You have an account? - <a href="./login.php">Log in!</a></p>
        <?php 
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>