<?php
session_start();
    include_once 'connection.php';
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $gender=$_GET['gender'];
    $num=$_GET['num'];
    $email=$_GET['email'];
    $dob=$_GET['dob'];
    
    if($gender=="Male")
    {
        $gen=1;
    }else if($gender=="Female"){
        $gen=2;
    }else{
        echo "value not exists";
    }
    $dobnew = date('Y-m-d', strtotime($dob));

    $inst="INSERT INTO user(u_fname, u_lname, gender, mobile, email, dob) VALUES ('$fname', '$lname', '$gen', '$num', '$email', '$dob')";
    $res=mysqli_query($con,$inst);
    $last_id = mysqli_insert_id($con);
    $_SESSION['last_id']=$last_id;
    if($res){
        // echo "Data inserted successfully";
        header("Location: index.php?reg=success");
    }else{
    //     echo $fname;
    //     echo $lname."<br>";
    //     echo $email."<br>";
    //     echo $num."<br>";
    //     echo $gen."<br>";
        echo "Data not inserted";
    }
?>
