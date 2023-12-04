<?php

    // $con = mysqli_connect('localhost', 'username', 'password', 'db_name');
    $con = mysqli_connect('localhost', 'root', '', "mystore");

    // if db_connection fail show this error
    if(!$con) {
        die(mysqli_error($con));
    }

?>