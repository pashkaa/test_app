<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }

    $connect = mysqli_connect('localhost', 'root', '', 'test_app');
    if($connect->connect_error){
        die("Error: " . $connect->connect_error);
    }

    $idOfProduct = $_GET['id'];
    $sql = "SELECT * FROM `products` WHERE `id` = $idOfProduct";

    if($result = $connect->query($sql)){
        $rowsCount = $result->num_rows;
        foreach($result as $row){
            $product = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lora&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;1,100;1,200;1,300;1,500;1,700&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <title>Details of Product in Application</title>
</head>
<body>
    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section detailed_section">
        <?php 
            if (isset($product) && $product["is_active"] > 0) {
                echo "<div class='product detailedProduct'>";
                    echo "<img class='productImage' src='". $product["photo"] . "'>";
                    echo "<p class='productName'>" . $product["name"] . "</p>";
                    echo "<p class='productDescription'>" . $product["description"] . "<br>Артикул: " . $product["article"] . "</p>";
                    echo "<p class='productPrice'>" . $product["price"] . "$</p>";
                    echo "<div class='buttonsProduct'>";
                    echo "<a href='./productOrder.php?id=" . $product["id"] . "'><button class='productOrderButton'>Make an order</button></a>";
                    echo "</div>";
                echo "</div>";
                } else {
                    header('Location: pageNotFound.php');
                }
        ?>
    </section>

    <div class='goBackContainer'>
        <a href='./index.php?page=0'>
            <button class='productDetailsButton goBack'>Go back</button>
        </a>
    </div>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>
    
</body>
</html>