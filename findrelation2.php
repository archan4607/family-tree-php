<?php
    session_start();
    error_reporting(0);
    include_once "connection.php";
    
    $us_fn1=$_POST['us_fn1'];
    $us_ln1=$_POST['us_ln1'];
    $us_fn2=$_POST['us_fn2'];
    $us_ln2=$_POST['us_ln2'];

    //check and get data of user 1 from database if exists or not
    $getu1="select * from user where u_fname='$us_fn1' and u_lname='$us_ln1'";
    $resgetu1=mysqli_query($con, $getu1);
    
    //if uesr 1 record is found then it will execute
    if(mysqli_num_rows($resgetu1)>0){
        $fetchgetu1=mysqli_fetch_assoc($resgetu1);

        // echo $fetchgetu1['user_id'];
        //echo "User 1 is ".$fetchgetu1['u_fname']." ".$fetchgetu1['u_lname']." ID is ".$fetchgetu1['user_id']."<br>";
        $u1= $fetchgetu1['user_id'];    //store user 1 id in variable
        
        //check and get data of user 2 from database if exists or not
        $getu2="select * from user where u_fname='$us_fn2' and u_lname='$us_ln2'";
        $resgetu2=mysqli_query($con, $getu2);
        
        //if uesr 2 record is found then it will execute
        if(mysqli_num_rows($resgetu2)>0){
            $fetchgetu2=mysqli_fetch_assoc($resgetu2);

            // echo $fetchgetu2['user_id'];
            //echo "User 2 is ".$fetchgetu2['u_fname']." ".$fetchgetu2['u_lname']." ID is ".$fetchgetu2['user_id']."<br>";
            $u2= $fetchgetu2['user_id'];    //store user 2 id in variable
           
            
            // now we will check user 1 id in all table one by one and store in multi-array
            //declare value in multi-array of all tables
            $main_array=array();

            $multi_arr1=array(); 
            $multi_arr2=array(); 
            $multi_arr3=array(); 
            $multi_arr4=array(); 
            $multi_arr5=array(); 
            $multi_arr6=array(); 
            $multi_arr7=array(); 
            $multi_arr8=array(); 
            $multi_arr9=array(); 
            $multi_arr10=array(); 
            $multi_arr11=array(); 

            $last_id_arr=array();
            
            
            
           

        {

            // father table 0
            $fat="select * from father where user_id='$u1'";
            $resfat=mysqli_query($con, $fat);
            // $fetfat=mysqli_fetch_assoc($resfat);
            $fatarray=[];
            for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                $fatarray['user1_id']=$fetfat['father_id'];
                $fatarray['is_searched']='false';
                $fatarray['relation']='father';
                $fatarray['ref_id']=$u1;
                $multi_arr1[]=$fatarray;
                //echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
            }
            
            // mother table 1
            $mot="select * from mother where user_id='$u1'";
            $resmot=mysqli_query($con, $mot);
            $motarray=[];
            for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                // $fetmot=mysqli_fetch_assoc($resmot);
                $motarray['user1_id']=$fetmot['mother_id'];
                $motarray['is_searched']='false';
                $motarray['relation']='mother';
                $motarray['ref_id']=$u1;;
                $multi_arr1[]=$motarray;
            }

            // son table 2
            $son="select * from son where user_id='$u1'";
            $resson=mysqli_query($con, $son);
            // $fetson=mysqli_fetch_assoc($resson); 
            $sonarray=[];
            for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                $sonarray['user1_id']=$fetson['son_id'];
                $sonarray['is_searched']='false';
                $sonarray['relation']='son';
                $sonarray['ref_id']=$u1;
                $multi_arr1[] = $sonarray ;
            }
            
            // daughter table 3
            $dau="select * from daughter where user_id='$u1'";
            $resdau=mysqli_query($con, $dau);
            // $fetdau=mysqli_fetch_assoc($resdau);
            $dauarray=[];
            for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                $dauarray['user1_id']=$fetdau['daughter_id'];
                $dauarray['is_searched']='false';
                $dauarray['relation']='daughter';
                $dauarray['ref_id']=$u1;
                $multi_arr1[]=$dauarray;
            }

            // brother table 4
            $bro="select * from brother where user_id='$u1'";
            $resbro=mysqli_query($con, $bro);
            // $fetbro=mysqli_fetch_assoc($resbro);
            $broarray=[];
            for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
                $broarray['user1_id']=$fetbro['brother_id'];
                $broarray['is_searched']='false';
                $broarray['relation']='brother';
                $broarray['ref_id']=$u1;
                $multi_arr1[]=$broarray;
            }
            
            // sister table 5
            $sis="select * from sister where user_id='$u1'";
            $ressis=mysqli_query($con, $sis);
            // $fetsis=mysqli_fetch_assoc($ressis);
            $sisarray=[];
            for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                $sisarray['user1_id']=$fetsis['sister_id'];
                $sisarray['is_searched']='false';
                $sisarray['relation']='sister';
                $sisarray['ref_id']=$u1;
                $multi_arr1[]=$sisarray;
            }

            // husband table 6
            $hus="select * from husband where user_id='$u1'";
            $reshus=mysqli_query($con, $hus);
            // $fethus=mysqli_fetch_assoc($reshus);
            $husarray=[];
            for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                $husarray['user1_id']=$fethus['husband_id'];
                $husarray['is_searched']='false';
                $husarray['relation']='husband';
                $husarray['ref_id']=$u1;
                $multi_arr1[]=$husarray;
            }
            
            // wife table 7
            $wi="select * from wife where user_id='$u1'";
            $reswi=mysqli_query($con, $wi);
            // $fetwi=mysqli_fetch_assoc($reswi);
            $wifearray=[];
            for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                $wifearray['user1_id']=$fetwi['wife_id'];
                $wifearray['is_searched']='false';
                $wifearray['relation']='wife';
                $wifearray['ref_id']=$u1;
                $multi_arr1[]=$wifearray;
            }

            //merge all array here
            $main_array=array_merge($main_array,$multi_arr1);


            echo "<pre>";
            // echo "<br><br>all table data store in array<br>";
            // print_r($multi_arr1);  
            // echo "<br><br>all table data store in MAIN ARRAY<br>";
            // print_r($multi_arr1);
            
            // declare array in which all last id is check stores 
            $lidarray=[];
            // echo "<br><br>all last id data store in array<br>";
            $lidarray['uid']=$u1;
            $lidarray['is_searched']="true";
            $lidarray['relation']='user_1';
            $last_id_arr[]=$lidarray;
            // array_push($last_id_arr,$u1);
            // //print_r($last_id_arr);

            // $_SESSION['lst_arr']=$last_id_arr;
            //     $last=$_SESSION['lst_arr'];

        }

        {
    
            


            //main function here array element check 
            function search_table($uid, $rel,$y, $last_id_arr){
                global $u2;
                global $con;
                global $last_id_arr;
                global $main_array, $master_array;
                echo " -search_table- ".$y."--";

                $main_array[$y]['is_searched']="true";
                // foreach($main_array)
                // father table 0
                $fat="select * from father where user_id='$uid'";
                $resfat=mysqli_query($con, $fat);
                // $fetfat=mysqli_fetch_assoc($resfat);
                $fatarray=[];
                for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                    $fatarray['user1_id']=$fetfat['father_id'];
                    $fatarray['is_searched']='false';
                    $fatarray['relation']='father';
                    $fatarray['ref_id']=$uid;    
                    $multi_arr1[]=$fatarray;
                    //echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
                }
                
                // mother table 1
                $mot="select * from mother where user_id='$uid'";
                $resmot=mysqli_query($con, $mot);
                $motarray=[];
                for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                    // $fetmot=mysqli_fetch_assoc($resmot);
                    $motarray['user1_id']=$fetmot['mother_id'];
                    $motarray['is_searched']='false';
                    $motarray['relation']='mother';
                    $motarray['ref_id']=$uid;
                    $multi_arr1[]=$motarray;
                }

                // son table 2
                $son="select * from son where user_id='$uid'";
                $resson=mysqli_query($con, $son);
                // $fetson=mysqli_fetch_assoc($resson); 
                $sonarray=[];
                for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                    $sonarray['user1_id']=$fetson['son_id'];
                    $sonarray['is_searched']='false';
                    $sonarray['relation']='son';
                    $sonarray['ref_id']=$uid;
                    $multi_arr1[] = $sonarray ;
                }
                
                // daughter table 3
                $dau="select * from daughter where user_id='$uid'";
                $resdau=mysqli_query($con, $dau);
                // $fetdau=mysqli_fetch_assoc($resdau);
                $dauarray=[];
                for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                    $dauarray['user1_id']=$fetdau['daughter_id'];
                    $dauarray['is_searched']='false';
                    $dauarray['relation']='daughter';
                    $dauarray['ref_id']=$uid;
                    $multi_arr1[]=$dauarray;
                }

                // brother table 4
                $bro="select * from brother where user_id='$uid'";
                $resbro=mysqli_query($con, $bro);
                // $fetbro=mysqli_fetch_assoc($resbro);
                $broarray=[];
                for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){

                    $broarray['user1_id']=$fetbro['brother_id'];
                    $broarray['is_searched']='false';
                    $broarray['relation']='brother';
                    $broarray['ref_id']=$uid;
                    $multi_arr1[]=$broarray;
                }
                
                // sister table 5
                $sis="select * from sister where user_id='$uid'";
                $ressis=mysqli_query($con, $sis);
                // $fetsis=mysqli_fetch_assoc($ressis);
                $sisarray=[];
                for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                    $sisarray['user1_id']=$fetsis['sister_id'];
                    $sisarray['is_searched']='false';
                    $sisarray['relation']='sister';
                    $sisarray['ref_id']=$uid;
                    $multi_arr1[]=$sisarray;
                }

                // husband table 6
                $hus="select * from husband where user_id='$uid'";
                $reshus=mysqli_query($con, $hus);
                // $fethus=mysqli_fetch_assoc($reshus);
                $husarray=[];
                for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                    $husarray['user1_id']=$fethus['husband_id'];
                    $husarray['is_searched']='false';
                    $husarray['relation']='husband';
                    $husarray['ref_id']=$uid;
                    $multi_arr1[]=$husarray;
                }
                
                // wife table 7
                $wi="select * from wife where user_id='$uid'";
                $reswi=mysqli_query($con, $wi);
                // $fetwi=mysqli_fetch_assoc($reswi);
                $wifearray=[];
                for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                    $wifearray['user1_id']=$fetwi['wife_id'];
                    $wifearray['is_searched']='false';
                    $wifearray['relation']='wife';
                    $wifearray['ref_id']=$uid;
                    $multi_arr1[]=$wifearray;
                }   
                
                $master_array=[];
                //merge all array here
                $main_array=array_merge($main_array,$multi_arr1);
                $master_array=array_merge($master_array,$main_array);


                // echo "<pre>";
                // echo "<br><br>all table data store in array<br>";
                // print_r($multi_arr1);
                
                // echo "<br><br>all table data store in MAIN ARRAY<br>";
                // print_r($main_array);
                
                // echo "<br><br>all table data store in master_array ARRAY<br>";
                // print_r($master_array);
                
                // for($a=0; $a<count($master_array); $a++){
                //     for($b=0; $b<count($master_array); $b++){
                    
                // declare array in which all last id is stores 
                $lidarray=[];
                // echo "<br><br>all last id data store in array inside search function<br>";
                $lidarray['uid']=$uid;
                $lidarray['is_searched']="true";
                $lidarray['relation']=$rel;
                $temparray[]=$lidarray;
                // echo "Duplicate  data";

                //merge all array here
                $last_id_arr=array_merge($last_id_arr,$temparray);
                $temparray=[];
                $_SESSION['lst_arr']=$last_id_arr;
                $last=$_SESSION['lst_arr'];
                // array_push($last_id_arr['uid'],$uid);
                // print_r($last_id_arr);

                // //print_r($main_array);

                // declare array in which all last id is stores 
                // $lidarray=[];
                // echo "<br><br>all last id data store in array<br>";
                // $lidarray['uid']=$uid;
                // $lidarray['is_searched']="true";
                // $lidarray['relation']=$rel;
                // $last_id_arr[]=$lidarray;
                // array_push($last_id_arr['uid'],$uid);
                // //print_r($last_id_arr);
                    // echo "USER 2 IS ".$uid;
                    // echo "<br>";

                    



                    // return $main_array;
                    // return $last_id_arr;
                    // return ckeck2found($u2, $main_array, $last_id_arr);
                    // print_r($multi_arr1);
            }


            //in this function it will compare user id from master_array with last uid 
            function findsubdata($uid, $last_id_arr){
                global $master_array, $main_array;
                // $last_id_arr;
                
                echo "<br>FROM findsubdata ";
                print_r($master_array);
                foreach($master_array as $k=>$v){
                    // if($uid==$v['ref_id']){
                        echo "<br>******---".$uid;
                        echo "<br>******---".$v['ref_id'];
                    // if($uid==$master_array[$a]['ref_id']){
                        foreach($last_id_arr as $k1 => $v1){
                        echo "<br>USER1 IS+++".$uid;
                        echo "<br>MAIN ARRAY USER ID IS---".$v['user1_id'];
                        echo "<br>MAIN ARRAY REFERENCE ID IS---".$v['ref_id'];
                            if($v['user1_id']==$v1['uid']){
                                echo "<br>match found";
                                echo "<br>master++".$v['user1_id'];
                                echo "<br>last id+++".$v1['uid'];
                                break;
                            }
                            else{
                                echo "<br>match not found";
                                echo "<br>master++".$v['user1_id'];
                                echo "<br>reference++".$v['ref_id'];
                                echo "<br>last id+++".$v1['uid'];
                                echo "<br>KEy+++".$k;
                                $uid=$v['user1_id'];
                                $rel=$v['relation'];

                                // $uid, $rel,$k, $last_id_arr
                                search_table($uid, $rel,$k, $last_id_arr);
                                echo "CHECK ALL ID";
                                print_r($master_array);
                                echo "LAST ARRAY ";
                                print_r($last_id_arr);
                                
                                ckeck2found($uid, $main_array,  $last_id_arr);
                            }
                        }
                    // }
                    // else{
                    //     // echo "MAIN ARRAY ID IS---".$master_array[$a]['user1_id'];
                    //     // echo "MAIN ARRAY REFERENCE ID IS---".$master_array[$a]['ref_id'];
                        
                    // }
                // }
                // echo "OUTSIDE";
                }
            }

            //if user is father then call this function they might be son or daughter
            function fatherofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
            }
                        
            //if user is mother then call this function they might be son or daughter
            function motherofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                // //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                } 
            }

            //if user is son then call this function they might be father or mother
            function sonofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
            }

            //if user is daughter then call this function they might be father or mother
            function daughterofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
            }

            //if user is brother then call this function they might be brother or sister
            function brotherofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
                // echo "<br>last id is ".$lid;

            }

            //if user is sister then call this function they might be brother or sister
            function sisterofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
            }

            //if user is wife then call this function they should be husband
            function wifeofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
                // echo
            }

            //if user is husband then call this function they should be wife
            function husbandofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
            }
             
            
            function ckeck2found($u2, $main_array,  $last_id_arr){
                global $u2, $last_id_arr;
                echo "ckeck2found----------------------- ";
                //print_r($main_array);
                for($y=0; $y<count($main_array); $y++){
                    for($z=0; $z<count($main_array); $z++){
                        // echo "CHECKUSER@STATUES";
                        // echo $u2;
                        if($main_array[$y]['user1_id']==$u2){
                            // declare array in which all last id is stores 
                            $lidarray=[];
                            // echo "<br><br>all last id data store in array inside findsubdata function<br>";
                            $lidarray['uid']=$main_array[$y]['user1_id'];
                            $lidarray['is_searched']="true";
                            $lidarray['relation']=$main_array[$y]['relation'];
                            $temparray[]=$lidarray;
                            // echo "Duplicate  data";

                            //merge all array here
                            $last_id_arr=array_merge($last_id_arr,$temparray);
                            $temparray=[];
                            // array_push($last_id_arr['uid'],$uid);
                            //print_r($last_id_arr);

                            // //print_r($main_array);
                            if($main_array[$y]['relation']=="father"){
                                $val2=$main_array[$y]['user1_id'];
                                fatherofuser($last_id_arr, $val2);
                                exit;

                            }
                            if($main_array[$y]['relation']=="mother"){
                                $val2=$main_array[$y]['user1_id'];
                                motherofuser($last_id_arr, $val2);
                                exit;

                            }
                            if($main_array[$y]['relation']=="son"){
                                $val2=$main_array[$y]['user1_id'];
                                // echo $main_array[$y]['relation'];
                                //print_r($last_id_arr);
                                sonofuser($last_id_arr, $val2);
                                exit;
                            }
                            if($main_array[$y]['relation']=="daughter"){
                                $val2=$main_array[$y]['user1_id'];
                                daughterofuser($last_id_arr, $val2);
                                exit;

                            }
                            if($main_array[$y]['relation']=="brother"){
                                $val2=$main_array[$y]['user1_id'];
                                brotherofuser($last_id_arr, $val2);
                                exit;

                            }
                            if($main_array[$y]['relation']=="sister"){
                                $val2=$main_array[$y]['user1_id'];
                                sisterofuser($last_id_arr, $val2);
                                exit;

                            }
                            if($main_array[$y]['relation']=="husband"){
                                $val2=$main_array[$y]['user1_id'];
                                husbandofuser($last_id_arr, $val2);
                                exit;

                            }
                            if($main_array[$y]['relation']=="wife"){
                                $val2=$main_array[$y]['user1_id'];
                                wifeofuser($last_id_arr, $val2);
                                exit;
                            }
                        }
                    }
                }
            }            


            function user2notfound($u2, $main_array, $last_id_arr){
                global $main_array,$last;
                echo "<br>user2notfound";
                for($y=0; $y<count($main_array); $y++){
                    for($z=0; $z<count($main_array); $z++){
                        
                        if($main_array[$y]['user1_id']!=$u2){

                            for($i=0; $i<count($last_id_arr); $i++){
                                for($j=0; $j<count($last_id_arr); $j++){
                                    // echo "<br>".$main_array[$y]['ref_id'];
                                    echo "<br>1st id ".$main_array[$y]['user1_id'];
                                    echo "<br>is_searched user --".$main_array[$y]['is_searched'];
                                    echo "<br>REFERENCE ID IS--".$main_array[$y]['ref_id'];
                                    echo "<br><br>last_id is--".$last_id_arr[$i]['uid'];
                                    echo "<br>is_searched --".$last_id_arr[$i]['is_searched'];
                                    echo "<br>relation is--".$last_id_arr[$i]['relation'];
                                    echo "<br><br>";
                                    echo "]]]]]]";
                                    // if($main_array[$y]['ref_id']==$last_id_arr[$i]['uid'])  //1=1 
                                    // {
                                        if(($last_id_arr[$i]['uid']!=$main_array[$y]['user1_id']) && ($main_array[$y]['is_searched']==='false')){ 
                                            //1!=2 && false
                                            
                                            // if(($main_array[$y]['ref_id']==$last_id_arr[$i]['uid']) && ($main_array[$y]['is_searched']==='false')){
                                                echo "<br>NOT searched";
                                                $main_array[$y]['is_searched']='true';
                                                $user1=$main_array[$y]['user1_id'];
                                                $user_rel=$main_array[$y]['relation'];
                                                echo "<br>KEY2 IS ".$y;
                                                echo "<br>VALUE2 IS ".$z;
                                                // echo $main_array[$y]['is_searched'];
                                                echo "<br>".$user1;
                                                echo "<br>".$user_rel;
                                                echo "<br>".$main_array[$y]['ref_id'];
                                                echo "<br>-----------------------<br>";
                                                


                                                print_r($main_array);
                                                print_r($last_id_arr);
                                                

                                                
                                                // echo "Array retun value are ".
                                                search_table($user1, $user_rel, $y,  $last_id_arr);
                                                ckeck2found($u2, $main_array,  $last_id_arr);
                                                findsubdata($user1, $last_id_arr);
                                                
                                                // echo "CALLED";
                                                // exit;
                                            // }
                                        }
                                        else
                                        {
                                            // if($main_array[$y]['is_searched']==='false'){
                                            //     }
                                                echo "Already searched<br>";
                                        }
                                        
                                    // }
                                }
                            
                            }
                            $main_array[$y]['is_searched']='true';
                        }

                    }

                }
            }

        }

        echo "{}{}}}{}{}{}{}";
            print_r($last);
            ckeck2found($u2, $main_array, $last_id_arr);
            user2notfound($u2, $main_array, $last_id_arr);


        }
        else{
            echo "Data not found for user 2";
        }
    }
    else{
        echo "Data not found user 1";
    }


    




    // echo "User1 is ".$us_fn1." ".$us_ln1;
    // echo "<br>-User2 is-- ".$us_fn2." ".$us_ln2;
    // echo "hellfsdfsfsdafsfso";
