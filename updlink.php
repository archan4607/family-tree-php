<?php
    session_start();
    include_once 'connection.php';
    error_reporting(E_ERROR | E_PARSE);

    $m=$_POST['male'];
    $f=$_POST['female'];
    $updatemale="insert into husband (user_id, husband_id) values('$f','$m')";
    $rsupdatemale=mysqli_query($con,$updatemale);
    $updfemale="insert into wife (user_id, wife_id) values('$m','$f')";
    $rsupdatemale=mysqli_query($con,$updfemale);
    header("location: link.php?s=1")
?>