<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }
    $page = $_GET['page'];
    $count = 20;
    $connect = mysqli_connect('localhost', 'root', '', 'test_app');
    if($connect->connect_error){
        die("Error: " . $connect->connect_error);
    }
    $sql = "SELECT * FROM `products` WHERE `is_active` = '1'";
    if($result = $connect->query($sql)){
        $rowsCount = $result->num_rows;
        $products = array();
        foreach($result as $row){
            $products[] = $row;
        }
    }
    $result->free();
    $page_count = ceil(count($products) / $count);
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
    <title>Test Application</title>
</head>
<body>
    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section">

    <div class="all_products">
        <div class="products_container">
        <?php
                for($i = $page*$count; $i < ($page+1)*$count && $i < count($products); $i++){
                    if ($products[$i]["id"] != NULL) {
                    echo "<div class='product'>";
                        echo "<img class='productImage' src='". $products[$i]["photo"] . "'>";
                        echo "<p class='productName'>" . $products[$i]["name"] . "</p>";
                        echo "<p class='productDescription'>" . $products[$i]["description"] . "</p>";
                        echo "<p class='productPrice'>" . $products[$i]["price"] . "$</p>";
                        echo "<div class='buttonsProduct'>
                                    <a href='./detailsOfProduct.php?id=" . $products[$i]["id"] . "'>
                                        <button class='productDetailsButton'>View details</button>
                                    </a>";
                        echo "<a href='./productOrder.php?id=" . $products[$i]["id"] . "'><button class='productOrderButton'>Make an order</button></a>";
                        echo "</div>";
                    echo "</div>";
                    }
            }
        ?>
        </div>
    </div>
    <div class="page_list">
            <?php for($p = 0; $p < $page_count; $p++): ?>
                <a href="?page=<?php echo $p ; ?>"><button class="pageButton"><?php echo $p + 1; ?></button></a>
            <?php endfor; ?>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>
    
</body>
</html>