?>

<!-- 29/06/2023 -->
<?php
    session_start();
    error_reporting(0);
    include_once "connection.php";
    
    $us_fn1=$_POST['us_fn1'];
    $us_ln1=$_POST['us_ln1'];
    $us_fn2=$_POST['us_fn2'];
    $us_ln2=$_POST['us_ln2'];

    //check and get data of user 1 from database if exists or not
    $getu1="select * from user where u_fname='$us_fn1' and u_lname='$us_ln1'";
    $resgetu1=mysqli_query($con, $getu1);
    
    //if uesr 1 record is found then it will execute
    if(mysqli_num_rows($resgetu1)>0){
        $fetchgetu1=mysqli_fetch_assoc($resgetu1);

        // echo $fetchgetu1['user_id'];
        //echo "User 1 is ".$fetchgetu1['u_fname']." ".$fetchgetu1['u_lname']." ID is ".$fetchgetu1['user_id']."<br>";
        $u1= $fetchgetu1['user_id'];    //store user 1 id in variable
        
        //check and get data of user 2 from database if exists or not
        $getu2="select * from user where u_fname='$us_fn2' and u_lname='$us_ln2'";
        $resgetu2=mysqli_query($con, $getu2);
        
        //if uesr 2 record is found then it will execute
        if(mysqli_num_rows($resgetu2)>0){
            $fetchgetu2=mysqli_fetch_assoc($resgetu2);

            // echo $fetchgetu2['user_id'];
            //echo "User 2 is ".$fetchgetu2['u_fname']." ".$fetchgetu2['u_lname']." ID is ".$fetchgetu2['user_id']."<br>";
            $u2= $fetchgetu2['user_id'];    //store user 2 id in variable
           
            
            // now we will check user 1 id in all table one by one and store in multi-array
            //declare value in multi-array of all tables
            $main_array=array();
            $main_array2=array();

            $multi_arr1=array(); 
            $multi_arr2=array(); 
            $multi_arr3=array(); 
            
            $last_id_arr=array();
            $last_id_empty=array();
            


            function mainsearch(){
                global $main_array,$con,$u1,$u2;
                
                // father table 0
                $fat="select * from father where user_id='$u1'";
                $resfat=mysqli_query($con, $fat);
                // $fetfat=mysqli_fetch_assoc($resfat);
                $fatarray=[];
                for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                    $fatarray['user1_id']=$fetfat['father_id'];
                    $fatarray['is_searched']='false';
                    $fatarray['relation']='father';
                    $fatarray['ref_id']=$u1;
                    $multi_arr1[]=$fatarray;
                    //echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
                }
                
                // mother table 1
                $mot="select * from mother where user_id='$u1'";
                $resmot=mysqli_query($con, $mot);
                $motarray=[];
                for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                    // $fetmot=mysqli_fetch_assoc($resmot);
                    $motarray['user1_id']=$fetmot['mother_id'];
                    $motarray['is_searched']='false';
                    $motarray['relation']='mother';
                    $motarray['ref_id']=$u1;;
                    $multi_arr1[]=$motarray;
                }

                // son table 2
                $son="select * from son where user_id='$u1'";
                $resson=mysqli_query($con, $son);
                // $fetson=mysqli_fetch_assoc($resson); 
                $sonarray=[];
                for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                    $sonarray['user1_id']=$fetson['son_id'];
                    $sonarray['is_searched']='false';
                    $sonarray['relation']='son';
                    $sonarray['ref_id']=$u1;
                    $multi_arr1[] = $sonarray ;
                }
                
                // daughter table 3
                $dau="select * from daughter where user_id='$u1'";
                $resdau=mysqli_query($con, $dau);
                // $fetdau=mysqli_fetch_assoc($resdau);
                $dauarray=[];
                for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                    $dauarray['user1_id']=$fetdau['daughter_id'];
                    $dauarray['is_searched']='false';
                    $dauarray['relation']='daughter';
                    $dauarray['ref_id']=$u1;
                    $multi_arr1[]=$dauarray;
                }

                // brother table 4
                $bro="select * from brother where user_id='$u1'";
                $resbro=mysqli_query($con, $bro);
                // $fetbro=mysqli_fetch_assoc($resbro);
                $broarray=[];
                for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
                    $broarray['user1_id']=$fetbro['brother_id'];
                    $broarray['is_searched']='false';
                    $broarray['relation']='brother';
                    $broarray['ref_id']=$u1;
                    $multi_arr1[]=$broarray;
                }
                
                // sister table 5
                $sis="select * from sister where user_id='$u1'";
                $ressis=mysqli_query($con, $sis);
                // $fetsis=mysqli_fetch_assoc($ressis);
                $sisarray=[];
                for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                    $sisarray['user1_id']=$fetsis['sister_id'];
                    $sisarray['is_searched']='false';
                    $sisarray['relation']='sister';
                    $sisarray['ref_id']=$u1;
                    $multi_arr1[]=$sisarray;
                }

                // husband table 6
                $hus="select * from husband where user_id='$u1'";
                $reshus=mysqli_query($con, $hus);
                // $fethus=mysqli_fetch_assoc($reshus);
                $husarray=[];
                for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                    $husarray['user1_id']=$fethus['husband_id'];
                    $husarray['is_searched']='false';
                    $husarray['relation']='husband';
                    $husarray['ref_id']=$u1;
                    $multi_arr1[]=$husarray;
                }
                
                // wife table 7
                $wi="select * from wife where user_id='$u1'";
                $reswi=mysqli_query($con, $wi);
                // $fetwi=mysqli_fetch_assoc($reswi);
                $wifearray=[];
                for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                    $wifearray['user1_id']=$fetwi['wife_id'];
                    $wifearray['is_searched']='false';
                    $wifearray['relation']='wife';
                    $wifearray['ref_id']=$u1;
                    $multi_arr1[]=$wifearray;
                }

                //merge all array here
                // $_SESSION['main_array1']=$main_array;
                // $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr1);
                $_SESSION['main_array1']=array_merge($multi_arr1);


                echo "<pre>";
                // echo "<br><br>all table data store in array<br>";
                // print_r($multi_arr1);  
                // echo "<br><br>all table data store in MAIN ARRAY 1<br>";
                // print_r($main_array);
                
                // declare array in which all last id is check stores 
                $lidarray=[];
                // echo "<br><br>all last id data store in array<br>";
                $lidarray['uid']=$u1;
                $lidarray['is_searched']="true";
                $lidarray['relation']='user_1';
                $last_id_arr[]=$lidarray;
                $_SESSION['last_id_arr']=array_merge($last_id_arr);
                // array_push($last_id_arr,$u1);
                // print_r($last_id_arr);




                //search for user 2 (TWO)
                // father table 0
                $fat="select * from father where user_id='$u2'";
                $resfat=mysqli_query($con, $fat);
                // $fetfat=mysqli_fetch_assoc($resfat);
                $fatarray=[];
                for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                    $fatarray['user2_id']=$fetfat['father_id'];
                    $fatarray['is_searched']='false';
                    $fatarray['relation']='father';
                    $fatarray['ref_id']=$u2;
                    $multi_arr2[]=$fatarray;
                    //echo "<br>fat array val is ".$multi-arr2[$i][$j]; // store value in array
                }

                // mother table 1
                $mot="select * from mother where user_id='$u2'";
                $resmot=mysqli_query($con, $mot);
                $motarray=[];
                for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                    // $fetmot=mysqli_fetch_assoc($resmot);
                    $motarray['user2_id']=$fetmot['mother_id'];
                    $motarray['is_searched']='false';
                    $motarray['relation']='mother';
                    $motarray['ref_id']=$u2;;
                    $multi_arr2[]=$motarray;
                }

                // son table 2
                $son="select * from son where user_id='$u2'";
                $resson=mysqli_query($con, $son);
                // $fetson=mysqli_fetch_assoc($resson); 
                $sonarray=[];
                for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                    $sonarray['user2_id']=$fetson['son_id'];
                    $sonarray['is_searched']='false';
                    $sonarray['relation']='son';
                    $sonarray['ref_id']=$u2;
                    $multi_arr2[] = $sonarray ;
                }

                // daughter table 3
                $dau="select * from daughter where user_id='$u2'";
                $resdau=mysqli_query($con, $dau);
                // $fetdau=mysqli_fetch_assoc($resdau);
                $dauarray=[];
                for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                    $dauarray['user2_id']=$fetdau['daughter_id'];
                    $dauarray['is_searched']='false';
                    $dauarray['relation']='daughter';
                    $dauarray['ref_id']=$u2;
                    $multi_arr2[]=$dauarray;
                }

                // brother table 4
                $bro="select * from brother where user_id='$u2'";
                $resbro=mysqli_query($con, $bro);
                // $fetbro=mysqli_fetch_assoc($resbro);
                $broarray=[];
                for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
                    $broarray['user2_id']=$fetbro['brother_id'];
                    $broarray['is_searched']='false';
                    $broarray['relation']='brother';
                    $broarray['ref_id']=$u2;
                    $multi_arr2[]=$broarray;
                }

                // sister table 5
                $sis="select * from sister where user_id='$u2'";
                $ressis=mysqli_query($con, $sis);
                // $fetsis=mysqli_fetch_assoc($ressis);
                $sisarray=[];
                for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                    $sisarray['user2_id']=$fetsis['sister_id'];
                    $sisarray['is_searched']='false';
                    $sisarray['relation']='sister';
                    $sisarray['ref_id']=$u2;
                    $multi_arr2[]=$sisarray;
                }

                // husband table 6
                $hus="select * from husband where user_id='$u2'";
                $reshus=mysqli_query($con, $hus);
                // $fethus=mysqli_fetch_assoc($reshus);
                $husarray=[];
                for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                    $husarray['user2_id']=$fethus['husband_id'];
                    $husarray['is_searched']='false';
                    $husarray['relation']='husband';
                    $husarray['ref_id']=$u2;
                    $multi_arr2[]=$husarray;
                }

                // wife table 7
                $wi="select * from wife where user_id='$u2'";
                $reswi=mysqli_query($con, $wi);
                // $fetwi=mysqli_fetch_assoc($reswi);
                $wifearray=[];
                for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                    $wifearray['user2_id']=$fetwi['wife_id'];
                    $wifearray['is_searched']='false';
                    $wifearray['relation']='wife';
                    $wifearray['ref_id']=$u2;
                    $multi_arr2[]=$wifearray;
                }

                //merge all array here
                // $_SESSION['main_array2']=$main_array;
                // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr2);
                $_SESSION['main_array2']=array_merge($multi_arr2);


                echo "<pre>";
                // echo "<br><br>all table data store in array<br>";
                // print_r($multi_arr2);  
                // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                // print_r($_SESSION['main_array2']);

                // declare array in which all last id is check stores 
                // $lidarray=[];
                // // echo "<br><br>all last id data store in array<br>";
                // $lidarray['uid']=$u1;
                // $lidarray['is_searched']="true";
                // $lidarray['relation']='user_1';
                // $last_id_arr[]=$lidarray;
                // // array_push($last_id_arr,$u1);
                // print_r($last_id_arr);

                // $_SESSION['lst_arr']=$last_id_arr;
                //     $last=$_SESSION['lst_arr'];

            }

            function detail_fetch(){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                
                for($i=1; $i<count($last_id_arr); $i++){
                    if($last_id_arr[$i]['is_searched']=='true'){
                        // echo "<br>INSIDE SON FUNCTION-----    ";
                        $lid=$last_id_arr[$i]['uid'];
                        // echo $lid ;

                            // $val1=$last_id_arr[$i]['uid'];
                            // echo $val1." ";


                            if($last_id_arr[$i]['relation']=="father"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name3." ";
                                
                            }
                            if($last_id_arr[$i]['relation']=="mother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name4." ";
                            }
                            if($last_id_arr[$i]['relation']=="son"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<b>".$val2."</b> ".$val1;
                                
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                echo "<b>".$val2."</b> ".$hold_name5."  ";
                            }
                            if($last_id_arr[$i]['relation']=="daughter"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name6." ";
                            }
                            if($last_id_arr[$i]['relation']=="brother"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name7." ";
                            }
                            if($last_id_arr[$i]['relation']=="sister"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name8." ";
                            }
                            if($last_id_arr[$i]['relation']=="husband"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name9." ";
                            }
                            if($last_id_arr[$i]['relation']=="wife"){
                                $val1=$last_id_arr[$i]['uid'];
                                $val2=$last_id_arr[$i]['relation'];
                                // echo "<br>---from function last id is ".$lid;
                                $getlastiddetail="select * from user where user_id='$val1'";
                                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                                $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                                // echo $hold_name3."=====".$hold_name;
                                echo "<b>".$val2."</b> ".$hold_name10." ";
                            }

                    }
                }
            }

            //if user is father then call this function they might be son or daughter
            function fatherofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];

                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                // print_r($last_id_arr);
                //last push id is poped from array
                // echo $hold_name;
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch();
            }

            //if user is mother then call this function they might be son or daughter
            function motherofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                // //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch(); 
            }

            //if user is son then call this function they might be father or mother
            function sonofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch();
            }

            //if user is daughter then call this function they might be father or mother
            function daughterofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch();
            }

            //if user is brother then call this function they might be brother or sister
            function brotherofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
                }
                detail_fetch();
                // echo "<br>last id is ".$lid;

            }

            //if user is sister then call this function they might be brother or sister
            function sisterofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch();
            }

            //if user is wife then call this function they should be husband
            function wifeofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch();
            }

            //if user is husband then call this function they should be wife
            function husbandofuser($val2){
                global $con,$u1;
                $last_id_arr=$_SESSION['last_id_arr'];
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                //print_r($last_id_arr);
                //last push id is poped from array
                if($last_id_arr[0]['relation']=="user_1")
                {
                    $lid=$last_id_arr[0]['uid'];
                    // echo "<br>---from function last id is ".$lid;
                    $getlastiddetail="select * from user where user_id='$lid'";
                    $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                    $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                    $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                    echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                }
                detail_fetch();
            }

            function fetchdetails(){
                global $u2;
                $sma1=$_SESSION['main_array1'];
                $slid=$_SESSION['last_id_arr'];
                echo "CHECKUSER@STATUES";

                for($y=0; $y<count($sma1); $y++){
                    // echo $u2;
                    // print_r($_SESSION['main_array1']);
                    echo "<br>SESSION LAST ID".$sma1[$y]['user1_id'];
                    if($sma1[$y]['user1_id']==$u2){
                        echo $sma1[$y]['user1_id'];
                        // declare array in which all last id is check stores 
                        $lidarray=[];
                        // echo "<br><br>all last id data store in array<br>";
                        $lidarray['uid']=$sma1[$y]['user1_id'];
                        $lidarray['is_searched']="true";
                        $lidarray['relation']=$sma1[$y]['relation'];
                        $last_id_arr[]=$lidarray;
                        
                        //merge last id array  
                        $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                        // array_push($last_id_arr,$u1);
                        echo "<br>+++++++LAST ID SESSION ARRAY IS ";
                        print_r($_SESSION['last_id_arr']);
                        // print_r($_SESSION['main_array1']);
                        $last_id_arr=[];

                        // //print_r($sma1);
                        if($sma1[$y]['relation']=="father"){
                            $val2=$sma1[$y]['user1_id'];
                            fatherofuser($val2);
                            exit;

                        }
                        if($sma1[$y]['relation']=="mother"){
                            $val2=$sma1[$y]['user1_id'];
                            motherofuser($val2);
                            exit;

                        }
                        if($sma1[$y]['relation']=="son"){
                            $val2=$sma1[$y]['user1_id'];
                            // echo $sma1[$y]['relation'];
                            //print_r($last_id_arr);
                            sonofuser($val2);
                            exit;
                        }
                        if($sma1[$y]['relation']=="daughter"){
                            $val2=$sma1[$y]['user1_id'];
                            daughterofuser($val2);
                            exit;

                        }
                        if($sma1[$y]['relation']=="brother"){
                            $val2=$sma1[$y]['user1_id'];
                            brotherofuser($val2);
                            exit;

                        }
                        if($sma1[$y]['relation']=="sister"){
                            $val2=$sma1[$y]['user1_id'];
                            sisterofuser($val2);
                            exit;

                        }
                        if($sma1[$y]['relation']=="husband"){
                            $val2=$sma1[$y]['user1_id'];
                            husbandofuser($val2);
                            exit;

                        }
                        if($sma1[$y]['relation']=="wife"){
                            $val2=$sma1[$y]['user1_id'];
                            wifeofuser($val2);
                            exit;
                        }
                    }
                }
            }



            function defaultsearch1(){
                global $main_array,$con,$last_id_arr,$u2;
                
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                for($i=0; $i<count($sma1); $i++){
                    for($j=0; $j<count($sma2); $j++){
                        if($sma1[$i]['user1_id']==($sma1[$i]['is_searched']==='false')){
                            
                            $uidsma=$sma1[$i]['user1_id'];
                            $relsma=$sma1[$i]['relation'];
                            $sma1[$i]['is_searched']='true';
                            {
                                // father table 0
                                $fat="select * from father where user_id='$uidsma'";
                                $resfat=mysqli_query($con, $fat);
                                // $fetfat=mysqli_fetch_assoc($resfat);
                                $fatarray=[];
                                for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                                    $fatarray['user1_id']=$fetfat['father_id'];
                                    $fatarray['is_searched']='false';
                                    $fatarray['relation']='father';
                                    $fatarray['ref_id']=$uidsma;
                                    $multi_arr3[]=$fatarray;
                                    //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
                                }
                                
                                // mother table 1
                                $mot="select * from mother where user_id='$uidsma'";
                                $resmot=mysqli_query($con, $mot);
                                $motarray=[];
                                for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                                    // $fetmot=mysqli_fetch_assoc($resmot);
                                    $motarray['user1_id']=$fetmot['mother_id'];
                                    $motarray['is_searched']='false';
                                    $motarray['relation']='mother';
                                    $motarray['ref_id']=$uidsma;;
                                    $multi_arr3[]=$motarray;
                                }
                                
                                // son table 2
                                $son="select * from son where user_id='$uidsma'";
                                $resson=mysqli_query($con, $son);
                                // $fetson=mysqli_fetch_assoc($resson); 
                                $sonarray=[];
                                for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                                    $sonarray['user1_id']=$fetson['son_id'];
                                    $sonarray['is_searched']='false';
                                    $sonarray['relation']='son';
                                    $sonarray['ref_id']=$uidsma;
                                    $multi_arr3[] = $sonarray ;
                                }
                                
                                // daughter table 3
                                $dau="select * from daughter where user_id='$uidsma'";
                                $resdau=mysqli_query($con, $dau);
                                // $fetdau=mysqli_fetch_assoc($resdau);
                                $dauarray=[];
                                for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                                    $dauarray['user1_id']=$fetdau['daughter_id'];
                                    $dauarray['is_searched']='false';
                                    $dauarray['relation']='daughter';
                                    $dauarray['ref_id']=$uidsma;
                                    $multi_arr3[]=$dauarray;
                                }

                                // brother table 4
                                $bro="select * from brother where user_id='$uidsma'";
                                $resbro=mysqli_query($con, $bro);
                                // $fetbro=mysqli_fetch_assoc($resbro);
                                $broarray=[];
                                for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
                                    $broarray['user1_id']=$fetbro['brother_id'];
                                    $broarray['is_searched']='false';
                                    $broarray['relation']='brother';
                                    $broarray['ref_id']=$uidsma;
                                    $multi_arr3[]=$broarray;
                                }
                                
                                // sister table 5
                                $sis="select * from sister where user_id='$uidsma'";
                                $ressis=mysqli_query($con, $sis);
                                // $fetsis=mysqli_fetch_assoc($ressis);
                                $sisarray=[];
                                for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                                    $sisarray['user1_id']=$fetsis['sister_id'];
                                    $sisarray['is_searched']='false';
                                    $sisarray['relation']='sister';
                                    $sisarray['ref_id']=$uidsma;
                                    $multi_arr3[]=$sisarray;
                                }
                                
                                // husband table 6
                                $hus="select * from husband where user_id='$uidsma'";
                                $reshus=mysqli_query($con, $hus);
                                // $fethus=mysqli_fetch_assoc($reshus);
                                $husarray=[];
                                for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                                    $husarray['user1_id']=$fethus['husband_id'];
                                    $husarray['is_searched']='false';
                                    $husarray['relation']='husband';
                                    $husarray['ref_id']=$uidsma;
                                    $multi_arr3[]=$husarray;
                                }
                                
                                // wife table 7
                                $wi="select * from wife where user_id='$uidsma'";
                                $reswi=mysqli_query($con, $wi);
                                // $fetwi=mysqli_fetch_assoc($reswi);
                                $wifearray=[];
                                for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                                    $wifearray['user1_id']=$fetwi['wife_id'];
                                    $wifearray['is_searched']='false';
                                    $wifearray['relation']='wife';
                                    $wifearray['ref_id']=$uidsma;
                                    $multi_arr3[]=$wifearray;
                                }

                                //merge all array here
                                // $_SESSION['main_array']=$main_array;
                                // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
                                $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
                                $multi_arr3=[];


                                echo "<pre>";
                                // echo "<br><br>all table data store in array<br>";
                                // print_r($multi_arr3);  
                                // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                                // print_r($_SESSION['main_array2']);
                                
                                // declare array in which all last id is check stores 
                                $lidarray=[];
                                // echo "<br><br>all last id data store in array<br>";
                                $lidarray['uid']=$uidsma;
                                $lidarray['is_searched']="true";
                                $lidarray['relation']=$relsma;
                                $last_id_arr[]=$lidarray;
                                
                                //merge last id array  
                                $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                                // array_push($last_id_arr,$u1);
                                echo "LAST ID SESSION ARRAY IS ";
                                // print_r($_SESSION['last_id_arr']);
                                // print_r($_SESSION['main_array1']);
                                $last_id_arr=[];
                                
                            }
                            for($a=0; $a<count($_SESSION['main_array1']); $a++){
                                for($b=0; $b<count($_SESSION['main_array2']); $b++){
                                    if($_SESSION['main_array1'][$a]['user1_id'] == $_SESSION['main_array2'][$b]['user2_id']){

                                        echo "<br>---".$_SESSION['main_array1'][$a]['user1_id'];
                                        echo "<br>++++".$_SESSION['main_array2'][$b]['user2_id'];
                                        
                                        print_r($_SESSION['last_id_arr']);
                                        print_r($_SESSION['main_array1']);
                                        
                                        $uidsmaupd=$_SESSION['main_array1'][$a]['user1_id'];
                                        $relsmaupd=$_SESSION['main_array1'][$a]['relation'];

                                        {    
                                            // father table 0
                                            $fat="select * from father where user_id='$uidsmaupd'";
                                            $resfat=mysqli_query($con, $fat);
                                            // $fetfat=mysqli_fetch_assoc($resfat);
                                            $fatarray=[];
                                            for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                                                $fatarray['user1_id']=$fetfat['father_id'];
                                                $fatarray['is_searched']='false';
                                                $fatarray['relation']='father';
                                                $fatarray['ref_id']=$uidsmaupd;
                                                $multi_arr3[]=$fatarray;
                                                //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
                                            }
                                            
                                            // mother table 1
                                            $mot="select * from mother where user_id='$uidsmaupd'";
                                            $resmot=mysqli_query($con, $mot);
                                            $motarray=[];
                                            for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                                                // $fetmot=mysqli_fetch_assoc($resmot);
                                                $motarray['user1_id']=$fetmot['mother_id'];
                                                $motarray['is_searched']='false';
                                                $motarray['relation']='mother';
                                                $motarray['ref_id']=$uidsmaupd;;
                                                $multi_arr3[]=$motarray;
                                            }
                                            
                                            // son table 2
                                            $son="select * from son where user_id='$uidsmaupd'";
                                            $resson=mysqli_query($con, $son);
                                            // $fetson=mysqli_fetch_assoc($resson); 
                                            $sonarray=[];
                                            for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                                                $sonarray['user1_id']=$fetson['son_id'];
                                                $sonarray['is_searched']='false';
                                                $sonarray['relation']='son';
                                                $sonarray['ref_id']=$uidsmaupd;
                                                $multi_arr3[] = $sonarray ;
                                            }
                                            
                                            // daughter table 3
                                            $dau="select * from daughter where user_id='$uidsmaupd'";
                                            $resdau=mysqli_query($con, $dau);
                                            // $fetdau=mysqli_fetch_assoc($resdau);
                                            $dauarray=[];
                                            for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                                                $dauarray['user1_id']=$fetdau['daughter_id'];
                                                $dauarray['is_searched']='false';
                                                $dauarray['relation']='daughter';
                                                $dauarray['ref_id']=$uidsmaupd;
                                                $multi_arr3[]=$dauarray;
                                            }

                                            // brother table 4
                                            $bro="select * from brother where user_id='$uidsmaupd'";
                                            $resbro=mysqli_query($con, $bro);
                                            // $fetbro=mysqli_fetch_assoc($resbro);
                                            $broarray=[];
                                            for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
                                                $broarray['user1_id']=$fetbro['brother_id'];
                                                $broarray['is_searched']='false';
                                                $broarray['relation']='brother';
                                                $broarray['ref_id']=$uidsmaupd;
                                                $multi_arr3[]=$broarray;
                                            }
                                            
                                            // sister table 5
                                            $sis="select * from sister where user_id='$uidsmaupd'";
                                            $ressis=mysqli_query($con, $sis);
                                            // $fetsis=mysqli_fetch_assoc($ressis);
                                            $sisarray=[];
                                            for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                                                $sisarray['user1_id']=$fetsis['sister_id'];
                                                $sisarray['is_searched']='false';
                                                $sisarray['relation']='sister';
                                                $sisarray['ref_id']=$uidsmaupd;
                                                $multi_arr3[]=$sisarray;
                                            }
                                            
                                            // husband table 6
                                            $hus="select * from husband where user_id='$uidsmaupd'";
                                            $reshus=mysqli_query($con, $hus);
                                            // $fethus=mysqli_fetch_assoc($reshus);
                                            $husarray=[];
                                            for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                                                $husarray['user1_id']=$fethus['husband_id'];
                                                $husarray['is_searched']='false';
                                                $husarray['relation']='husband';
                                                $husarray['ref_id']=$uidsmaupd;
                                                $multi_arr3[]=$husarray;
                                            }
                                            
                                            // wife table 7
                                            $wi="select * from wife where user_id='$uidsmaupd'";
                                            $reswi=mysqli_query($con, $wi);
                                            // $fetwi=mysqli_fetch_assoc($reswi);
                                            $wifearray=[];
                                            for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                                                $wifearray['user1_id']=$fetwi['wife_id'];
                                                $wifearray['is_searched']='false';
                                                $wifearray['relation']='wife';
                                                $wifearray['ref_id']=$uidsmaupd;
                                                $multi_arr3[]=$wifearray;
                                            }
                                        }

                                        //merge all array here
                                        // $_SESSION['main_array']=$main_array;
                                        // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
                                        $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
                                        $multi_arr3=[];


                                        echo "<pre>";
                                        // echo "<br><br>all table data store in array<br>";
                                        // print_r($multi_arr3);  
                                        // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                                        // print_r($_SESSION['main_array2']);
                                        
                                        // declare array in which all last id is check stores 
                                        $lidarray=[];
                                        // echo "<br><br>all last id data store in array<br>";
                                        $lidarray['uid']=$uidsmaupd;
                                        $lidarray['is_searched']="true";
                                        $lidarray['relation']=$relsmaupd;
                                        $last_id_arr[]=$lidarray;
                                        
                                        //merge last id array  
                                        $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                                        // array_push($last_id_arr,$u1);
                                        echo "+++++++LAST ID SESSION ARRAY IS ";
                                        // print_r($_SESSION['last_id_arr']);
                                        // print_r($_SESSION['main_array1']);
                                        $last_id_arr=[];


                                        fetchdetails();
                                    }                                    
                                }
                            }
                            
                        }
                    }
                }                
            }


            function defaultsearch2(){
                global $con;
                for($a=0; $a<count($_SESSION['main_array1']); $a++){
                    for($b=0; $b<count($_SESSION['main_array2']); $b++){
                        if($_SESSION['main_array1'][$a]['user1_id'] == $_SESSION['main_array2'][$b]['user2_id']){

                            echo "<br>@---".$_SESSION['main_array1'][$a]['user1_id'];
                            echo "<br>@++++".$_SESSION['main_array2'][$b]['user2_id'];
                            $uidsmaupd=$_SESSION['main_array1'][$a]['user1_id'];
                            $relsmaupd=$_SESSION['main_array1'][$a]['relation'];

                            {    
                                // father table 0
                                $fat="select * from father where user_id='$uidsmaupd'";
                                $resfat=mysqli_query($con, $fat);
                                // $fetfat=mysqli_fetch_assoc($resfat);
                                $fatarray=[];
                                for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                                    $fatarray['user1_id']=$fetfat['father_id'];
                                    $fatarray['is_searched']='false';
                                    $fatarray['relation']='father';
                                    $fatarray['ref_id']=$uidsmaupd;
                                    $multi_arr3[]=$fatarray;
                                    //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
                                }
                                
                                // mother table 1
                                $mot="select * from mother where user_id='$uidsmaupd'";
                                $resmot=mysqli_query($con, $mot);
                                $motarray=[];
                                for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
                                    // $fetmot=mysqli_fetch_assoc($resmot);
                                    $motarray['user1_id']=$fetmot['mother_id'];
                                    $motarray['is_searched']='false';
                                    $motarray['relation']='mother';
                                    $motarray['ref_id']=$uidsmaupd;;
                                    $multi_arr3[]=$motarray;
                                }
                                
                                // son table 2
                                $son="select * from son where user_id='$uidsmaupd'";
                                $resson=mysqli_query($con, $son);
                                // $fetson=mysqli_fetch_assoc($resson); 
                                $sonarray=[];
                                for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                                    $sonarray['user1_id']=$fetson['son_id'];
                                    $sonarray['is_searched']='false';
                                    $sonarray['relation']='son';
                                    $sonarray['ref_id']=$uidsmaupd;
                                    $multi_arr3[] = $sonarray ;
                                }
                                
                                // daughter table 3
                                $dau="select * from daughter where user_id='$uidsmaupd'";
                                $resdau=mysqli_query($con, $dau);
                                // $fetdau=mysqli_fetch_assoc($resdau);
                                $dauarray=[];
                                for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
                                    $dauarray['user1_id']=$fetdau['daughter_id'];
                                    $dauarray['is_searched']='false';
                                    $dauarray['relation']='daughter';
                                    $dauarray['ref_id']=$uidsmaupd;
                                    $multi_arr3[]=$dauarray;
                                }

                                // brother table 4
                                $bro="select * from brother where user_id='$uidsmaupd'";
                                $resbro=mysqli_query($con, $bro);
                                // $fetbro=mysqli_fetch_assoc($resbro);
                                $broarray=[];
                                for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
                                    $broarray['user1_id']=$fetbro['brother_id'];
                                    $broarray['is_searched']='false';
                                    $broarray['relation']='brother';
                                    $broarray['ref_id']=$uidsmaupd;
                                    $multi_arr3[]=$broarray;
                                }
                                
                                // sister table 5
                                $sis="select * from sister where user_id='$uidsmaupd'";
                                $ressis=mysqli_query($con, $sis);
                                // $fetsis=mysqli_fetch_assoc($ressis);
                                $sisarray=[];
                                for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
                                    $sisarray['user1_id']=$fetsis['sister_id'];
                                    $sisarray['is_searched']='false';
                                    $sisarray['relation']='sister';
                                    $sisarray['ref_id']=$uidsmaupd;
                                    $multi_arr3[]=$sisarray;
                                }
                                
                                // husband table 6
                                $hus="select * from husband where user_id='$uidsmaupd'";
                                $reshus=mysqli_query($con, $hus);
                                // $fethus=mysqli_fetch_assoc($reshus);
                                $husarray=[];
                                for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
                                    $husarray['user1_id']=$fethus['husband_id'];
                                    $husarray['is_searched']='false';
                                    $husarray['relation']='husband';
                                    $husarray['ref_id']=$uidsmaupd;
                                    $multi_arr3[]=$husarray;
                                }
                                
                                // wife table 7
                                $wi="select * from wife where user_id='$uidsmaupd'";
                                $reswi=mysqli_query($con, $wi);
                                // $fetwi=mysqli_fetch_assoc($reswi);
                                $wifearray=[];
                                for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
                                    $wifearray['user1_id']=$fetwi['wife_id'];
                                    $wifearray['is_searched']='false';
                                    $wifearray['relation']='wife';
                                    $wifearray['ref_id']=$uidsmaupd;
                                    $multi_arr3[]=$wifearray;
                                }
                            }

                            //merge all array here
                            // $_SESSION['main_array']=$main_array;
                            // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
                            $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
                            $multi_arr3=[];


                            echo "<pre>";
                            // echo "<br><br>all table data store in array<br>";
                            // print_r($multi_arr3);  
                            // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                            // print_r($_SESSION['main_array2']);
                            
                            // declare array in which all last id is check stores 
                            $lidarray=[];
                            // echo "<br><br>all last id data store in array<br>";
                            $lidarray['uid']=$uidsmaupd;
                            $lidarray['is_searched']="true";
                            $lidarray['relation']=$relsmaupd;
                            $last_id_arr[]=$lidarray;
                            
                            //merge last id array  
                            $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                            // array_push($last_id_arr,$u1);
                            echo "+++++++LAST ID SESSION ARRAY IS ";
                            print_r($_SESSION['last_id_arr']);
                            // print_r($_SESSION['main_array1']);
                            $last_id_arr=[];
                            fetchdetails();
                        }
                    }
                }
            }


            // function u1searchinu2($u1){
            //     // global $u1,$u2;
            //     $sma1=$_SESSION['main_array1'];
            //     $sma2=$_SESSION['main_array2'];
            //     for($i=0; $i<count($sma2); $i++){
            //         // echo "MASTER ARRAY";
            //         // echo "<br>".$u1;
            //         // print_r($sma1);
            //         if($u1 == $sma2[$i]['user2_id']){
            //             echo "<br>match found";
            //         }
            //         else{ 
            //             echo "<br>match not found".$i;
            //         }
            //     }
            // }
            
            function u2searchinu1($u2){
                // global $u1,$u2;
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                for($i=0; $i<count($sma1); $i++){
                    if($u2 == $sma1[$i]['user1_id']){
                        echo "<br>match found in 2";
                        fetchdetails();
                    }
                    else{ 
                        echo "<br>match not found U2 TO U1";
                    }
                }
            }

            function deepsearch(){
                global $u1,$u2;
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                // print_r($_SESSION['last_id_arr']);
                for($i=0; $i<count($sma1); $i++){
                    for($j=0; $j<count($sma2); $j++){
                        if($sma1[$i]['user1_id']== $sma2[$j]['user2_id']){
                            echo "<br>yes<br>";
                            echo $sma1[$i]['user1_id'];
                            echo $sma2[$j]['user2_id'];
                            // fetchdetails();
                            defaultsearch2();
                        }
                        else{
                            echo "no";
                            // print_r($sma1);
                            // print_r($sma2);
                        }
                    }
                }
            }

            mainsearch();
            u2searchinu1($u2);
            // u1searchinu2($u1);
            deepsearch();
            defaultsearch1();
            echo "<br>OUTSIDE FUNCTION";
            // print_r($_SESSION['main_array1']);
            // print_r($_SESSION['main_array2']);
            
        }
        else{
            echo "Data not found for user 2";
        }
    }
    else{
        echo "Data not found user 1";
    }

    // echo "User1 is ".$us_fn1." ".$us_ln1;
    // echo "<br>-User2 is-- ".$us_fn2." ".$us_ln2;
    // echo "hellfsdfsfsdafsfso";
?>