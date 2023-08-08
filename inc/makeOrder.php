<?php
    session_start();
    require_once 'connect.php';

    $nameCustomer = $_POST['nameCustomer'];
    $telephoneNumber = $_POST['telephoneNumber'];
    $comment = $_POST['comment'];
    $idOfProduct = $_POST['idOfProduct'];
    
    $error_fields = [];

    if ($nameCustomer === '') {
        $error_fields[] = 'nameCustomer';
    }
    
    if ($telephoneNumber === '' || strlen($telephoneNumber) < 10) {
        $error_fields[] = 'telephoneNumber';
    }

    if (!is_numeric($telephoneNumber)) {
        $error_fields[] = 'telephoneNumber';
    }

    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Please check your input data",
            "fields" => $error_fields
        ];
    
        echo json_encode($response);
    
        die();
    } else {
        mysqli_query($connect, "INSERT INTO `orders` (`id`, `nameCustomer`, `telephoneNumber`, `comment`, `orderStatus`, `idOfProduct`) VALUES (NULL, '$nameCustomer', '$telephoneNumber', '$comment', 'Новий', '$idOfProduct')");
        $response = [
            "status" => true,
            "message" => "Order was completed successfully",
        ];
        echo json_encode($response);
    }
    
?>