<?php

    $connect = mysqli_connect('localhost', 'root', '', 'test_app');

    if (!$connect) {
        die('Connection to database error.');
    }

?>