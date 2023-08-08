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

    if (isset($product) && $product["is_active"] > 0) {     
    } else {
        header('Location: pageNotFound.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/productOrder.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lora&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;1,100;1,200;1,300;1,500;1,700&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <title>Order a Product in Application</title>
</head>
<body>
    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section">
        <form class="orderForm">
            <label>Your Name</label>
            <input maxlength="50" type="text" name="nameCustomer" placeholder="Enter your name">
            <label>Your telephone number</label>
            <input maxlength="50" type="number" name="telephoneNumber" placeholder="Enter your telephone number" value="380">
            <label>Comment:</label>
            <textarea type="text" name="comment" maxlength="120" placeholder="You can leave a comment"></textarea>
            <div class="orderButtons">
                <button class="goBackButton">Go Back</button>
                <button class="submitButton">Make Order</button>
            </div>
            <p class="msg none">Lorem ipsum.</p>
        </form>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>
    
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/main.js"></script>

</body>
</html>