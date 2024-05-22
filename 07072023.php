<?php
    session_start();
    error_reporting(0);
    include_once "connection.php";

    unset($_SESSION['last_id_arr_2']);
    
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
            $last_id_arr_2=array();
            $last_id_empty=array();
            
            // function pushintolastidarr($uidsmaupd,$relsmaupd,$refsmaupd){
            //     // declare array in which all last id is check stores 
            //     $lidarray=[];
            //     // echo "<br><br>all last id data store in array<br>";
            //     $lidarray['uid']=$uidsmaupd;
            //     $lidarray['is_searched']="true";
            //     $lidarray['relation']=$relsmaupd;
            //     $last_id_arr[]=$lidarray;
                
            //     //merge last id array  
            //     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
            //     echo ":BEFORE UPDATE";
            //     print_r($_SESSION['last_id_arr']);
                
            // }

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

                //  // declare array in which all last id is check stores 
                //  $lidarray_2=[];
                //  // echo "<br><br>all last id data store in array<br>";
                //  $lidarray_2['uid']=$u2;
                //  $lidarray_2['is_searched']="true";
                //  $lidarray_2['relation']='user_2';
                //  $last_id_arr_2[]=$lidarray_2;
                //  $_SESSION['last_id_arr_2']=array_merge($last_id_arr_2);
                //  // array_push($last_id_arr,$u1);
                //  // print_r($last_id_arr);

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
                global $u2,$search_user1,$search_user2;
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                $slid=$_SESSION['last_id_arr'];
                $slid2=$_SESSION['last_id_arr_2'];
                echo "CHECKUSER@STATUES+++".$search_user1;
                // $sma1['ref_id']==  
                
                // for($y=0; $y<count($sma1); $y++){
                //     // echo ':hey';
                //     // echo $u2;
                //     // print_r($_SESSION['main_array1']);
                //     // echo "<br>SESSION USER ID".$sma1[$y]['user1_id'];
                //     if($sma1[$y]['user1_id']==$u2){
                //         // echo $sma1[$y]['user1_id'];
                //         // declare array in which all last id is check stores 
                //         $lidarray=[];
                //         // echo "<br><br>all last id data store in array<br>";
                //         $lidarray['uid']=$sma1[$y]['user1_id'];
                //         $lidarray['is_searched']="true";
                //         $lidarray['relation']=$sma1[$y]['relation'];
                //         $last_id_arr[]=$lidarray;
                //         // echo "INSIDE FUNCTION";
                //         If(empty($_SESSION['last_id_arr_2'])){
                //             // $_SESSION['last_id_arr_2']=$last_id_arr_2;
                //             $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                            
                //         }
                //         else{
                //             $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$_SESSION['last_id_arr_2'],$last_id_arr);
                //             // $_SESSION['last_id_arr_2']=$last_id_arr;
                //         }


                //         //merge last id array  
                //         // $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                //         // array_push($last_id_arr,$u1);
                //         echo "<br>+++++++LAST ID SESSION ARRAY IS ";
                //         print_r($_SESSION['last_id_arr']);
                //         echo "<br>+++++++LAST ID SESSION ARRAY IS 222";
                //         print_r($_SESSION['last_id_arr_2']);
                //         // echo "<br>ARRAY 1------<br>";
                //         // print_r($_SESSION['main_array1']);
                //         // echo "<br>ARRAY 2------<br>";
                //         // print_r($_SESSION['main_array2']);
                //         $last_id_arr=[];

                //         // //print_r($sma1);
                //         if($sma1[$y]['relation']=="father"){
                //             $val2=$sma1[$y]['user1_id'];
                //             fatherofuser($val2);
                //             exit;

                //         }
                //         if($sma1[$y]['relation']=="mother"){
                //             $val2=$sma1[$y]['user1_id'];
                //             motherofuser($val2);
                //             exit;

                //         }
                //         if($sma1[$y]['relation']=="son"){
                //             $val2=$sma1[$y]['user1_id'];
                //             // echo $sma1[$y]['relation'];
                //             //print_r($last_id_arr);
                //             sonofuser($val2);
                //             echo "<br>USER_1-ARRAY<br>";
                //             print_r($sma1);
                //             echo "<br>USER_2-ARRAY<br>";
                //             print_r($sma2);
                //             exit;
                //         }
                //         if($sma1[$y]['relation']=="daughter"){
                //             $val2=$sma1[$y]['user1_id'];
                //             daughterofuser($val2);
                //             exit;

                //         }
                //         if($sma1[$y]['relation']=="brother"){
                //             $val2=$sma1[$y]['user1_id'];
                //             brotherofuser($val2);
                //             exit;

                //         }
                //         if($sma1[$y]['relation']=="sister"){
                //             $val2=$sma1[$y]['user1_id'];
                //             sisterofuser($val2);
                //             exit;

                //         }
                //         if($sma1[$y]['relation']=="husband"){
                //             $val2=$sma1[$y]['user1_id'];
                //             husbandofuser($val2);
                //             exit;

                //         }
                //         if($sma1[$y]['relation']=="wife"){
                //             $val2=$sma1[$y]['user1_id'];
                //             wifeofuser($val2);
                //             exit;
                //         }
                        
                //     }
                // }

                for($x=0; $x<count($sma1); $x++){
                    for($y=0; $y<count($sma2); $y++){
                        echo "<br>last id value is ".$sma1[$x]['ref_id'];
                        // print_r($slid2);
                        echo "<br>ref id value is ".$sma2[$y]["user2_id"];
                        echo "<br>";
                        if($sma1[$x]['ref_id']==$sma2[$y]["user2_id"]){
                            echo "executed->".$sma2[$y]["ref_id"];
                            $src=array_search($sma2[$y]["ref_id"], array_column($sma1, 'user1_id'));
                            echo "<br>searched value is ".$src;

                            // declare array in which all last id is check stores 
                            $lidarray=[];
                            echo "<br><br>all last id data store in array<br>";
                            $lidarray['uid']=$sma1[$src]['user1_id'];
                            $lidarray['is_searched']="true";
                            $lidarray['relation']=$sma1[$src]['relation'];
                            $last_id_arr[]=$lidarray;
                            $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                            $last_id_arr=[];
                            
                            // print_r($sma1);
                            
                            for($z=0; $z<count($sma2); $z++){
                                if($sma2[$z]['ref_id']==$sma2[$y]["ref_id"]){
                                    // echo "CON TRUE!!!";
                                    // if($sma2[$z]['user2_id']==$u2){
                                    //     echo "data found";
                                    // }
                                      
                                    if($sma2[$z]['user2_id']==$u2){
                                        // echo $sma2[$z]['user2_id'];

                                        // // declare array in which all last id is check stores 
                                        $lidarray=[];
                                        // echo "<br><br>all last id data store in array<br>";
                                        $lidarray['uid']=$sma2[$z]['user2_id'];
                                        $lidarray['is_searched']="true";
                                        $lidarray['relation']=$sma2[$z]['relation'];
                                        $last_id_arr[]=$lidarray;
                                        
                                        $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                                        // If(empty($_SESSION['last_id_arr_2'])){
                                        //     // $_SESSION['last_id_arr_2']=$last_id_arr_2;
                                        //     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                                            
                                        // }
                                        // else{
                                        //     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$_SESSION['last_id_arr_2'],$last_id_arr);
                                        //     // $_SESSION['last_id_arr_2']=$last_id_arr;
                                        // }
                
                
                                        //merge last id array  
                                        // $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                                        // array_push($last_id_arr,$u1);
                                        echo "<br>+++++++LAST ID SESSION ARRAY IS ";
                                        print_r($_SESSION['last_id_arr']);
                                        echo "<br>+++++++LAST ID SESSION ARRAY IS 222";
                                        print_r($_SESSION['last_id_arr_2']);
                                        // echo "<br>ARRAY 1------<br>";
                                        // print_r($_SESSION['main_array1']);
                                        // echo "<br>ARRAY 2------<br>";
                                        // print_r($_SESSION['main_array2']);
                                        $last_id_arr=[];
                
                                        // //print_r($sma1);
                                        if($sma2[$z]['relation']=="father"){
                                            $val2=$sma2[$z]['user2_id'];
                                            fatherofuser($val2);
                                            exit;
                
                                        }
                                        if($sma2[$z]['relation']=="mother"){
                                            $val2=$sma2[$z]['user2_id'];
                                            motherofuser($val2);
                                            exit;
                
                                        }
                                        if($sma2[$z]['relation']=="son"){
                                            $val2=$sma2[$z]['user2_id'];
                                            // echo $sma2[$z]['relation'];
                                            //print_r($last_id_arr);
                                            sonofuser($val2);
                                            // echo "<br>USER_1-ARRAY<br>";
                                            // print_r($sma1);
                                            // echo "<br>USER_2-ARRAY<br>";
                                            // print_r($sma2);
                                            exit;
                                        }
                                        if($sma2[$z]['relation']=="daughter"){
                                            $val2=$sma2[$z]['user2_id'];
                                            daughterofuser($val2);
                                            exit;
                
                                        }
                                        if($sma2[$z]['relation']=="brother"){
                                            $val2=$sma2[$z]['user2_id'];
                                            brotherofuser($val2);
                                            exit;
                
                                        }
                                        if($sma2[$z]['relation']=="sister"){
                                            $val2=$sma2[$z]['user2_id'];
                                            sisterofuser($val2);
                                            exit;
                
                                        }
                                        if($sma2[$z]['relation']=="husband"){
                                            $val2=$sma2[$z]['user2_id'];
                                            husbandofuser($val2);
                                            exit;
                
                                        }
                                        if($sma2[$z]['relation']=="wife"){
                                            $val2=$sma2[$z]['user2_id'];
                                            wifeofuser($val2);
                                            exit;
                                        }
                                        
                                    }
                                }
                            }
                        }    
                    }   
                }
                
            }


            

            function generalsearch(){
                global $con,$u1,$uidsma;
                for($a=0; $a<count($_SESSION['main_array1']); $a++){
                    for($b=0; $b<count($_SESSION['main_array2']); $b++){
                        if($_SESSION['main_array1'][$a]['user1_id'] == $_SESSION['main_array2'][$b]['user2_id']){
                            
                            echo "<br>@---".$_SESSION['main_array1'][$a]['user1_id'];
                            // echo "<br>@++++".$_SESSION['main_array2'][$b]['user2_id'];
                            echo "<br>".$uidsmaupd=$_SESSION['main_array1'][$a]['user1_id'];
                            echo "<br>".$relsmaupd=$_SESSION['main_array1'][$a]['relation'];
                            echo "<br>".$refsmaupd=$_SESSION['main_array1'][$a]['ref_id'];
                            echo "<br>";
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
                            $src2=array_search(18, array_column($_SESSION['main_array1'], 'ref_id'));
                            echo "++++".$src2;
                            $uidsmaupd_2=$_SESSION['main_array1'][$src2]['user1_id'];
                            $relsmaupd_2=$_SESSION['main_array1'][$src2]['relation'];
                            $refsmaupd_2=$_SESSION['main_array1'][$src2]['ref_id'];

                            // pushintolastidarr($uidsmaupd_2,$relsmaupd_2,$refsmaupd_2);
                            //merge all array here
                            // $_SESSION['main_array']=$main_array;
                            // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
                            $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
                            $multi_arr3=[];

                            echo "<br><br>";
                            echo "<br>user id is ".$uidsmaupd;
                            echo "<br>relation is ".$relsmaupd;
                            echo "<br>ref id is ".$refsmaupd;
                            echo "<br><br>--".$u1."<br>";

                            $src=array_search($uidsmaupd, array_column($_SESSION['main_array1'], 'user1_id'));
                            $srcinside=array_search($refsmaupd, array_column($_SESSION['main_array1'], 'user1_id'));
                            
                            if($_SESSION['main_array1'][$srcinside]['ref_id']==$u1){
                                echo "inside function<br>";
                                echo $_SESSION['main_array1'][$srcinside]['user1_id']."+++".$_SESSION['main_array1'][$srcinside]['ref_id'];
                                    // declare array in which all last id is check stores 
                                    $lidarray=[];
                                    // echo "<br><br>all last id data store in array<br>";
                                    $lidarray['uid']=$_SESSION['main_array1'][$srcinside]['user1_id'];
                                    $lidarray['is_searched']="true";
                                    $lidarray['relation']=$_SESSION['main_array1'][$srcinside]['relation'];;
                                    $last_id_arr[]=$lidarray;
                                    
                                    //merge last id array  
                                    $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);

                                    echo ":BEFORE UPDATE";
                                    print_r($_SESSION['last_id_arr']);
                                    
                                // echo $_SESSION['main_array1'][$srcinside]['ref_id'];
                            }
                            else{
                                echo "not found";
                            }
                            
                            // for($ar1=$src; $_SESSION['main_array1'][$ar1]['ref_id']!=$u1; $ar1--){
                            //     // if($uidsmaupd)
                            //     echo "==INSIDE<br>";
                            //     echo $_SESSION['main_array1'][$ar1]['user1_id']."+++".$_SESSION['main_array1'][$ar1]['ref_id'];   
                                
                            //     if($_SESSION['main_array1'][$srcinside]['ref_id']==$_SESSION['main_array1'][$ar1]['user1_id']){
                            //         echo "HELLO".$_SESSION['main_array1'][$srcinside]['ref_id'];
                                    
                            //     }
                            //     echo "<br><br>".$srcinside;
                            // }

                            // echo "<pre>";
                            // echo "<br><br>all table data store in array<br>";
                            // print_r($multi_arr3);  
                            // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                            // print_r($_SESSION['main_array2']);
                            
                            // pushintolastidarr($uidsmaupd,$relsmaupd,$refsmaupd);
                            // array_push($last_id_arr,$u1);
                            // echo "+++++++LAST ID SESSION ARRAY IS ";
                            echo "GLOBAL VALUE OFuidsma ".$uidsma;
                            echo "general search";
                            print_r($_SESSION['last_id_arr']);
                            print_r($_SESSION['last_id_arr_2']);
                            print_r($_SESSION['main_array1']);
                            // print_r($_SESSION['main_array2']);
                            $last_id_arr=[];

                            
                            // for($i=0; $i<count($_SESSION['main_array1']); $i++){
                            //     for($j=0; $j<count($_SESSION['main_array2']); $j++){
                            //         if($_SESSION['main_array1'][$i]['user1_id'] == $_SESSION['main_array2'][$j]['ref_id']){
                            //             echo $_SESSION['main_array1'][$i]['user1_id']."---".$_SESSION['main_array2'][$j]['ref_id']."<br>";
                            //             echo "INSIDE<br>";
                            //         }       
                            //     }
                            // }


                            fetchdetails();
                        }
                        
                    }
                }
                // $pop=array_search($uidsma,array_column($_SESSION['last_id_arr'],"uid"));
                //             echo "KEY IS---".$pop;
            }
         
            function defaultsearch2($uidsma2,$relsma2,$j){ //17
                global $main_array,$con,$last_id_arr,$u2;
                
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                // for($i=0; $i<count($sma2); $i++){
                //     for($j=0; $j<count($sma1); $j++){
                        if($uidsma2==($sma2[$j]['is_searched']==='false')){
                            // echo "values of u2 single digit".$uidsma2;
                            // echo "values of u2 single digit".$sma2[$i]['is_searched'];
                            $uidsma=$uidsma2;
                            $relsma=$relsma2;
                            // $uidsma=$sma2['user2_id'];
                            // $relsma=$sma2['relation'];
                            $sma2['is_searched']='true';
                            {
                                // father table 0
                                $fat="select * from father where user_id='$uidsma'";
                                $resfat=mysqli_query($con, $fat);
                                // $fetfat=mysqli_fetch_assoc($resfat);
                                $fatarray=[];
                                for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
                                    $fatarray['user2_id']=$fetfat['father_id'];
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
                                    $motarray['user2_id']=$fetmot['mother_id'];
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
                                    $sonarray['user2_id']=$fetson['son_id'];
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
                                    $dauarray['user2_id']=$fetdau['daughter_id'];
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
                                    $broarray['user2_id']=$fetbro['brother_id'];
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
                                    $sisarray['user2_id']=$fetsis['sister_id'];
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
                                    $husarray['user2_id']=$fethus['husband_id'];
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
                                    $wifearray['user2_id']=$fetwi['wife_id'];
                                    $wifearray['is_searched']='false';
                                    $wifearray['relation']='wife';
                                    $wifearray['ref_id']=$uidsma;
                                    $multi_arr3[]=$wifearray;
                                }

                                //merge all array here
                                // $_SESSION['main_array']=$main_array;
                                // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
                                $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
                                $multi_arr3=[];


                                // echo "<pre>";
                                // echo "<br><br>all table data store in array<br>";
                                // print_r($multi_arr3);  
                                // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                                // print_r($_SESSION['main_array2']);
                                
                                // // declare array in which all last id is check stores 
                                // $lidarray=[];
                                // // echo "<br><br>all last id data store in array<br>";
                                // $lidarray['uid']=$uidsma;
                                // $lidarray['is_searched']="true";
                                // $lidarray['relation']=$relsma;
                                // $last_id_arr_2[]=$lidarray;
                                
                                // //merge last id array  
                                // $_SESSION['last_id_arr_2']=array_merge($last_id_arr_2);
                                
                                // // array_push($last_id_arr_2,$u1);
                                // echo "LAST ID SESSION ARRAY IS ";
                                // print_r($_SESSION['last_id_arr_2']);
                                // // print_r($_SESSION['main_array1']);
                                // // print_r($_SESSION['main_array2']);
                                // $last_id_arr_2=[];

                                
                                // //merge last id array  
                                // $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
                                // // array_push($last_id_arr,$u1);
                                // echo "LAST ID SESSION ARRAY IS ";
                                // print_r($_SESSION['last_id_arr']);
                                // // print_r($_SESSION['main_array1']);
                                // print_r($_SESSION['main_array2']);
                                // $last_id_arr=[];
                                
                                
                            }
                            generalsearch();
                            
                            // echo "return default search 2";
                            // $ind2=array_search($uidsma, array_column($_SESSION['last_id_arr_2'], 'uid')); //0
                            // unset($_SESSION['last_id_arr_2'][$ind2]);
                            echo "22222222222222";
                            print_r($_SESSION['last_id_arr_2']);
                        }
                //     }
                // }                
            }


            function defaultsearch1(){
                global $main_array,$con,$last_id_arr,$u2,$uidsma;
                
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                for($i=0; $i<count($sma1); $i++){
                    for($j=0; $j<count($sma2); $j++){
                        if($sma1[$i]['user1_id']==($sma1[$i]['is_searched']==='false')){
                            $uidsma=$sma1[$i]['user1_id'];
                            $relsma=$sma1[$i]['relation'];
                            $refsma=$sma1[$i]['ref_id'];
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


                                // echo "<pre>";
                                // echo "<br><br>all table data store in array<br>";
                                // print_r($multi_arr3);  
                                // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
                                // print_r($_SESSION['main_array2']);
                                
                                // // declare array in which all last id is check stores 
                                // $lidarray=[];
                                // // echo "<br><br>all last id data store in array<br>";
                                // $lidarray['uid']=$uidsma;
                                // $lidarray['is_searched']="true";
                                // $lidarray['relation']=$relsma;
                                // $last_id_arr[]=$lidarray;
                                
                                // //merge last id array  
                                // $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);



                                // array_push($last_id_arr,$u1);
                                echo "LAST ID SESSION ARRAY IS ";
                                print_r($_SESSION['last_id_arr']);
                                // print_r($_SESSION['main_array1']);
                                // print_r($_SESSION['main_array2']);
                                // $last_id_arr=[];
                                
                            }
                            echo $uidsma2=$sma2[$j]['user2_id'];
                            echo $relsma2=$sma2[$j]['relation'];
                            generalsearch();
                            defaultsearch2($uidsma2,$relsma2,$j);
                            $sma2[$j]['is_searched']='true';
                            
                            // pushintolastidarr($uidsma,$relsma,$refsma);

                            // $ind1=array_search($uidsma, array_column($_SESSION['last_id_arr'], 'uid')); //0
                            // unset($_SESSION['last_id_arr'][$ind1]);
                            echo "AsDASDASDASDASD";
                            print_r($_SESSION['last_id_arr']);
                            // array_pop($_SESSION['last_id_arr']);
                            // print_r($_SESSION['last_id_arr']);

                        }
                    }
                }                
            }


            function u2searchinu1($u2){
                // global $u1,$u2;
                $sma1=$_SESSION['main_array1'];
                $sma2=$_SESSION['main_array2'];
                for($i=0; $i<count($sma1); $i++){
                    if($u2 == $sma1[$i]['user1_id']){
                        // echo "<br>match found in 2";
                        fetchdetails();
                    }
                    else{ 
                        // echo "<br>match not found U2 TO U1";
                    }
                }
            }

            // function deepsearch(){
            //     global $u1,$u2;
            //     $sma1=$_SESSION['main_array1'];
            //     $sma2=$_SESSION['main_array2'];
            //     print_r($sma1);
            //     // print_r($_SESSION['last_id_arr']);
            //     for($i=0; $i<count($sma1); $i++){
            //         for($j=0; $j<count($sma2); $j++){
            //             if($sma1[$i]['user1_id']== $sma2[$j]['user2_id']){
            //                 echo "<br>yes<br>";
            //                 // fetchdetails();
            //             }
            //             else{
            //                 // echo "no";
            //                 echo "<br>";
            //                 echo $sma1[$i]['user1_id']."---".$sma2[$j]['user2_id'];
            //                 // print_r($sma2);
            //             }
            //         }
            //     }
            //     echo "<br>";
            // }

            mainsearch();
            u2searchinu1($u2);
            // u1searchinu2($u1);
            // deepsearch();
            generalsearch();
            defaultsearch1();
            // deepsearch();
            // defaultsearch2();
            // deepsearch();

            echo "<br>OUTSIDE FUNCTION";
            print_r($_SESSION['main_array1']);
            print_r($_SESSION['main_array2']);
            
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


