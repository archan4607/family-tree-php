<?php
    // global $con;
    $con=mysqli_connect("localhost","root","","newfamilytree");
    if(!isset($con)){
        echo "Connection Failed";
        die();
    }
?>