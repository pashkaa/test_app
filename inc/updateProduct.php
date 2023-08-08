<?php
    session_start();
    require_once 'connect.php';

    $idToUpdate = $_POST['idToUpdate'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $article = $_POST['article'];

    $path = 'uploads/' . time() . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path);

    mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `description` = '$description', `price` = '$price', `photo` = '$path', `article` = '$article' WHERE `products`.`id` = '$idToUpdate'");

    header('Location: ../adminPanel.php');

?>