<?php
session_start();
    // if(isset($_SESSION['last_id'])){
        unset($_SESSION['last_id']);
        header('Location: index.php');
    // }
?>