<!-- <?php
    // session_start();
    // error_reporting(0);
    // include_once "connection.php";
    
    // $us_fn1=$_POST['us_fn1'];
    // $us_ln1=$_POST['us_ln1'];
    // $us_fn2=$_POST['us_fn2'];
    // $us_ln2=$_POST['us_ln2'];

    // //check and get data of user 1 from database if exists or not
    // $getu1="select * from user where u_fname='$us_fn1' and u_lname='$us_ln1'";
    // $resgetu1=mysqli_query($con, $getu1);
    
    // //if uesr 1 record is found then it will execute
    // if(mysqli_num_rows($resgetu1)>0){
    //     $fetchgetu1=mysqli_fetch_assoc($resgetu1);

    //     // echo $fetchgetu1['user_id'];
    //     //echo "User 1 is ".$fetchgetu1['u_fname']." ".$fetchgetu1['u_lname']." ID is ".$fetchgetu1['user_id']."<br>";
    //     $u1= $fetchgetu1['user_id'];    //store user 1 id in variable
        
    //     //check and get data of user 2 from database if exists or not
    //     $getu2="select * from user where u_fname='$us_fn2' and u_lname='$us_ln2'";
    //     $resgetu2=mysqli_query($con, $getu2);
        
    //     //if uesr 2 record is found then it will execute
    //     if(mysqli_num_rows($resgetu2)>0){
    //         $fetchgetu2=mysqli_fetch_assoc($resgetu2);

    //         // echo $fetchgetu2['user_id'];
    //         //echo "User 2 is ".$fetchgetu2['u_fname']." ".$fetchgetu2['u_lname']." ID is ".$fetchgetu2['user_id']."<br>";
    //         $u2= $fetchgetu2['user_id'];    //store user 2 id in variable
           
            
    //         // now we will check user 1 id in all table one by one and store in multi-array
    //         //declare value in multi-array of all tables
    //         $main_array=array();
    //         $main_array2=array();

    //         $multi_arr1=array(); 
    //         $multi_arr2=array(); 
    //         $multi_arr3=array(); 
            
    //         $last_id_arr=array();
    //         $last_id_empty=array();
            


    //         function mainsearch(){
    //             global $main_array,$con,$u1,$u2;
                
    //             // father table 0
    //             $fat="select * from father where user_id='$u1'";
    //             $resfat=mysqli_query($con, $fat);
    //             // $fetfat=mysqli_fetch_assoc($resfat);
    //             $fatarray=[];
    //             for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                 $fatarray['user1_id']=$fetfat['father_id'];
    //                 $fatarray['is_searched']='false';
    //                 $fatarray['relation']='father';
    //                 $fatarray['ref_id']=$u1;
    //                 $multi_arr1[]=$fatarray;
    //                 //echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
    //             }
                
    //             // mother table 1
    //             $mot="select * from mother where user_id='$u1'";
    //             $resmot=mysqli_query($con, $mot);
    //             $motarray=[];
    //             for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                 // $fetmot=mysqli_fetch_assoc($resmot);
    //                 $motarray['user1_id']=$fetmot['mother_id'];
    //                 $motarray['is_searched']='false';
    //                 $motarray['relation']='mother';
    //                 $motarray['ref_id']=$u1;;
    //                 $multi_arr1[]=$motarray;
    //             }

    //             // son table 2
    //             $son="select * from son where user_id='$u1'";
    //             $resson=mysqli_query($con, $son);
    //             // $fetson=mysqli_fetch_assoc($resson); 
    //             $sonarray=[];
    //             for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                 $sonarray['user1_id']=$fetson['son_id'];
    //                 $sonarray['is_searched']='false';
    //                 $sonarray['relation']='son';
    //                 $sonarray['ref_id']=$u1;
    //                 $multi_arr1[] = $sonarray ;
    //             }
                
    //             // daughter table 3
    //             $dau="select * from daughter where user_id='$u1'";
    //             $resdau=mysqli_query($con, $dau);
    //             // $fetdau=mysqli_fetch_assoc($resdau);
    //             $dauarray=[];
    //             for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                 $dauarray['user1_id']=$fetdau['daughter_id'];
    //                 $dauarray['is_searched']='false';
    //                 $dauarray['relation']='daughter';
    //                 $dauarray['ref_id']=$u1;
    //                 $multi_arr1[]=$dauarray;
    //             }

    //             // brother table 4
    //             $bro="select * from brother where user_id='$u1'";
    //             $resbro=mysqli_query($con, $bro);
    //             // $fetbro=mysqli_fetch_assoc($resbro);
    //             $broarray=[];
    //             for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                 $broarray['user1_id']=$fetbro['brother_id'];
    //                 $broarray['is_searched']='false';
    //                 $broarray['relation']='brother';
    //                 $broarray['ref_id']=$u1;
    //                 $multi_arr1[]=$broarray;
    //             }
                
    //             // sister table 5
    //             $sis="select * from sister where user_id='$u1'";
    //             $ressis=mysqli_query($con, $sis);
    //             // $fetsis=mysqli_fetch_assoc($ressis);
    //             $sisarray=[];
    //             for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                 $sisarray['user1_id']=$fetsis['sister_id'];
    //                 $sisarray['is_searched']='false';
    //                 $sisarray['relation']='sister';
    //                 $sisarray['ref_id']=$u1;
    //                 $multi_arr1[]=$sisarray;
    //             }

    //             // husband table 6
    //             $hus="select * from husband where user_id='$u1'";
    //             $reshus=mysqli_query($con, $hus);
    //             // $fethus=mysqli_fetch_assoc($reshus);
    //             $husarray=[];
    //             for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                 $husarray['user1_id']=$fethus['husband_id'];
    //                 $husarray['is_searched']='false';
    //                 $husarray['relation']='husband';
    //                 $husarray['ref_id']=$u1;
    //                 $multi_arr1[]=$husarray;
    //             }
                
    //             // wife table 7
    //             $wi="select * from wife where user_id='$u1'";
    //             $reswi=mysqli_query($con, $wi);
    //             // $fetwi=mysqli_fetch_assoc($reswi);
    //             $wifearray=[];
    //             for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                 $wifearray['user1_id']=$fetwi['wife_id'];
    //                 $wifearray['is_searched']='false';
    //                 $wifearray['relation']='wife';
    //                 $wifearray['ref_id']=$u1;
    //                 $multi_arr1[]=$wifearray;
    //             }

    //             //merge all array here
    //             // $_SESSION['main_array1']=$main_array;
    //             // $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr1);
    //             $_SESSION['main_array1']=array_merge($multi_arr1);


    //             echo "<pre>";
    //             // echo "<br><br>all table data store in array<br>";
    //             // print_r($multi_arr1);  
    //             // echo "<br><br>all table data store in MAIN ARRAY 1<br>";
    //             // print_r($main_array);
                
    //             // declare array in which all last id is check stores 
    //             $lidarray=[];
    //             // echo "<br><br>all last id data store in array<br>";
    //             $lidarray['uid']=$u1;
    //             $lidarray['is_searched']="true";
    //             $lidarray['relation']='user_1';
    //             $last_id_arr[]=$lidarray;
    //             $_SESSION['last_id_arr']=array_merge($last_id_arr);
    //             // array_push($last_id_arr,$u1);
    //             // print_r($last_id_arr);




    //             //search for user 2 (TWO)
    //             // father table 0
    //             $fat="select * from father where user_id='$u2'";
    //             $resfat=mysqli_query($con, $fat);
    //             // $fetfat=mysqli_fetch_assoc($resfat);
    //             $fatarray=[];
    //             for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                 $fatarray['user2_id']=$fetfat['father_id'];
    //                 $fatarray['is_searched']='false';
    //                 $fatarray['relation']='father';
    //                 $fatarray['ref_id']=$u2;
    //                 $multi_arr2[]=$fatarray;
    //                 //echo "<br>fat array val is ".$multi-arr2[$i][$j]; // store value in array
    //             }

    //             // mother table 1
    //             $mot="select * from mother where user_id='$u2'";
    //             $resmot=mysqli_query($con, $mot);
    //             $motarray=[];
    //             for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                 // $fetmot=mysqli_fetch_assoc($resmot);
    //                 $motarray['user2_id']=$fetmot['mother_id'];
    //                 $motarray['is_searched']='false';
    //                 $motarray['relation']='mother';
    //                 $motarray['ref_id']=$u2;;
    //                 $multi_arr2[]=$motarray;
    //             }

    //             // son table 2
    //             $son="select * from son where user_id='$u2'";
    //             $resson=mysqli_query($con, $son);
    //             // $fetson=mysqli_fetch_assoc($resson); 
    //             $sonarray=[];
    //             for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                 $sonarray['user2_id']=$fetson['son_id'];
    //                 $sonarray['is_searched']='false';
    //                 $sonarray['relation']='son';
    //                 $sonarray['ref_id']=$u2;
    //                 $multi_arr2[] = $sonarray ;
    //             }

    //             // daughter table 3
    //             $dau="select * from daughter where user_id='$u2'";
    //             $resdau=mysqli_query($con, $dau);
    //             // $fetdau=mysqli_fetch_assoc($resdau);
    //             $dauarray=[];
    //             for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                 $dauarray['user2_id']=$fetdau['daughter_id'];
    //                 $dauarray['is_searched']='false';
    //                 $dauarray['relation']='daughter';
    //                 $dauarray['ref_id']=$u2;
    //                 $multi_arr2[]=$dauarray;
    //             }

    //             // brother table 4
    //             $bro="select * from brother where user_id='$u2'";
    //             $resbro=mysqli_query($con, $bro);
    //             // $fetbro=mysqli_fetch_assoc($resbro);
    //             $broarray=[];
    //             for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                 $broarray['user2_id']=$fetbro['brother_id'];
    //                 $broarray['is_searched']='false';
    //                 $broarray['relation']='brother';
    //                 $broarray['ref_id']=$u2;
    //                 $multi_arr2[]=$broarray;
    //             }

    //             // sister table 5
    //             $sis="select * from sister where user_id='$u2'";
    //             $ressis=mysqli_query($con, $sis);
    //             // $fetsis=mysqli_fetch_assoc($ressis);
    //             $sisarray=[];
    //             for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                 $sisarray['user2_id']=$fetsis['sister_id'];
    //                 $sisarray['is_searched']='false';
    //                 $sisarray['relation']='sister';
    //                 $sisarray['ref_id']=$u2;
    //                 $multi_arr2[]=$sisarray;
    //             }

    //             // husband table 6
    //             $hus="select * from husband where user_id='$u2'";
    //             $reshus=mysqli_query($con, $hus);
    //             // $fethus=mysqli_fetch_assoc($reshus);
    //             $husarray=[];
    //             for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                 $husarray['user2_id']=$fethus['husband_id'];
    //                 $husarray['is_searched']='false';
    //                 $husarray['relation']='husband';
    //                 $husarray['ref_id']=$u2;
    //                 $multi_arr2[]=$husarray;
    //             }

    //             // wife table 7
    //             $wi="select * from wife where user_id='$u2'";
    //             $reswi=mysqli_query($con, $wi);
    //             // $fetwi=mysqli_fetch_assoc($reswi);
    //             $wifearray=[];
    //             for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                 $wifearray['user2_id']=$fetwi['wife_id'];
    //                 $wifearray['is_searched']='false';
    //                 $wifearray['relation']='wife';
    //                 $wifearray['ref_id']=$u2;
    //                 $multi_arr2[]=$wifearray;
    //             }

    //             //merge all array here
    //             // $_SESSION['main_array2']=$main_array;
    //             // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr2);
    //             $_SESSION['main_array2']=array_merge($multi_arr2);


    //             echo "<pre>";
    //             // echo "<br><br>all table data store in array<br>";
    //             // print_r($multi_arr2);  
    //             // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
    //             // print_r($_SESSION['main_array2']);

    //             // declare array in which all last id is check stores 
    //             // $lidarray=[];
    //             // // echo "<br><br>all last id data store in array<br>";
    //             // $lidarray['uid']=$u1;
    //             // $lidarray['is_searched']="true";
    //             // $lidarray['relation']='user_1';
    //             // $last_id_arr[]=$lidarray;
    //             // // array_push($last_id_arr,$u1);
    //             // print_r($last_id_arr);

    //             // $_SESSION['lst_arr']=$last_id_arr;
    //             //     $last=$_SESSION['lst_arr'];

    //         }

    //         function detail_fetch(){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
                
    //             for($i=1; $i<count($last_id_arr); $i++){
    //                 if($last_id_arr[$i]['is_searched']=='true'){
    //                     // echo "<br>INSIDE SON FUNCTION-----    ";
    //                     $lid=$last_id_arr[$i]['uid'];
    //                     // echo $lid ;

    //                         // $val1=$last_id_arr[$i]['uid'];
    //                         // echo $val1." ";


    //                         if($last_id_arr[$i]['relation']=="father"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<b>".$val2."</b> ".$val1;
                                
                                
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name3=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name3." ";
                                
    //                         }
    //                         if($last_id_arr[$i]['relation']=="mother"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name4=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name4." ";
    //                         }
    //                         if($last_id_arr[$i]['relation']=="son"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<b>".$val2."</b> ".$val1;
                                
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name5=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             echo "<b>".$val2."</b> ".$hold_name5."  ";
    //                         }
    //                         if($last_id_arr[$i]['relation']=="daughter"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name6=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name6." ";
    //                         }
    //                         if($last_id_arr[$i]['relation']=="brother"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name7=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name7." ";
    //                         }
    //                         if($last_id_arr[$i]['relation']=="sister"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name8=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name8." ";
    //                         }
    //                         if($last_id_arr[$i]['relation']=="husband"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name9=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name9." ";
    //                         }
    //                         if($last_id_arr[$i]['relation']=="wife"){
    //                             $val1=$last_id_arr[$i]['uid'];
    //                             $val2=$last_id_arr[$i]['relation'];
    //                             // echo "<br>---from function last id is ".$lid;
    //                             $getlastiddetail="select * from user where user_id='$val1'";
    //                             $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                             $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                             $hold_name10=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                             // echo $hold_name3."=====".$hold_name;
    //                             echo "<b>".$val2."</b> ".$hold_name10." ";
    //                         }

    //                 }
    //             }
    //         }

    //         //if user is father then call this function they might be son or daughter
    //         function fatherofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];

    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             // print_r($last_id_arr);
    //             //last push id is poped from array
    //             // echo $hold_name;
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch();
    //         }

    //         //if user is mother then call this function they might be son or daughter
    //         function motherofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             // //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch(); 
    //         }

    //         //if user is son then call this function they might be father or mother
    //         function sonofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch();
    //         }

    //         //if user is daughter then call this function they might be father or mother
    //         function daughterofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch();
    //         }

    //         //if user is brother then call this function they might be brother or sister
    //         function brotherofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
                    
    //             }
    //             detail_fetch();
    //             // echo "<br>last id is ".$lid;

    //         }

    //         //if user is sister then call this function they might be brother or sister
    //         function sisterofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch();
    //         }

    //         //if user is wife then call this function they should be husband
    //         function wifeofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
                
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch();
    //         }

    //         //if user is husband then call this function they should be wife
    //         function husbandofuser($val2){
    //             global $con,$u1;
    //             $last_id_arr=$_SESSION['last_id_arr'];
    //             $fat="select * from user where user_id='$val2'";
    //             $resfat=mysqli_query($con, $fat);
    //             $fetfat=mysqli_fetch_assoc($resfat);
    //             $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
    //             //print_r($last_id_arr);
    //             //last push id is poped from array
    //             if($last_id_arr[0]['relation']=="user_1")
    //             {
    //                 $lid=$last_id_arr[0]['uid'];
    //                 // echo "<br>---from function last id is ".$lid;
    //                 $getlastiddetail="select * from user where user_id='$lid'";
    //                 $regetlastiddetail=mysqli_query($con,$getlastiddetail);
    //                 $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
    //                 $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
    //                 echo "<br><b>Relation is:-</b><br> ".$hold_name2." ";
    //             }
    //             detail_fetch();
    //         }

    //         function fetchdetails(){
    //             global $u2;
    //             $sma1=$_SESSION['main_array1'];
    //             $sma2=$_SESSION['main_array2'];
    //             $slid=$_SESSION['last_id_arr'];
    //             echo "CHECKUSER@STATUES";

    //             for($y=0; $y<count($sma1); $y++){
    //                 // echo $u2;
    //                 // print_r($_SESSION['main_array1']);
    //                 echo "<br>SESSION LAST ID".$sma1[$y]['user1_id'];
    //                 if($sma1[$y]['user1_id']==$u2){
    //                     echo $sma1[$y]['user1_id'];
    //                     // declare array in which all last id is check stores 
    //                     $lidarray=[];
    //                     // echo "<br><br>all last id data store in array<br>";
    //                     $lidarray['uid']=$sma1[$y]['user1_id'];
    //                     $lidarray['is_searched']="true";
    //                     $lidarray['relation']=$sma1[$y]['relation'];
    //                     $last_id_arr[]=$lidarray;
                        
    //                     //merge last id array  
    //                     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                     // array_push($last_id_arr,$u1);
    //                     echo "<br>+++++++LAST ID SESSION ARRAY IS ";
    //                     print_r($_SESSION['last_id_arr']);
    //                     // print_r($_SESSION['main_array1']);
    //                     $last_id_arr=[];

    //                     // //print_r($sma1);
    //                     if($sma1[$y]['relation']=="father"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         fatherofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma1[$y]['relation']=="mother"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         motherofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma1[$y]['relation']=="son"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         // echo $sma1[$y]['relation'];
    //                         //print_r($last_id_arr);
    //                         sonofuser($val2);
    //                         exit;
    //                     }
    //                     if($sma1[$y]['relation']=="daughter"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         daughterofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma1[$y]['relation']=="brother"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         brotherofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma1[$y]['relation']=="sister"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         sisterofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma1[$y]['relation']=="husband"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         husbandofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma1[$y]['relation']=="wife"){
    //                         $val2=$sma1[$y]['user1_id'];
    //                         wifeofuser($val2);
    //                         exit;
    //                     }
    //                 }
    //             }

    //             for($y=0; $y<count($sma2); $y++){
    //                 // echo $u2;
    //                 // print_r($_SESSION['main_array1']);
    //                 echo "<br>SESSION LAST ID".$sma2[$y]['user2_id'];
    //                 if($sma2[$y]['user2_id']==$u2){
    //                     echo $sma2[$y]['user2_id'];
    //                     // declare array in which all last id is check stores 
    //                     $lidarray=[];
    //                     // echo "<br><br>all last id data store in array<br>";
    //                     $lidarray['uid']=$sma2[$y]['user2_id'];
    //                     $lidarray['is_searched']="true";
    //                     $lidarray['relation']=$sma2[$y]['relation'];
    //                     $last_id_arr[]=$lidarray;
                        
    //                     //merge last id array  
    //                     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                     // array_push($last_id_arr,$u1);
    //                     echo "<br>+++++++LAST ID SESSION ARRAY IS ";
    //                     print_r($_SESSION['last_id_arr']);
    //                     // print_r($_SESSION['main_array1']);
    //                     $last_id_arr=[];

    //                     // //print_r($sma2);
    //                     if($sma2[$y]['relation']=="father"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         fatherofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma2[$y]['relation']=="mother"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         motherofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma2[$y]['relation']=="son"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         // echo $sma2[$y]['relation'];
    //                         //print_r($last_id_arr);
    //                         sonofuser($val2);
    //                         exit;
    //                     }
    //                     if($sma2[$y]['relation']=="daughter"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         daughterofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma2[$y]['relation']=="brother"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         brotherofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma2[$y]['relation']=="sister"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         sisterofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma2[$y]['relation']=="husband"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         husbandofuser($val2);
    //                         exit;

    //                     }
    //                     if($sma2[$y]['relation']=="wife"){
    //                         $val2=$sma2[$y]['user2_id'];
    //                         wifeofuser($val2);
    //                         exit;
    //                     }
    //                 }
    //             }
    //         }

    //         function defaultsearch2(){
    //             global $main_array,$con,$last_id_arr,$u2;
                
    //             $sma1=$_SESSION['main_array1'];
    //             $sma2=$_SESSION['main_array2'];
    //             for($i=0; $i<count($sma2); $i++){
    //                 for($j=0; $j<count($sma1); $j++){
    //                     if($sma2[$i]['user2_id']==($sma2[$i]['is_searched']==='false')){
                            
    //                         $uidsma=$sma2[$i]['user2_id'];
    //                         $relsma=$sma2[$i]['relation'];
    //                         $sma2[$i]['is_searched']='true';
    //                         {
    //                             // father table 0
    //                             $fat="select * from father where user_id='$uidsma'";
    //                             $resfat=mysqli_query($con, $fat);
    //                             // $fetfat=mysqli_fetch_assoc($resfat);
    //                             $fatarray=[];
    //                             for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                                 $fatarray['user2_id']=$fetfat['father_id'];
    //                                 $fatarray['is_searched']='false';
    //                                 $fatarray['relation']='father';
    //                                 $fatarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$fatarray;
    //                                 //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
    //                             }
                                
    //                             // mother table 1
    //                             $mot="select * from mother where user_id='$uidsma'";
    //                             $resmot=mysqli_query($con, $mot);
    //                             $motarray=[];
    //                             for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                                 // $fetmot=mysqli_fetch_assoc($resmot);
    //                                 $motarray['user2_id']=$fetmot['mother_id'];
    //                                 $motarray['is_searched']='false';
    //                                 $motarray['relation']='mother';
    //                                 $motarray['ref_id']=$uidsma;;
    //                                 $multi_arr3[]=$motarray;
    //                             }
                                
    //                             // son table 2
    //                             $son="select * from son where user_id='$uidsma'";
    //                             $resson=mysqli_query($con, $son);
    //                             // $fetson=mysqli_fetch_assoc($resson); 
    //                             $sonarray=[];
    //                             for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                                 $sonarray['user2_id']=$fetson['son_id'];
    //                                 $sonarray['is_searched']='false';
    //                                 $sonarray['relation']='son';
    //                                 $sonarray['ref_id']=$uidsma;
    //                                 $multi_arr3[] = $sonarray ;
    //                             }
                                
    //                             // daughter table 3
    //                             $dau="select * from daughter where user_id='$uidsma'";
    //                             $resdau=mysqli_query($con, $dau);
    //                             // $fetdau=mysqli_fetch_assoc($resdau);
    //                             $dauarray=[];
    //                             for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                                 $dauarray['user2_id']=$fetdau['daughter_id'];
    //                                 $dauarray['is_searched']='false';
    //                                 $dauarray['relation']='daughter';
    //                                 $dauarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$dauarray;
    //                             }

    //                             // brother table 4
    //                             $bro="select * from brother where user_id='$uidsma'";
    //                             $resbro=mysqli_query($con, $bro);
    //                             // $fetbro=mysqli_fetch_assoc($resbro);
    //                             $broarray=[];
    //                             for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                                 $broarray['user2_id']=$fetbro['brother_id'];
    //                                 $broarray['is_searched']='false';
    //                                 $broarray['relation']='brother';
    //                                 $broarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$broarray;
    //                             }
                                
    //                             // sister table 5
    //                             $sis="select * from sister where user_id='$uidsma'";
    //                             $ressis=mysqli_query($con, $sis);
    //                             // $fetsis=mysqli_fetch_assoc($ressis);
    //                             $sisarray=[];
    //                             for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                                 $sisarray['user2_id']=$fetsis['sister_id'];
    //                                 $sisarray['is_searched']='false';
    //                                 $sisarray['relation']='sister';
    //                                 $sisarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$sisarray;
    //                             }
                                
    //                             // husband table 6
    //                             $hus="select * from husband where user_id='$uidsma'";
    //                             $reshus=mysqli_query($con, $hus);
    //                             // $fethus=mysqli_fetch_assoc($reshus);
    //                             $husarray=[];
    //                             for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                                 $husarray['user2_id']=$fethus['husband_id'];
    //                                 $husarray['is_searched']='false';
    //                                 $husarray['relation']='husband';
    //                                 $husarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$husarray;
    //                             }
                                
    //                             // wife table 7
    //                             $wi="select * from wife where user_id='$uidsma'";
    //                             $reswi=mysqli_query($con, $wi);
    //                             // $fetwi=mysqli_fetch_assoc($reswi);
    //                             $wifearray=[];
    //                             for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                                 $wifearray['user2_id']=$fetwi['wife_id'];
    //                                 $wifearray['is_searched']='false';
    //                                 $wifearray['relation']='wife';
    //                                 $wifearray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$wifearray;
    //                             }

    //                             //merge all array here
    //                             // $_SESSION['main_array']=$main_array;
    //                             // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                             $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                             $multi_arr3=[];


    //                             echo "<pre>";
    //                             // echo "<br><br>all table data store in array<br>";
    //                             // print_r($multi_arr3);  
    //                             // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
    //                             // print_r($_SESSION['main_array2']);
                                
    //                             // // declare array in which all last id is check stores 
    //                             // $lidarray=[];
    //                             // // echo "<br><br>all last id data store in array<br>";
    //                             // $lidarray['uid']=$uidsma;
    //                             // $lidarray['is_searched']="true";
    //                             // $lidarray['relation']=$relsma;
    //                             // $last_id_arr[]=$lidarray;
                                
    //                             // //merge last id array  
    //                             // $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                             // // array_push($last_id_arr,$u1);
    //                             // echo "()LAST ID SESSION ARRAY IS ";
    //                             // // print_r($_SESSION['last_id_arr']);
    //                             // // print_r($_SESSION['main_array2']);
    //                             // $last_id_arr=[];

    //                             // defaultsearch2();
                                
    //                         }
    //                         u2searchinu1($u2);
    //                         echo "PPPPP";
    //                         for($a=0; $a<count($_SESSION['main_array2']); $a++){
    //                             for($b=0; $b<count($_SESSION['main_array1']); $b++){
    //                                 if($_SESSION['main_array2'][$a]['user2_id'] == $_SESSION['main_array1'][$b]['user1_id']){

    //                                     echo "<br>---".$_SESSION['main_array2'][$a]['user2_id'];
    //                                     echo "<br>++++".$_SESSION['main_array1'][$b]['user1_id'];
                                        
    //                                     print_r($_SESSION['last_id_arr']);
    //                                     print_r($_SESSION['main_array2']);
                                        
    //                                     $uidsmaupd=$_SESSION['main_array2'][$a]['user2_id'];
    //                                     $relsmaupd=$_SESSION['main_array2'][$a]['relation'];
    //                                     $ref_id=$_SESSION['main_array2'][$a]['ref_id'];
    //                                     echo "UID OF U2 IS ".$uidsmaupd;
    //                                     echo "<br>RELATIONSHIP IS ".$relsmaupd;
    //                                     echo "<br>REF IS ".$ref_id;
    //                                     {    
    //                                         // father table 0
    //                                         $fat="select * from father where user_id='$uidsmaupd'";
    //                                         $resfat=mysqli_query($con, $fat);
    //                                         // $fetfat=mysqli_fetch_assoc($resfat);
    //                                         $fatarray=[];
    //                                         for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                                             $fatarray['user2_id']=$fetfat['father_id'];
    //                                             $fatarray['is_searched']='false';
    //                                             $fatarray['relation']='father';
    //                                             $fatarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$fatarray;
    //                                             //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
    //                                         }
                                            
    //                                         // mother table 1
    //                                         $mot="select * from mother where user_id='$uidsmaupd'";
    //                                         $resmot=mysqli_query($con, $mot);
    //                                         $motarray=[];
    //                                         for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                                             // $fetmot=mysqli_fetch_assoc($resmot);
    //                                             $motarray['user2_id']=$fetmot['mother_id'];
    //                                             $motarray['is_searched']='false';
    //                                             $motarray['relation']='mother';
    //                                             $motarray['ref_id']=$uidsmaupd;;
    //                                             $multi_arr3[]=$motarray;
    //                                         }
                                            
    //                                         // son table 2
    //                                         $son="select * from son where user_id='$uidsmaupd'";
    //                                         $resson=mysqli_query($con, $son);
    //                                         // $fetson=mysqli_fetch_assoc($resson); 
    //                                         $sonarray=[];
    //                                         for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                                             $sonarray['user2_id']=$fetson['son_id'];
    //                                             $sonarray['is_searched']='false';
    //                                             $sonarray['relation']='son';
    //                                             $sonarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[] = $sonarray ;
    //                                         }
                                            
    //                                         // daughter table 3
    //                                         $dau="select * from daughter where user_id='$uidsmaupd'";
    //                                         $resdau=mysqli_query($con, $dau);
    //                                         // $fetdau=mysqli_fetch_assoc($resdau);
    //                                         $dauarray=[];
    //                                         for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                                             $dauarray['user2_id']=$fetdau['daughter_id'];
    //                                             $dauarray['is_searched']='false';
    //                                             $dauarray['relation']='daughter';
    //                                             $dauarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$dauarray;
    //                                         }

    //                                         // brother table 4
    //                                         $bro="select * from brother where user_id='$uidsmaupd'";
    //                                         $resbro=mysqli_query($con, $bro);
    //                                         // $fetbro=mysqli_fetch_assoc($resbro);
    //                                         $broarray=[];
    //                                         for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                                             $broarray['user2_id']=$fetbro['brother_id'];
    //                                             $broarray['is_searched']='false';
    //                                             $broarray['relation']='brother';
    //                                             $broarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$broarray;
    //                                         }
                                            
    //                                         // sister table 5
    //                                         $sis="select * from sister where user_id='$uidsmaupd'";
    //                                         $ressis=mysqli_query($con, $sis);
    //                                         // $fetsis=mysqli_fetch_assoc($ressis);
    //                                         $sisarray=[];
    //                                         for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                                             $sisarray['user2_id']=$fetsis['sister_id'];
    //                                             $sisarray['is_searched']='false';
    //                                             $sisarray['relation']='sister';
    //                                             $sisarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$sisarray;
    //                                         }
                                            
    //                                         // husband table 6
    //                                         $hus="select * from husband where user_id='$uidsmaupd'";
    //                                         $reshus=mysqli_query($con, $hus);
    //                                         // $fethus=mysqli_fetch_assoc($reshus);
    //                                         $husarray=[];
    //                                         for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                                             $husarray['user2_id']=$fethus['husband_id'];
    //                                             $husarray['is_searched']='false';
    //                                             $husarray['relation']='husband';
    //                                             $husarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$husarray;
    //                                         }
                                            
    //                                         // wife table 7
    //                                         $wi="select * from wife where user_id='$uidsmaupd'";
    //                                         $reswi=mysqli_query($con, $wi);
    //                                         // $fetwi=mysqli_fetch_assoc($reswi);
    //                                         $wifearray=[];
    //                                         for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                                             $wifearray['user2_id']=$fetwi['wife_id'];
    //                                             $wifearray['is_searched']='false';
    //                                             $wifearray['relation']='wife';
    //                                             $wifearray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$wifearray;
    //                                         }
    //                                     }

    //                                     //merge all array here
    //                                     // $_SESSION['main_array']=$main_array;
    //                                     // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                                     $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                                     $multi_arr3=[];


    //                                     echo "<pre>";
    //                                     // echo "<br><br>all table data store in array<br>";
    //                                     // print_r($multi_arr3);  
    //                                     // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
    //                                     // print_r($_SESSION['main_array2']);
                                        
    //                                     // declare array in which all last id is check stores 
    //                                     $lidarray=[];
    //                                     // echo "<br><br>all last id data store in array<br>";
    //                                     $lidarray['uid']=$uidsmaupd;
    //                                     $lidarray['is_searched']="true";
    //                                     $lidarray['relation']=$relsmaupd;
    //                                     $last_id_arr[]=$lidarray;
                                        
    //                                     //merge last id array  
    //                                     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                                     // array_push($last_id_arr,$u1);
    //                                     echo "+++++++LAST ID SESSION ARRAY IS ";
    //                                     // print_r($_SESSION['last_id_arr']);
    //                                     // print_r($_SESSION['main_array1']);
    //                                     print_r($_SESSION['main_array2']);
    //                                     $last_id_arr=[];


    //                                     fetchdetails();
    //                                 }                                    
    //                             }
    //                         }
                            
    //                     }
    //                 }
    //             }                
    //         }

    //         function defaultsearch1(){
    //             global $main_array,$con,$last_id_arr,$u2;
                
    //             $sma1=$_SESSION['main_array1'];
    //             $sma2=$_SESSION['main_array2'];
    //             for($i=0; $i<count($sma1); $i++){
    //                 for($j=0; $j<count($sma2); $j++){
    //                     if($sma1[$i]['user1_id']==($sma1[$i]['is_searched']==='false')){
                            
    //                         $uidsma=$sma1[$i]['user1_id'];
    //                         $relsma=$sma1[$i]['relation'];
    //                         $sma1[$i]['is_searched']='true';
    //                         {
    //                             // father table 0
    //                             $fat="select * from father where user_id='$uidsma'";
    //                             $resfat=mysqli_query($con, $fat);
    //                             // $fetfat=mysqli_fetch_assoc($resfat);
    //                             $fatarray=[];
    //                             for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                                 $fatarray['user1_id']=$fetfat['father_id'];
    //                                 $fatarray['is_searched']='false';
    //                                 $fatarray['relation']='father';
    //                                 $fatarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$fatarray;
    //                                 //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
    //                             }
                                
    //                             // mother table 1
    //                             $mot="select * from mother where user_id='$uidsma'";
    //                             $resmot=mysqli_query($con, $mot);
    //                             $motarray=[];
    //                             for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                                 // $fetmot=mysqli_fetch_assoc($resmot);
    //                                 $motarray['user1_id']=$fetmot['mother_id'];
    //                                 $motarray['is_searched']='false';
    //                                 $motarray['relation']='mother';
    //                                 $motarray['ref_id']=$uidsma;;
    //                                 $multi_arr3[]=$motarray;
    //                             }
                                
    //                             // son table 2
    //                             $son="select * from son where user_id='$uidsma'";
    //                             $resson=mysqli_query($con, $son);
    //                             // $fetson=mysqli_fetch_assoc($resson); 
    //                             $sonarray=[];
    //                             for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                                 $sonarray['user1_id']=$fetson['son_id'];
    //                                 $sonarray['is_searched']='false';
    //                                 $sonarray['relation']='son';
    //                                 $sonarray['ref_id']=$uidsma;
    //                                 $multi_arr3[] = $sonarray ;
    //                             }
                                
    //                             // daughter table 3
    //                             $dau="select * from daughter where user_id='$uidsma'";
    //                             $resdau=mysqli_query($con, $dau);
    //                             // $fetdau=mysqli_fetch_assoc($resdau);
    //                             $dauarray=[];
    //                             for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                                 $dauarray['user1_id']=$fetdau['daughter_id'];
    //                                 $dauarray['is_searched']='false';
    //                                 $dauarray['relation']='daughter';
    //                                 $dauarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$dauarray;
    //                             }

    //                             // brother table 4
    //                             $bro="select * from brother where user_id='$uidsma'";
    //                             $resbro=mysqli_query($con, $bro);
    //                             // $fetbro=mysqli_fetch_assoc($resbro);
    //                             $broarray=[];
    //                             for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                                 $broarray['user1_id']=$fetbro['brother_id'];
    //                                 $broarray['is_searched']='false';
    //                                 $broarray['relation']='brother';
    //                                 $broarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$broarray;
    //                             }
                                
    //                             // sister table 5
    //                             $sis="select * from sister where user_id='$uidsma'";
    //                             $ressis=mysqli_query($con, $sis);
    //                             // $fetsis=mysqli_fetch_assoc($ressis);
    //                             $sisarray=[];
    //                             for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                                 $sisarray['user1_id']=$fetsis['sister_id'];
    //                                 $sisarray['is_searched']='false';
    //                                 $sisarray['relation']='sister';
    //                                 $sisarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$sisarray;
    //                             }
                                
    //                             // husband table 6
    //                             $hus="select * from husband where user_id='$uidsma'";
    //                             $reshus=mysqli_query($con, $hus);
    //                             // $fethus=mysqli_fetch_assoc($reshus);
    //                             $husarray=[];
    //                             for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                                 $husarray['user1_id']=$fethus['husband_id'];
    //                                 $husarray['is_searched']='false';
    //                                 $husarray['relation']='husband';
    //                                 $husarray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$husarray;
    //                             }
                                
    //                             // wife table 7
    //                             $wi="select * from wife where user_id='$uidsma'";
    //                             $reswi=mysqli_query($con, $wi);
    //                             // $fetwi=mysqli_fetch_assoc($reswi);
    //                             $wifearray=[];
    //                             for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                                 $wifearray['user1_id']=$fetwi['wife_id'];
    //                                 $wifearray['is_searched']='false';
    //                                 $wifearray['relation']='wife';
    //                                 $wifearray['ref_id']=$uidsma;
    //                                 $multi_arr3[]=$wifearray;
    //                             }

    //                             //merge all array here
    //                             // $_SESSION['main_array']=$main_array;
    //                             // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                             $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
    //                             $multi_arr3=[];


    //                             echo "<pre>";
    //                             // echo "<br><br>all table data store in array<br>";
    //                             // print_r($multi_arr3);  
    //                             // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
    //                             // print_r($_SESSION['main_array2']);
                                
    //                             // declare array in which all last id is check stores 
    //                             $lidarray=[];
    //                             // echo "<br><br>all last id data store in array<br>";
    //                             $lidarray['uid']=$uidsma;
    //                             $lidarray['is_searched']="true";
    //                             $lidarray['relation']=$relsma;
    //                             $last_id_arr[]=$lidarray;
                                
    //                             //merge last id array  
    //                             $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                             // array_push($last_id_arr,$u1);
    //                             echo "()LAST ID SESSION ARRAY IS ";
    //                             // print_r($_SESSION['last_id_arr']);
    //                             // print_r($_SESSION['main_array1']);
    //                             $last_id_arr=[];

                                
    //                         }
    //                         u2searchinu1($u2);
    //                         for($a=0; $a<count($_SESSION['main_array1']); $a++){
    //                             for($b=0; $b<count($_SESSION['main_array2']); $b++){
    //                                 if($_SESSION['main_array1'][$a]['user1_id'] == $_SESSION['main_array2'][$b]['user2_id']){

    //                                     echo "<br>---".$_SESSION['main_array1'][$a]['user1_id'];
    //                                     echo "<br>1++++".$_SESSION['main_array2'][$b]['user2_id'];
                                        
    //                                     print_r($_SESSION['last_id_arr']);
    //                                     print_r($_SESSION['main_array1']);
                                        
    //                                     $uidsmaupd=$_SESSION['main_array1'][$a]['user1_id'];
    //                                     $relsmaupd=$_SESSION['main_array1'][$a]['relation'];

    //                                     {    
    //                                         // father table 0
    //                                         $fat="select * from father where user_id='$uidsmaupd'";
    //                                         $resfat=mysqli_query($con, $fat);
    //                                         // $fetfat=mysqli_fetch_assoc($resfat);
    //                                         $fatarray=[];
    //                                         for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                                             $fatarray['user1_id']=$fetfat['father_id'];
    //                                             $fatarray['is_searched']='false';
    //                                             $fatarray['relation']='father';
    //                                             $fatarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$fatarray;
    //                                             //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
    //                                         }
                                            
    //                                         // mother table 1
    //                                         $mot="select * from mother where user_id='$uidsmaupd'";
    //                                         $resmot=mysqli_query($con, $mot);
    //                                         $motarray=[];
    //                                         for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                                             // $fetmot=mysqli_fetch_assoc($resmot);
    //                                             $motarray['user1_id']=$fetmot['mother_id'];
    //                                             $motarray['is_searched']='false';
    //                                             $motarray['relation']='mother';
    //                                             $motarray['ref_id']=$uidsmaupd;;
    //                                             $multi_arr3[]=$motarray;
    //                                         }
                                            
    //                                         // son table 2
    //                                         $son="select * from son where user_id='$uidsmaupd'";
    //                                         $resson=mysqli_query($con, $son);
    //                                         // $fetson=mysqli_fetch_assoc($resson); 
    //                                         $sonarray=[];
    //                                         for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                                             $sonarray['user1_id']=$fetson['son_id'];
    //                                             $sonarray['is_searched']='false';
    //                                             $sonarray['relation']='son';
    //                                             $sonarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[] = $sonarray ;
    //                                         }
                                            
    //                                         // daughter table 3
    //                                         $dau="select * from daughter where user_id='$uidsmaupd'";
    //                                         $resdau=mysqli_query($con, $dau);
    //                                         // $fetdau=mysqli_fetch_assoc($resdau);
    //                                         $dauarray=[];
    //                                         for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                                             $dauarray['user1_id']=$fetdau['daughter_id'];
    //                                             $dauarray['is_searched']='false';
    //                                             $dauarray['relation']='daughter';
    //                                             $dauarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$dauarray;
    //                                         }

    //                                         // brother table 4
    //                                         $bro="select * from brother where user_id='$uidsmaupd'";
    //                                         $resbro=mysqli_query($con, $bro);
    //                                         // $fetbro=mysqli_fetch_assoc($resbro);
    //                                         $broarray=[];
    //                                         for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                                             $broarray['user1_id']=$fetbro['brother_id'];
    //                                             $broarray['is_searched']='false';
    //                                             $broarray['relation']='brother';
    //                                             $broarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$broarray;
    //                                         }
                                            
    //                                         // sister table 5
    //                                         $sis="select * from sister where user_id='$uidsmaupd'";
    //                                         $ressis=mysqli_query($con, $sis);
    //                                         // $fetsis=mysqli_fetch_assoc($ressis);
    //                                         $sisarray=[];
    //                                         for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                                             $sisarray['user1_id']=$fetsis['sister_id'];
    //                                             $sisarray['is_searched']='false';
    //                                             $sisarray['relation']='sister';
    //                                             $sisarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$sisarray;
    //                                         }
                                            
    //                                         // husband table 6
    //                                         $hus="select * from husband where user_id='$uidsmaupd'";
    //                                         $reshus=mysqli_query($con, $hus);
    //                                         // $fethus=mysqli_fetch_assoc($reshus);
    //                                         $husarray=[];
    //                                         for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                                             $husarray['user1_id']=$fethus['husband_id'];
    //                                             $husarray['is_searched']='false';
    //                                             $husarray['relation']='husband';
    //                                             $husarray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$husarray;
    //                                         }
                                            
    //                                         // wife table 7
    //                                         $wi="select * from wife where user_id='$uidsmaupd'";
    //                                         $reswi=mysqli_query($con, $wi);
    //                                         // $fetwi=mysqli_fetch_assoc($reswi);
    //                                         $wifearray=[];
    //                                         for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                                             $wifearray['user1_id']=$fetwi['wife_id'];
    //                                             $wifearray['is_searched']='false';
    //                                             $wifearray['relation']='wife';
    //                                             $wifearray['ref_id']=$uidsmaupd;
    //                                             $multi_arr3[]=$wifearray;
    //                                         }
    //                                     }

    //                                     //merge all array here
    //                                     // $_SESSION['main_array']=$main_array;
    //                                     // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                                     $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
    //                                     $multi_arr3=[];


    //                                     echo "<pre>";
    //                                     // echo "<br><br>all table data store in array<br>";
    //                                     // print_r($multi_arr3);  
    //                                     // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
    //                                     // print_r($_SESSION['main_array2']);
                                        
    //                                     // declare array in which all last id is check stores 
    //                                     $lidarray=[];
    //                                     // echo "<br><br>all last id data store in array<br>";
    //                                     $lidarray['uid']=$uidsmaupd;
    //                                     $lidarray['is_searched']="true";
    //                                     $lidarray['relation']=$relsmaupd;
    //                                     $last_id_arr[]=$lidarray;
                                        
    //                                     //merge last id array  
    //                                     $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                                     // array_push($last_id_arr,$u1);
    //                                     echo "+++++++LAST ID SESSION ARRAY IS ";
    //                                     // print_r($_SESSION['last_id_arr']);
    //                                     // print_r($_SESSION['main_array1']);
    //                                     $last_id_arr=[];

    //                                     fetchdetails();
    //                                 }                                    
    //                                 defaultsearch2();
    //                             }
    //                         }
                            
    //                     }
    //                 }
    //             }                
    //         }


    //         function fianal_search(){
    //             global $con;
    //             for($a=0; $a<count($_SESSION['main_array1']); $a++){
    //                 for($b=0; $b<count($_SESSION['main_array2']); $b++){
    //                     if($_SESSION['main_array1'][$a]['user1_id'] == $_SESSION['main_array2'][$b]['user2_id']){

    //                         echo "<br>@---".$_SESSION['main_array1'][$a]['user1_id'];
    //                         echo "<br>@++++".$_SESSION['main_array2'][$b]['user2_id'];
    //                         $uidsmaupd=$_SESSION['main_array1'][$a]['user1_id'];
    //                         $relsmaupd=$_SESSION['main_array1'][$a]['relation'];

    //                         {    
    //                             // father table 0
    //                             $fat="select * from father where user_id='$uidsmaupd'";
    //                             $resfat=mysqli_query($con, $fat);
    //                             // $fetfat=mysqli_fetch_assoc($resfat);
    //                             $fatarray=[];
    //                             for($i=0; $fetfat=mysqli_fetch_assoc($resfat); $i++){
    //                                 $fatarray['user1_id']=$fetfat['father_id'];
    //                                 $fatarray['is_searched']='false';
    //                                 $fatarray['relation']='father';
    //                                 $fatarray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[]=$fatarray;
    //                                 //echo "<br>fat array val is ".$multi_arr3[$i][$j]; // store value in array
    //                             }
                                
    //                             // mother table 1
    //                             $mot="select * from mother where user_id='$uidsmaupd'";
    //                             $resmot=mysqli_query($con, $mot);
    //                             $motarray=[];
    //                             for($i=0; $fetmot=mysqli_fetch_assoc($resmot); $i++){
    //                                 // $fetmot=mysqli_fetch_assoc($resmot);
    //                                 $motarray['user1_id']=$fetmot['mother_id'];
    //                                 $motarray['is_searched']='false';
    //                                 $motarray['relation']='mother';
    //                                 $motarray['ref_id']=$uidsmaupd;;
    //                                 $multi_arr3[]=$motarray;
    //                             }
                                
    //                             // son table 2
    //                             $son="select * from son where user_id='$uidsmaupd'";
    //                             $resson=mysqli_query($con, $son);
    //                             // $fetson=mysqli_fetch_assoc($resson); 
    //                             $sonarray=[];
    //                             for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
    //                                 $sonarray['user1_id']=$fetson['son_id'];
    //                                 $sonarray['is_searched']='false';
    //                                 $sonarray['relation']='son';
    //                                 $sonarray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[] = $sonarray ;
    //                             }
                                
    //                             // daughter table 3
    //                             $dau="select * from daughter where user_id='$uidsmaupd'";
    //                             $resdau=mysqli_query($con, $dau);
    //                             // $fetdau=mysqli_fetch_assoc($resdau);
    //                             $dauarray=[];
    //                             for($i=0; $fetdau=mysqli_fetch_assoc($resdau); $i++){
    //                                 $dauarray['user1_id']=$fetdau['daughter_id'];
    //                                 $dauarray['is_searched']='false';
    //                                 $dauarray['relation']='daughter';
    //                                 $dauarray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[]=$dauarray;
    //                             }

    //                             // brother table 4
    //                             $bro="select * from brother where user_id='$uidsmaupd'";
    //                             $resbro=mysqli_query($con, $bro);
    //                             // $fetbro=mysqli_fetch_assoc($resbro);
    //                             $broarray=[];
    //                             for($i=0; $fetbro=mysqli_fetch_assoc($resbro); $i++){
    //                                 $broarray['user1_id']=$fetbro['brother_id'];
    //                                 $broarray['is_searched']='false';
    //                                 $broarray['relation']='brother';
    //                                 $broarray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[]=$broarray;
    //                             }
                                
    //                             // sister table 5
    //                             $sis="select * from sister where user_id='$uidsmaupd'";
    //                             $ressis=mysqli_query($con, $sis);
    //                             // $fetsis=mysqli_fetch_assoc($ressis);
    //                             $sisarray=[];
    //                             for($i=0; $fetsis=mysqli_fetch_assoc($ressis); $i++){
    //                                 $sisarray['user1_id']=$fetsis['sister_id'];
    //                                 $sisarray['is_searched']='false';
    //                                 $sisarray['relation']='sister';
    //                                 $sisarray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[]=$sisarray;
    //                             }
                                
    //                             // husband table 6
    //                             $hus="select * from husband where user_id='$uidsmaupd'";
    //                             $reshus=mysqli_query($con, $hus);
    //                             // $fethus=mysqli_fetch_assoc($reshus);
    //                             $husarray=[];
    //                             for($i=0; $fethus=mysqli_fetch_assoc($reshus); $i++){
    //                                 $husarray['user1_id']=$fethus['husband_id'];
    //                                 $husarray['is_searched']='false';
    //                                 $husarray['relation']='husband';
    //                                 $husarray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[]=$husarray;
    //                             }
                                
    //                             // wife table 7
    //                             $wi="select * from wife where user_id='$uidsmaupd'";
    //                             $reswi=mysqli_query($con, $wi);
    //                             // $fetwi=mysqli_fetch_assoc($reswi);
    //                             $wifearray=[];
    //                             for($i=0; $fetwi=mysqli_fetch_assoc($reswi); $i++){
    //                                 $wifearray['user1_id']=$fetwi['wife_id'];
    //                                 $wifearray['is_searched']='false';
    //                                 $wifearray['relation']='wife';
    //                                 $wifearray['ref_id']=$uidsmaupd;
    //                                 $multi_arr3[]=$wifearray;
    //                             }
    //                         }

    //                         //merge all array here
    //                         // $_SESSION['main_array']=$main_array;
    //                         // $_SESSION['main_array2']=array_merge($_SESSION['main_array2'],$multi_arr3);
    //                         $_SESSION['main_array1']=array_merge($_SESSION['main_array1'],$multi_arr3);
    //                         $multi_arr3=[];


    //                         echo "<pre>";
    //                         // echo "<br><br>all table data store in array<br>";
    //                         // print_r($multi_arr3);  
    //                         // echo "<br><br>all table data store in MAIN ARRAY 2<br>";
    //                         // print_r($_SESSION['main_array2']);
                            
    //                         // declare array in which all last id is check stores 
    //                         $lidarray=[];
    //                         // echo "<br><br>all last id data store in array<br>";
    //                         $lidarray['uid']=$uidsmaupd;
    //                         $lidarray['is_searched']="true";
    //                         $lidarray['relation']=$relsmaupd;
    //                         $last_id_arr[]=$lidarray;
                            
    //                         //merge last id array  
    //                         $_SESSION['last_id_arr']=array_merge($_SESSION['last_id_arr'],$last_id_arr);
    //                         // array_push($last_id_arr,$u1);
    //                         echo "+++++++LAST ID SESSION ARRAY IS ";
    //                         print_r($_SESSION['last_id_arr']);
    //                         // print_r($_SESSION['main_array1']);
    //                         $last_id_arr=[];
    //                         fetchdetails();
    //                     }
    //                 }
    //             }
    //         }


    //         // function u1searchinu2($u1){
    //         //     // global $u1,$u2;
    //         //     $sma1=$_SESSION['main_array1'];
    //         //     $sma2=$_SESSION['main_array2'];
    //         //     for($i=0; $i<count($sma2); $i++){
    //         //         // echo "MASTER ARRAY";
    //         //         // echo "<br>".$u1;
    //         //         // print_r($sma1);
    //         //         if($u1 == $sma2[$i]['user2_id']){
    //         //             echo "<br>match found";
    //         //         }
    //         //         else{ 
    //         //             echo "<br>match not found".$i;
    //         //         }
    //         //     }
    //         // }
            
    //         function u2searchinu1($u2){
    //             // global $u1,$u2;
    //             $sma1=$_SESSION['main_array1'];
    //             $sma2=$_SESSION['main_array2'];
    //             for($i=0; $i<count($sma1); $i++){
    //                 if($u2 == $sma1[$i]['user1_id']){
    //                     echo "<br>match found in 2";
    //                     fetchdetails();
    //                 }
    //                 else{ 
    //                     echo "<br>match not found U2 TO U1";
    //                 }
    //             }
    //         }

    //         function deepsearch(){
    //             global $u1,$u2;
    //             $sma1=$_SESSION['main_array1'];
    //             $sma2=$_SESSION['main_array2'];
    //             // print_r($_SESSION['last_id_arr']);
    //             for($i=0; $i<count($sma1); $i++){
    //                 for($j=0; $j<count($sma2); $j++){
    //                     if($sma1[$i]['user1_id']== $sma2[$j]['user2_id']){
    //                         echo "<br>yes<br>";
    //                         echo $sma1[$i]['user1_id'];
    //                         echo $sma2[$j]['user2_id'];
    //                         // fetchdetails();
    //                         fianal_search();
    //                     }
    //                     else{
    //                         echo "no";
    //                         // print_r($sma1);
    //                         // print_r($sma2);
    //                     }
    //                 }
    //             }
    //         }

    //         mainsearch();
    //         u2searchinu1($u2);
    //         // u1searchinu2($u1);
    //         deepsearch();
    //         defaultsearch1();
    //         echo "<br>OUTSIDE FUNCTION";
    //         // print_r($_SESSION['main_array1']);
    //         // print_r($_SESSION['main_array2']);
            
    //     }
    //     else{
    //         echo "Data not found for user 2";
    //     }
    // }
    // else{
    //     echo "Data not found user 1";
    // }

    // // echo "User1 is ".$us_fn1." ".$us_ln1;
    // // echo "<br>-User2 is-- ".$us_fn2." ".$us_ln2;
    // // echo "hellfsdfsfsdafsfso";
?> -->