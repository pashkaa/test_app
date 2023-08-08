<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $path = 'uploads/' . time() . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path);

    mysqli_query($connect, "INSERT INTO `products` (`id`, `name`, `description`, `price`, `photo`, `is_active`) VALUES (NULL, '$name', '$description', '$price', '$path', '1')");

    header('Location: ../index.php?page=0');

?>