<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }

    $idOfProduct = $_GET["idOfProduct"];
    $nameCustomer = $_GET["nameCustomer"];
    $telephoneNumber = $_GET["telephoneNumber"];
    $comment = $_GET["comment"];

    $connect = mysqli_connect('localhost', 'root', '', 'test_app');
    if($connect->connect_error){
        die("Error: " . $connect->connect_error);
    }

   $sql = "SELECT * FROM `orders` WHERE (idOfProduct = '$idOfProduct' AND nameCustomer = '$nameCustomer' AND telephoneNumber = '$telephoneNumber' AND comment = '$comment')";

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
    <title>Thanks Page in Application</title>
</head>
<body>
    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section thanks">
        <div class="thanksContainer">
            <h2>Thank You for an order!</h2>
            <p>Thank you for your application. Application number <?php echo $product["id"]; ?>, please wait, within
The manager will contact you within 24 hours.</p>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>
    
</body>
</html>