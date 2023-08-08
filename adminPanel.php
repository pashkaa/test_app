<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }
    if ($_SESSION['user']['is_admin'] > 0){
        $connect = mysqli_connect('localhost', 'root', '', 'test_app');
        if($connect->connect_error){
            die("Error: " . $connect->connect_error);
        }

        if (isset($_GET["orderStatus"]))
            $orderStatus = $_GET["orderStatus"];

        if (isset($orderStatus)) {
            $sql = "SELECT * FROM `orders` WHERE `orderStatus` = '$orderStatus'";
        } else {
            $sql = "SELECT * FROM `orders`";
        }
    
        $sql2 = "SELECT * FROM `products`";

        if($products = $connect->query($sql2)){
            $rowsCount = $products->num_rows;
        }
    
        if($orders = $connect->query($sql)){
            $rowsCount = $orders->num_rows;
        }
    } else {
        header('Location: ./index.php?page=0');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/adminPanelStyles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lora&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;1,100;1,200;1,300;1,500;1,700&family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <title>Admin Panel of Application</title>
</head>
<body>
    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="ordersSection">
        <a href="./addProduct.php">
            <button class="buttonCreate">Add product</button>
        </a>
        <div class="listOfOrders">
            <div class="allOrders">
                <div class="leftChoise">
                        <button class="getOrders">Orders</button>
                        <div class="statusButtons none">
                            <button id="Новий" class="rightStatusButtons">Новий</button>
                            <button id="Обробляється" class="rightStatusButtons">Обробляється</button>
                            <button id="Готовий до доставки" class="rightStatusButtons">Готовий до доставки</button>
                            <button id="Доставляється" class="rightStatusButtons">Доставляється</button>
                            <button id="Доставлений" class="rightStatusButtons">Доставлений</button>
                            <button id="Завершений" class="rightStatusButtons">Завершений</button>
                            <button id="Скасований" class="rightStatusButtons">Скасований</button>
                        </div>
                        <button class="getProducts">Products</button>
                </div>
                <table class="contentTable ordersTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name of Customer</th>
                        <th>Telephone Number</th>
                        <th>Comment</th>
                        <th>Status of Order</th>
                        <th>Id of Product</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($orders as $row){
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td> " . $row["nameCustomer"] . "</td>
                                    <td> ". $row["telephoneNumber"] . "</td>
                                    <td class='commentTable'>". $row["comment"] . "</td>
                                    <td>". $row["orderStatus"] . "</td>
                                    <td>". $row["idOfProduct"] . "</td>
                                    <td>
                                        <button id='" . $row["id"] . "' class='deleteOrderButton'>Delete</button>
                                    </td>
                                    <td>
                                        <a href='./updateOrder.php?id=" . $row["id"] . "'>
                                            <button class='updateOrderButton'>Update</button>
                                        </a>
                                    </td>
                                </tr>";
                        }
                    ?>
                    </tbody>
                </table>
                <table class="contentTable productsTable none">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name of Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Is active</th>
                        <th>Article</th>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($products as $row){
                            echo "<tr>
                                    <td class='tableModel'>" . $row["id"] . "</td>
                                    <td> " . $row["name"] . "</td>
                                    <td class='commentTable'>". $row["description"] . "</td>
                                    <td class='commentTable'>". $row["price"] . "</td>
                                    <td>". $row["is_active"] . "</td>
                                    <td>". $row["article"] . "</td>
                                    <td>
                                        <img src='" . $row["photo"] . "' class='productImage'>
                                    </td>
                                    <td>
                                        <button id='" . $row["id"] . "' class='deleteProductButton'>Delete</button>
                                    </td>
                                    <td>
                                        <a href='./updateProduct.php?id=" . $row["id"] . "'>
                                            <button class='updateProductButton'>Update</button>
                                        </a>
                                    </td>
                                </tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>
</body>

<script src="./js/jquery-3.4.1.min.js"></script>
<script src="./js/main.js"></script>

</html>