<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/errorPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lora&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;1,100;1,200;1,300;1,500;1,700&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <title>Page Not Found in Application</title>
</head>
<body>
    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section">
        <div class="errorContainer">
            <div class="errorContent">
                <h1>404</h1>
                <h4>Ooops! Page not found</h4>
                <p>The page you were looking doesn't exist, try another address.</p>
                <a href="./index.php?page=0">Back To Products</a>
            </div>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>
    
</body>
</html>