<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }
    if ($_SESSION['user']['is_admin'] > 0){
                
    } else {
        header('Location: ./index.php?page=0.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/addProduct.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lora&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;1,100;1,200;1,300;1,500;1,700&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <title>Login into Application</title>
</head>
<body>

    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section">
        <div class="mainPart">
            <form action="./inc/addProduct.php" method="post" enctype="multipart/form-data">
                <label>Product name</label>
                <input type="text" name="name" placeholder="Input product name">
                <label>Product description</label>
                <input type="text" name="description" placeholder="Input product description">
                <label>Product price</label>
                <input type="text" name="price" placeholder="Input product price">
                <label>Product photo</label>
                <input type="file" name="photo" placeholder="Insert product photo">
                <button>Create product</button>
            </form>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>

</body>
</html>