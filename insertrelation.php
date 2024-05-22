<?php
session_start();
    include_once 'connection.php';
    if(isset($_SESSION['last_id'])){
        $last_id=$_SESSION['last_id'];
        if(isset($_SESSION['merge_selmember'])){
            $set=$_SESSION['merge_selmember'];
            $unmerge_selmember=explode(" ",$_SESSION['merge_selmember']);
            foreach($unmerge_selmember as $i =>$key){
                $user[$key]=$_GET['user'.$key];
                $selrelation[$i]=$_GET['selrelation'.$i];

                $se="select * from user where user_id='$last_id'";
                $res=mysqli_query($con,$se);
                $feres=mysqli_fetch_assoc($res);
                // echo $feres['gender'];
                if($selrelation[$i]=="Father")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $instfather="INSERT INTO father (user_id, father_id) VALUES ('$last_id', '$user[$key]')";
                    $resfather=mysqli_query($con,$instfather);
                    if($feres['gender']==1){
                        echo "Male";
                        $instfather2="INSERT INTO son (user_id, son_id) VALUES ('$user[$key]','$last_id')";
                        $resfather2=mysqli_query($con,$instfather2);
                    }else if($feres['gender']==2){
                        echo "feMale";
                        $instfather2="INSERT INTO daughter (user_id, daughter_id) VALUES ('$user[$key]','$last_id')";
                        $resfather2=mysqli_query($con,$instfather2);
                    }
                    if($resfather){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Mother")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $instmother="INSERT INTO mother (user_id, mother_id) VALUES ('$last_id','$user[$key]')";
                    $resmother=mysqli_query($con,$instmother);
                    if($feres['gender']==1){
                        echo "Male";
                        $instfather2="INSERT INTO son (user_id, son_id) VALUES ('$user[$key]','$last_id')";
                        $resfather2=mysqli_query($con,$instfather2);
                    }else if($feres['gender']==2){
                        echo "feMale";
                        $instfather2="INSERT INTO daughter (user_id, daughter_id) VALUES ('$user[$key]','$last_id')";
                        $resfather2=mysqli_query($con,$instfather2);
                    }
                    if($resmother){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Son")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $instson="INSERT INTO son (user_id, son_id) VALUES ('$last_id','$user[$key]')";
                    $resson=mysqli_query($con,$instson);
                    if($feres['gender']==1){
                        echo "Male";
                        $instfather2="INSERT INTO father (user_id,father_id) VALUES ('$user[$key]','$last_id')";
                        $resfather2=mysqli_query($con,$instfather2);
                    }else if($feres['gender']==2){
                        echo "feMale";
                        $instmother2="INSERT INTO mother (user_id, mother_id) VALUES ('$user[$key]','$last_id')";
                        $resmother2=mysqli_query($con,$instmother2);
                    }
                    
                    if($resson){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Daughter")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $instdaughter="INSERT INTO daughter (user_id, daughter_id) VALUES ('$last_id','$user[$key]')";
                    $resdaughter=mysqli_query($con,$instdaughter);
                    if($feres['gender']==1){
                        echo "Male";
                        $instson2="INSERT INTO father (user_id,father_id) VALUES ('$user[$key]','$last_id')";
                        $resson2=mysqli_query($con,$instson2);
                    }else if($feres['gender']==2){
                        echo "feMale";

                        $instmother2="INSERT INTO mother (user_id, mother_id) VALUES ('$user[$key]','$last_id')";
                        $resmother2=mysqli_query($con,$instmother2);
                    }
                    if($resdaughter){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Brother")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    
                    $instbrother="INSERT INTO brother (user_id, brother_id) VALUES ('$last_id','$user[$key]')";
                    $resbrother=mysqli_query($con,$instbrother);
                    if($feres['gender']==1){
                        echo "Male";
                        $instbrother2="INSERT INTO brother (user_id, brother_id) VALUES ('$user[$key]','$last_id')";
                        $resbrother2=mysqli_query($con,$instbrother2);
                    }   else if($feres['gender']==2){
                        echo "feMale";
                        $instsister2="INSERT INTO sister (user_id, sister_id) VALUES ('$user[$key]','$last_id')";
                        $ressister2=mysqli_query($con,$instsister2);
                    }
                    if($resbrother){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Sister")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $instsister="INSERT INTO sister (user_id, sister_id) VALUES ('$last_id','$user[$key]')";
                    $ressister=mysqli_query($con,$instsister);
                    if($feres['gender']==1){
                        echo "Male";
                        $instbrother2="INSERT INTO brother (user_id, brother_id) VALUES ('$user[$key]','$last_id')";
                        $resbrother2=mysqli_query($con,$instbrother2);
                    }   else if($feres['gender']==2){
                        echo "feMale";
                        $instsister2="INSERT INTO sister (user_id, sister_id) VALUES ('$user[$key]','$last_id')";
                        $ressister2=mysqli_query($con,$instsister2);
                    }
                    if($ressister){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Husband")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $insthusband="INSERT INTO husband (user_id, husband_id) VALUES ('$last_id','$user[$key]')";
                    $reshusband=mysqli_query($con,$insthusband);
                    $instwife2="INSERT INTO wife (user_id,wife_id) VALUES ('$user[$key]','$last_id')";
                    $reswife2=mysqli_query($con,$instwife2);
                    if($reshusband){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
                if($selrelation[$i]=="Wife")
                {
                    // echo $selrelation[$i]." ".$user[$key]."<br>";
                    $instwife2="INSERT INTO wife (user_id,wife_id) VALUES ('$last_id','$user[$key]')";
                    $reswife2=mysqli_query($con,$instwife2);
                    $insthusband="INSERT INTO husband (user_id, husband_id) VALUES ('$user[$key]','$last_id')";
                    $reshusband=mysqli_query($con,$insthusband);
                    if($reswife2){
                        // echo "Data inserted successfully";
                        // header("Location: index.php?reg=success");
                    }else{
                        echo "Data not inserted";
                    }                    
                }
            }
            echo "Data inserted successfully";
            unset($_SESSION['merge_selmember']);
        }
        header("Location: mainpage.php");
    }
    else{
        echo "last id not found";
    }
?>