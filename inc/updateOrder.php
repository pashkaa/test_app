<?php
    session_start();
    require_once 'connect.php';

    $idToUpdate = $_POST['idToUpdate'];
    $nameCustomer = $_POST['nameCustomer'];
    $telephoneNumber = $_POST['telephoneNumber'];
    $comment = $_POST['comment'];
    $idOfProduct = $_POST['idOfProduct'];
    $orderStatus = $_POST['orderStatus'];

    mysqli_query($connect, "UPDATE `orders` SET `nameCustomer` = '$nameCustomer', `telephoneNumber` = '$telephoneNumber', `comment` = '$comment', `idOfProduct` = '$idOfProduct', `orderStatus` = '$orderStatus' WHERE `orders`.`id` = '$idToUpdate'");

    header('Location: ../adminPanel.php');

?>