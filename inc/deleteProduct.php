<?php
    session_start();
    require_once 'connect.php';

    $idOfOrder = $_POST['idOfOrder'];

    mysqli_query($connect, "DELETE FROM `products` WHERE `ID` = '$idOfOrder'");

    $response = [
        "status" => true
    ];
    echo json_encode($response);
?>