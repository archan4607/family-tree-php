<?php
    session_start();
    error_reporting(0);
    include_once "connection.php";
    
    $us_fn1=$_GET['us_fn1'];
    $us_ln1=$_GET['us_ln1'];
    $us_fn2=$_GET['us_fn2'];
    $us_ln2=$_GET['us_ln2'];

    //check and get data of user 1 from database if exists or not
    $getu1="select * from user where u_fname='$us_fn1' and u_lname='$us_ln1'";
    $resgetu1=mysqli_query($con, $getu1);
    
    //if uesr 1 record is found then it will execute
    if(mysqli_num_rows($resgetu1)>0){
        $fetchgetu1=mysqli_fetch_assoc($resgetu1);

        // echo $fetchgetu1['user_id'];
        echo "User 1 is ".$fetchgetu1['u_fname']." ".$fetchgetu1['u_lname']." ID is ".$fetchgetu1['user_id']."<br>";
        $u1= $fetchgetu1['user_id'];    //store user 1 id in variable
        
        //check and get data of user 2 from database if exists or not
        $getu2="select * from user where u_fname='$us_fn2' and u_lname='$us_ln2'";
        $resgetu2=mysqli_query($con, $getu2);
        
        //if uesr 2 record is found then it will execute
        if(mysqli_num_rows($resgetu2)>0){
            $fetchgetu2=mysqli_fetch_assoc($resgetu2);

            // echo $fetchgetu2['user_id'];
            echo "User 2 is ".$fetchgetu2['u_fname']." ".$fetchgetu2['u_lname']." ID is ".$fetchgetu2['user_id']."<br>";
            $u2= $fetchgetu2['user_id'];    //store user 2 id in variable
           
            
            // now we will check user 1 id in all table one by one and store in multi-array
            //declare value in multi-array of all tables
            $multi_arr1=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr2=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr3=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr4=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr5=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr6=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr7=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr8=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr9=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr10=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $multi_arr11=array(array(),array(),array(),array(),array(),array(),array(),array()); 
            $last_id_arr=array();
            


            // father table 0
            $fat="select * from father where user_id='$u1'";
            $resfat=mysqli_query($con, $fat);
            for($j=0; $fetfat=mysqli_fetch_assoc($resfat); $j++)
            {
                $i=0;
                $multi_arr1[$i][$j]=$fetfat['father_id'];
                echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
            }
            
            // mother table 1
            $mot="select * from mother where user_id='$u1'";
            $resmot=mysqli_query($con, $mot);
            for($j=0; $fetmot=mysqli_fetch_assoc($resmot); $j++)
            {
                $i=1;
                $multi_arr1[$i][$j]=$fetmot['mother_id'];
                echo "<br>mot array val is ".$multi_arr1[$i][$j]; // store value in array 
            }

            // son table 2
            $son="select * from son where user_id='$u1'";
            $resson=mysqli_query($con, $son);
            for($j=0; $fetson=mysqli_fetch_assoc($resson); $j++)
            {
                $i=2;
                $multi_arr1[$i][$j]=$fetson['son_id'];
                echo "<br>son array val is ".$multi_arr1[$i][$j]; // store value in array
            }
            
            // daughter table 3
            $dau="select * from daughter where user_id='$u1'";
            $resdau=mysqli_query($con, $dau);
            for($j=0; $fetdau=mysqli_fetch_assoc($resdau); $j++)
            {
                $i=3;
                $multi_arr1[$i][$j]=$fetdau['daughter_id'];
                echo "<br>dau array val is ".$multi_arr1[$i][$j]; // store value in array 
            }

            // brother table 4
            $bro="select * from brother where user_id='$u1'";
            $resbro=mysqli_query($con, $bro);
            for($j=0; $fetbro=mysqli_fetch_assoc($resbro); $j++)
            {
                $i=4;
                $multi_arr1[$i][$j]=$fetbro['brother_id'];
                echo "<br>bro array val is ".$multi_arr1[$i][$j]; // store value in array
            }
            
            // sister table 5
            $sis="select * from sister where user_id='$u1'";
            $ressis=mysqli_query($con, $sis);
            for($j=0; $fetsis=mysqli_fetch_assoc($ressis); $j++)
            {
                $i=5;
                $multi_arr1[$i][$j]=$fetsis['sister_id'];
                echo "<br>sis array val is ".$multi_arr1[$i][$j]; // store value in array 
            }

            // husband table 6
            $hus="select * from husband where user_id='$u1'";
            $reshus=mysqli_query($con, $hus);
            for($j=0; $fethus=mysqli_fetch_assoc($reshus); $j++)
            {
                $i=6;
                $multi_arr1[$i][$j]=$fethus['husband_id'];
                echo "<br>hus array val is ".$multi_arr1[$i][$j]; // store value in array
            }
            
            // wife table 7
            $wi="select * from wife where user_id='$u1'";
            $reswi=mysqli_query($con, $wi);
            for($j=0; $fetwi=mysqli_fetch_assoc($reswi); $j++)
            {
                $i=7;
                $multi_arr1[$i][$j]=$fetwi['wife_id'];
                echo "<br>wi array val is ".$multi_arr1[$i][$j]; // store value in array 
            }
            // echo "<pre>";
            echo "<br><br>all table data store in array<br>";
            print_r($multi_arr1);
            
            // declare array in which all last id is stores 
            echo "<br><br>all last id data store in array<br>";
            array_push($last_id_arr,$u1);
            print_r($last_id_arr);
        

            //main function here array element check 
            function srchtbl($u1){
                global $u2;
                global $con;
                global $last_id_arr;
                // father table 0
                $fat="select * from father where user_id='$u1'";
                $resfat=mysqli_query($con, $fat);
                for($j=0; $fetfat=mysqli_fetch_assoc($resfat); $j++)
                {
                    $i=0;
                    $multi_arr1[$i][$j]=$fetfat['father_id'];
                    echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
                }
                
                // mother table 1
                $mot="select * from mother where user_id='$u1'";
                $resmot=mysqli_query($con, $mot);
                for($j=0; $fetmot=mysqli_fetch_assoc($resmot); $j++)
                {
                    $i=1;
                    $multi_arr1[$i][$j]=$fetmot['mother_id'];
                    echo "<br>mot array val is ".$multi_arr1[$i][$j]; // store value in array 
                }

                // son table 2
                $son="select * from son where user_id='$u1'";
                $resson=mysqli_query($con, $son);
                for($j=0; $fetson=mysqli_fetch_assoc($resson); $j++)
                {
                    $i=2;
                    $multi_arr1[$i][$j]=$fetson['son_id'];
                    echo "<br>son array val is ".$multi_arr1[$i][$j]; // store value in array
                }
                
                // daughter table 3
                $dau="select * from daughter where user_id='$u1'";
                $resdau=mysqli_query($con, $dau);
                for($j=0; $fetdau=mysqli_fetch_assoc($resdau); $j++)
                {
                    $i=3;
                    $multi_arr1[$i][$j]=$fetdau['daughter_id'];
                    echo "<br>dau array val is ".$multi_arr1[$i][$j]; // store value in array 
                }

                // brother table 4
                $bro="select * from brother where user_id='$u1'";
                $resbro=mysqli_query($con, $bro);
                for($j=0; $fetbro=mysqli_fetch_assoc($resbro); $j++)
                {
                    $i=4;
                    $multi_arr1[$i][$j]=$fetbro['brother_id'];
                    echo "<br>bro array val is ".$multi_arr1[$i][$j]; // store value in array
                }
                
                // sister table 5
                $sis="select * from sister where user_id='$u1'";
                $ressis=mysqli_query($con, $sis);
                for($j=0; $fetsis=mysqli_fetch_assoc($ressis); $j++)
                {
                    $i=5;
                    $multi_arr1[$i][$j]=$fetsis['sister_id'];
                    echo "<br>sis array val is ".$multi_arr1[$i][$j]; // store value in array 
                }

                // husband table 6
                $hus="select * from husband where user_id='$u1'";
                $reshus=mysqli_query($con, $hus);
                for($j=0; $fethus=mysqli_fetch_assoc($reshus); $j++)
                {
                    $i=6;
                    $multi_arr1[$i][$j]=$fethus['husband_id'];
                    echo "<br>hus array val is ".$multi_arr1[$i][$j]; // store value in array
                }
                
                // wife table 7
                $wi="select * from wife where user_id='$u1'";
                $reswi=mysqli_query($con, $wi);
                for($j=0; $fetwi=mysqli_fetch_assoc($reswi); $j++)
                {
                    $i=7;
                    $multi_arr1[$i][$j]=$fetwi['wife_id'];
                    echo "<br>wi array val is ".$multi_arr1[$i][$j]; // store value in array 
                }
                // echo "<pre>";
                echo "<br><br>all table data store in array<br>";
                print_r($multi_arr1);
                
                // declare array in which all last id is stores 
                echo "<br><br>all last id data store in array<br>";
                array_push($last_id_arr,$u1);
                print_r($last_id_arr);
                
                // echo ckhu2foun($u2, $multi_arr1, $last_id_arr);
            
                // print_r($multi_arr1);
            }





            //if user is father then call this function they might be son or daughter
            function fatherofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;


                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    // echo "male";
                    $gdinson="select * from son where user_id='$val2'";
                    $regdson=mysqli_query($con, $gdinson);
                    if(mysqli_num_rows($regdson)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> son of </b>".$hold_name;
                    }
                }
                else if($fetgetlastiddetail['gender']==2){
                    // echo "female";
                    $gdindaughter="select * from daughter where user_id='$val2'";
                    $regddaughter=mysqli_query($con, $gdindaughter);
                    if(mysqli_num_rows($regddaughter)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> daughter of </b>".$hold_name;
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
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;


                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    // echo "male";
                    $gdinson="select * from son where user_id='$val2'";
                    $regdson=mysqli_query($con, $gdinson);
                    if(mysqli_num_rows($regdson)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> son of </b>".$hold_name;
                    }
                }
                else if($fetgetlastiddetail['gender']==2){
                    // echo "female";
                    $gdindaughter="select * from daughter where user_id='$val2'";
                    $regddaughter=mysqli_query($con, $gdindaughter);
                    if(mysqli_num_rows($regddaughter)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> daughter of </b>".$hold_name;
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
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;


                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    // echo "male";
                    $gdinfather="select * from father where user_id='$val2'";
                    $regdfather=mysqli_query($con, $gdinfather);
                    if(mysqli_num_rows($regdfather)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> father of </b>".$hold_name;
                    }
                }
                else if($fetgetlastiddetail['gender']==2){
                    // echo "female";
                    $gdinmother="select * from mother where user_id='$val2'";
                    $regdmother=mysqli_query($con, $gdinmother);
                    if(mysqli_num_rows($regdmother)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> mother of </b>".$hold_name;
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
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;


                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    // echo "male";
                    $gdinfather="select * from father where user_id='$val2'";
                    $regdfather=mysqli_query($con, $gdinfather);
                    if(mysqli_num_rows($regdfather)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> father of </b>".$hold_name;
                    }
                }
                else if($fetgetlastiddetail['gender']==2){
                    // echo "female";
                    $gdinmother="select * from mother where user_id='$val2'";
                    $regdmother=mysqli_query($con, $gdinmother);
                    if(mysqli_num_rows($regdmother)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> mother of </b>".$hold_name;
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
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    // echo "male";
                    $gdinbrother="select * from brother where user_id='$val2'";
                    $regdbrother=mysqli_query($con, $gdinbrother);
                    if(mysqli_num_rows($regdbrother)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2." <b>brother of </b>".$hold_name;
                    }
                }
                else if($fetgetlastiddetail['gender']==2){
                    // echo "female";
                    $gdinsister="select * from sister where user_id='$val2'";
                    $regdsister=mysqli_query($con, $gdinsister);
                    if(mysqli_num_rows($regdsister)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> sister of </b>".$hold_name;
                    }
                }
            }

            //if user is sister then call this function they might be brother or sister
            function sisterofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    // echo "male";
                    $gdinbrother="select * from brother where user_id='$val2'";
                    $regdbrother=mysqli_query($con, $gdinbrother);
                    if(mysqli_num_rows($regdbrother)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2." <b>brother of </b>".$hold_name;
                    }
                }
                else if($fetgetlastiddetail['gender']==2){
                    // echo "female";
                    $gdinsister="select * from sister where user_id='$val2'";
                    $regdsister=mysqli_query($con, $gdinsister);
                    if(mysqli_num_rows($regdsister)>0){
                        echo "<br>Relation is:-<br> ".$hold_name2."<b> sister of </b>".$hold_name;
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
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];

                $gdinhusband="select * from husband where user_id='$val2'";
                $regdhusband=mysqli_query($con, $gdinhusband);
                if(mysqli_num_rows($regdhusband)>0){
                    echo "<br>Relation is:-<br> ".$hold_name2." <b>husband of</b> ".$hold_name;
                }
            }

            //if user is husband then call this function they should be wife
            function husbandofuser($last_id_arr, $val2){
                global $con;
                global $u1;
                
                $fat="select * from user where user_id='$val2'";
                $resfat=mysqli_query($con, $fat);
                $fetfat=mysqli_fetch_assoc($resfat);
                $hold_name=$fetfat['u_fname']." ".$fetfat['u_lname'];
                
                //last push id is poped from array
                $lid=array_pop($last_id_arr);
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];

                $gdinwife="select * from wife where user_id='$val2'";
                $regdwife=mysqli_query($con, $gdinwife);
                if(mysqli_num_rows($regdwife)>0){
                    echo "<br>Relation is:-<br> ".$hold_name2."<b> wife of </b> ".$hold_name;
                }  
            }


            // function lastidinfo($hold_name,$lid,$val2){
            //     global $con;
            //     // global $hold_name;
            //     echo "<br>---from function last id is ".$lid;
            //     $getlastiddetail="select * from user where user_id='$lid'";
            //     $regetlastiddetail=mysqli_query($con,$getlastiddetail);
            //     $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
            //     $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
            //     if($fetgetlastiddetail['gender']==1){
            //         // echo "male";
            //         $gdinson="select * from son where user_id='$val2'";
            //         $regdson=mysqli_query($con, $gdinson);
            //         if(mysqli_num_rows($regdson)>0){
            //             echo "<br>Relation is:-<br> ".$hold_name2." son of ".$hold_name;
            //         }
            //     }
            //     else if($fetgetlastiddetail['gender']==2){
            //         // echo "female";
            //         $gdindaughter="select * from daughter where user_id='$val2'";
            //         $regddaughter=mysqli_query($con, $gdindaughter);
            //         if(mysqli_num_rows($regddaughter)>0){
            //             echo "<br>Relation is:-<br> ".$hold_name2." daughter of ".$hold_name;
            //         }
            //     }
            // }
            
                
            //check every time if user 2 found or not
            function ckhu2foun($u2, $multi_arr1, $last_id_arr){
                foreach($multi_arr1 as $key1 => $val1){
                    // echo "===".$val1[$key];
                    // echo "<br>--".$key1;
                    foreach($val1 as $key2=>$val2){
                        // echo "***".$key2;
                        // echo ">>>".$val2;
                        if($val2==$u2){
                            if($key1==0){
                                echo "Father";
                                echo $val2;
                                fatherofuser($last_id_arr, $val2);
                            }
                            if($key1==1){
                                echo "Mother";
                                echo $val2;
                                motherofuser($last_id_arr, $val2);
                            }
                            if($key1==2){
                                echo "Son";
                                echo $val2;
                                sonofuser($last_id_arr, $val2);
                            }
                            if($key1==3){
                                echo "Daughter";
                                echo $val2;
                                daughterofuser($last_id_arr, $val2);
                            }
                            if($key1==4){
                                echo "Brother";
                                echo $val2;
                                brotherofuser($last_id_arr, $val2);
                            }
                            if($key1==5){
                                echo "Sister";
                                echo $val2;
                                sisterofuser($last_id_arr, $val2);
                            }
                            if($key1==6){
                                echo "Husband";
                                echo $val2;
                                husbandofuser($last_id_arr, $val2);
                            }
                            if($key1==7){
                                echo "Wife";
                                echo $val2;
                                wifeofuser($last_id_arr, $val2);
                            }
                        }
                        else{
                            $keys = array_keys($multi_arr1);
                            for($i = 0; $i < count($multi_arr1); $i++) {
                                echo $keys[$i] . "{<br>";
                                foreach($multi_arr1[$keys[$i]] as $key => $value) {
                                    if($key==0){
                                        print_r($last_id_arr);
                                        for($x=0; $x<$last_id_arr[$x]; $x++){
                                            // echo "LAST ID".$keyslid[$x];
                                                echo "record found".$x. " -LAST ID IS-".$last_id_arr[$x];
                                                print_r($last_id_arr);
                                                // echo  $key. " : " . $value . "<br>";
                                        }
                                        
                                    }
                                }
                                echo "}<br>";
                            }
                        }
                    }
                }
            }
            echo ckhu2foun($u2, $multi_arr1, $last_id_arr);

            function array_ava($multi_arr1, $multi_arr2){

                $ma1=array_filter($multi_arr1);
                $ma2=array_filter($multi_arr2);
                if(empty($ma1)){
                    echo "yes empty";
                    $multi_arr1;   
                    // deepsearch($multi_arr1);
                }
                if(empty($ma2)){
                    $multi_arr2;   
                }
            }
            

            
            
            // function deepsearch($multi_arr1){
                // global $con;
                // foreach($multi_arr1 as $key1 => $val1){
                //     // echo "===".$val1[$key];
                //     // echo "<br>--".$key1;
                //     foreach($val1 as $key2=>$val2){
                //         // echo ">>>".$val2;
                //         if($key1==0){
                //             srchtbl($val2);   
                //         }
                //     }
                // }
            // }
            // function searchintables($key1, $val2){
            //     global $con;
            //     echo $key1;
            // }

            


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