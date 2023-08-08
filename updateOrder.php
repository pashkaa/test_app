<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ./login.php');
    }
    if ($_SESSION['user']['is_admin'] > 0){

        $idToUpdate = $_GET["id"];
        $connect = mysqli_connect('localhost', 'root', '', 'test_app');
        if($connect->connect_error){
            die("Error: " . $connect->connect_error);
        }
    
        $sql = "SELECT * FROM `orders` WHERE `id` = '$idToUpdate'";

        if($result = $connect->query($sql)){
            $rowsCount = $result->num_rows;
            foreach($result as $row){
                $product = $row;
            }
        }
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
    <title>Update Order in Application</title>
</head>
<body>

    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section">
        <div class="mainPart">
            <form action="./inc/updateOrder.php" method="post" enctype="multipart/form-data">
                <label class="updateMainLabel">Update Order With id 
                    <span style="text-decoration: underline;">
                        <?php echo $product["id"] ?>
                    </span>
                </label>
                <input type="hidden" value="<?php echo $product["id"] ?>" name="idToUpdate" />
                <label>Update name of Customer</label>
                <input type="text" value="<?php echo $product["nameCustomer"] ?>" name="nameCustomer" placeholder="Update name of Customer">
                <label>Update telephone number</label>
                <input type="text" value="<?php echo $product["telephoneNumber"] ?>" name="telephoneNumber" placeholder="Update telephone number">
                <label>Update comment</label>
                <input type="text" value="<?php echo $product["comment"] ?>" name="comment" placeholder="Update comment">
                <label>Update id of Product</label>
                <input type="text" value="<?php echo $product["idOfProduct"] ?>" name="idOfProduct" placeholder="Update id of Product">
                <label>Update Status of an order</label>
                <select name="orderStatus" id="color">
                    <option value="<?php echo $product["orderStatus"] ?>"><?php echo $product["orderStatus"] ?></option>
                    <option value="Обробляється">Обробляється</option>
                    <option value="Готовий до доставки">Готовий до доставки</option>
                    <option value="Доставляється">Доставляється</option>
                    <option value="Доставлений">Доставлений</option>
                    <option value="Завершений">Завершений</option>
                    <option value="Скасований">Скасований</option>
                </select>
                <button type="submit">Update order</button>
            </form>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>

</body>
</html>