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
    
        $sql = "SELECT * FROM `products` WHERE `id` = '$idToUpdate'";

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
    <title>Update Product Application</title>
</head>
<body>

    <div class="header">
        <?php include './inc/header.php';?>
    </div>

    <section class="main_section">
        <div class="mainPart">
            <form action="./inc/updateProduct.php" method="post" enctype="multipart/form-data">
                <label>Update 
                    <span style="text-decoration: underline;">
                        <?php echo $product["name"] ?>
                    </span>
                </label>
                <input type="hidden" value="<?php echo $product["id"] ?>" name="idToUpdate" />
                <input type="text" value="<?php echo $product["name"] ?>" name="name" placeholder="Update product name">
                <label>Update description</label>
                <input type="text" value="<?php echo $product["description"] ?>" name="description" placeholder="Update product description">
                <label>Update price</label>
                <input type="text" value="<?php echo $product["price"] ?>" name="price" placeholder="Update product price">
                <label>Update article</label>
                <input type="text" value="<?php echo $product["article"] ?>" name="article" placeholder="Update product article">
                <label>Update photo</label>
                <input type="file" name="photo" placeholder="Update product photo">
                <button type="submit">Update product</button>
            </form>
        </div>
    </section>

    <div class="footer">
        <?php include './inc/footer.php';?>
    </div>

</body>
</html>