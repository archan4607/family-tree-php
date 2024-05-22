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
            $multi_arr1=array(array(),array(),
                'son'=>array(
                    'index'=>'',
                    'user1_id'=>'',
                    'is_searched'=>'',
                    'relation'=>''
                ),array(),array(),array(),array()); 
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
            


            // father table 0
            $fat="select * from father where user_id='$u1'";
            $resfat=mysqli_query($con, $fat);
            $fetfat=mysqli_fetch_assoc($resfat);
            $multi_arr1['father']['user1_id']=$fetfat['father_id'];
            $multi_arr1['father']['is_searched']='false';
            $multi_arr1['father']['relation']='father';
            //echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
            
            // mother table 1
            $mot="select * from mother where user_id='$u1'";
            $resmot=mysqli_query($con, $mot);
            $fetmot=mysqli_fetch_assoc($resmot);
            $multi_arr1['mother']['user1_id']=$fetmot['mother_id'];
            $multi_arr1['mother']['is_searched']='false';
            $multi_arr1['mother']['relation']='mother';

            // son table 2
            $son="select * from son where user_id='$u1'";
            $resson=mysqli_query($con, $son);
            $fetson=mysqli_fetch_assoc($resson); 
            $multi_arr1['son']['user1_id']=$fetson['son_id'];
            $multi_arr1['son']['is_searched']='false';
            $multi_arr1['son']['relation']='son';
            
            // daughter table 3
            $dau="select * from daughter where user_id='$u1'";
            $resdau=mysqli_query($con, $dau);
            $fetdau=mysqli_fetch_assoc($resdau); 
            $multi_arr1['daughter']['user1_id']=$fetdau['daughter_id'];
            $multi_arr1['daughter']['is_searched']='false';
            $multi_arr1['daughter']['relation']='daughter';

            // brother table 4
            $bro="select * from brother where user_id='$u1'";
            $resbro=mysqli_query($con, $bro);
            $fetbro=mysqli_fetch_assoc($resbro);
            $multi_arr1['brother']['user1_id']=$fetbro['brother_id'];
            $multi_arr1['brother']['is_searched']='false';
            $multi_arr1['brother']['relation']='brother';
            
            // sister table 5
            $sis="select * from sister where user_id='$u1'";
            $ressis=mysqli_query($con, $sis);
            $fetsis=mysqli_fetch_assoc($ressis);
            $multi_arr1['sister']['user1_id']=$fetsis['sister_id'];
            $multi_arr1['sister']['is_searched']='false';
            $multi_arr1['sister']['relation']='sister';

            // husband table 6
            $hus="select * from husband where user_id='$u1'";
            $reshus=mysqli_query($con, $hus);
            $fethus=mysqli_fetch_assoc($reshus);
            $multi_arr1['husband']['user1_id']=$fethus['husband_id'];
            $multi_arr1['husband']['is_searched']='false';
            $multi_arr1['husband']['relation']='husband';
            
            // wife table 7
            $wi="select * from wife where user_id='$u1'";
            $reswi=mysqli_query($con, $wi);
            $fetwi=mysqli_fetch_assoc($reswi);
            $multi_arr1['wife']['user1_id']=$fetwi['wife_id'];
            $multi_arr1['wife']['is_searched']='false';
            $multi_arr1['wife']['relation']='wife';
            
            echo "<pre>";
            echo "<br><br>all table data store in array<br>";
            print_r($multi_arr1);
            
            // declare array in which all last id is stores 
            echo "<br><br>all last id data store in array<br>";
            $last_id_arr['uid']=$u1;
            $last_id_arr['is_searched']="false";
            $last_id_arr['relation']='user_1';
            // array_push($last_id_arr,$u1);
            print_r($last_id_arr);
            


            //main function here array element check 
            function srchtbl($u1, $v2){
                global $u2;
                global $con;
                global $last_id_arr;
                
                // father table 0
            $fat="select * from father where user_id='$u1'";
            $resfat=mysqli_query($con, $fat);
            $fetfat=mysqli_fetch_assoc($resfat);
            $multi_arr1['father']['user1_id']=$fetfat['father_id'];
            $multi_arr1['father']['is_searched']='false';
            $multi_arr1['father']['relation']='father';
            //echo "<br>fat array val is ".$multi_arr1[$i][$j]; // store value in array
            
            // mother table 1
            $mot="select * from mother where user_id='$u1'";
            $resmot=mysqli_query($con, $mot);
            $fetmot=mysqli_fetch_assoc($resmot);
            $multi_arr1['mother']['user1_id']=$fetmot['mother_id'];
            $multi_arr1['mother']['is_searched']='false';
            $multi_arr1['mother']['relation']='mother';

            // son table 2
            $son="select * from son where user_id='$u1'";
            $resson=mysqli_query($con, $son);
            // $fetson=mysqli_fetch_assoc($resson);
            for($i=0; $fetson=mysqli_fetch_assoc($resson); $i++){
                $multi_arr1['son'][]=$i;
                $multi_arr1['son'][]=$fetson['son_id'];
                $multi_arr1['son'][]='false';
                $multi_arr1['son'][]='son';
                // $multi_arr1['son']['index'.$i]=$i;
                // $multi_arr1['son']['user1_id'.$i]=$fetson['son_id'];
                // $multi_arr1['son']['is_searched'.$i]='false';
                // $multi_arr1['son']['relation'.$i]='son';
            } 
            
            // daughter table 3
            $dau="select * from daughter where user_id='$u1'";
            $resdau=mysqli_query($con, $dau);
            $fetdau=mysqli_fetch_assoc($resdau); 
            $multi_arr1['daughter']['user1_id']=$fetdau['daughter_id'];
            $multi_arr1['daughter']['is_searched']='false';
            $multi_arr1['daughter']['relation']='daughter';

            // brother table 4
            $bro="select * from brother where user_id='$u1'";
            $resbro=mysqli_query($con, $bro);
            $fetbro=mysqli_fetch_assoc($resbro);
            $multi_arr1['brother']['user1_id']=$fetbro['brother_id'];
            $multi_arr1['brother']['is_searched']='false';
            $multi_arr1['brother']['relation']='brother';
            
            // sister table 5
            $sis="select * from sister where user_id='$u1'";
            $ressis=mysqli_query($con, $sis);
            $fetsis=mysqli_fetch_assoc($ressis);
            $multi_arr1['sister']['user1_id']=$fetsis['sister_id'];
            $multi_arr1['sister']['is_searched']='false';
            $multi_arr1['sister']['relation']='sister';

            // husband table 6
            $hus="select * from husband where user_id='$u1'";
            $reshus=mysqli_query($con, $hus);
            $fethus=mysqli_fetch_assoc($reshus);
            $multi_arr1['husband']['user1_id']=$fethus['husband_id'];
            $multi_arr1['husband']['is_searched']='false';
            $multi_arr1['husband']['relation']='husband';
            
            // wife table 7
            $wi="select * from wife where user_id='$u1'";
            $reswi=mysqli_query($con, $wi);
            $fetwi=mysqli_fetch_assoc($reswi);
            $multi_arr1['wife']['user1_id']=$fetwi['wife_id'];
            $multi_arr1['wife']['is_searched']='false';
            $multi_arr1['wife']['relation']='wife';
            
            echo "<pre>";
            echo "<br><br>all table data store in array<br>";
            print_r($multi_arr1);
            
            // declare array in which all last id is stores 
            echo "<br><br>all last id data store in array<br>";
            $last_id_arr['uid']=$u1;
            $last_id_arr['is_searched']="false";
            $last_id_arr['relation']="$v2";
            // array_push($last_id_arr['uid'],$u1);
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

                // last push id is poped from array
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // $lid=array_pop($last_id_arr['uid']);


                // echo "<br>---from function last id is ".$lid;
                $getlastiddetail="select * from user where user_id='$lid'";
                $regetlastiddetail=mysqli_query($con,$getlastiddetail);
                $fetgetlastiddetail=mysqli_fetch_assoc($regetlastiddetail);
                $hold_name2=$fetgetlastiddetail['u_fname']." ".$fetgetlastiddetail['u_lname'];
                
                if($fetgetlastiddetail['gender']==1){
                    echo "male";
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;


                // echo "<br>---from function last id is ".$lid;
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;


                // echo "<br>---from function last id is ".$lid;
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;


                // echo "<br>---from function last id is ".$lid;
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                // echo "<br>---from function last id is ".$lid;
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                // echo "<br>---from function last id is ".$lid;
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                // echo "<br>---from function last id is ".$lid;
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
                for($i=0; $i<count($last_id_arr); $i++){
                    if($last_id_arr['is_searched']=='false'){
                        $lid=$last_id_arr['uid'];
                        $last_id_arr['is_searched']='true';
                    }
                }
                // echo "<br>last id is ".$lid;
                // lastidinfo($hold_name,$lid,$val2);
                // echo "<br>---from function last id is ".$lid;
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

                        
            function ckhu2foun($u2, $multi_arr1, $last_id_arr){
                global $u2;
                // echo "<pre>";
                // $jsonar1=json_decode($multi_arr1);
                foreach($multi_arr1 as $key => $value){
                    if(is_array($multi_arr1[$key])){
                        if($value['user1_id']==$u2){
                            if($value['relation']=="father"){
                                $val2=$value['user1_id'];
                                fatherofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="mother"){
                                $val2=$value['user1_id'];
                                motherofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="son"){
                                $val2=$value['user1_id'];
                                sonofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="daughter"){
                                $val2=$value['user1_id'];
                                daughterofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="brother"){
                                $val2=$value['user1_id'];
                                brotherofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="sister"){
                                $val2=$value['user1_id'];
                                sisterofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="husband"){
                                $val2=$value['user1_id'];
                                husbandofuser($last_id_arr, $val2);
                            }
                            if($value['relation']=="wife"){
                                $val2=$value['user1_id'];
                                wifeofuser($last_id_arr, $val2);
                            }
                        }
                        else{
                            // echo "user not found";
                            if($value['is_searched']=='false')
                            {
                                $v1= $value['user1_id'];
                                $v2=$value['relation'];
                                echo "<br>Search value is ".$v1;
                                $value['is_searched']='true';
                                srchtbl($v1,$v2);
                                // break;
                                // ckhu2foun($u2, $multi_arr1, $last_id_arr);

                            }
                            // for($i=0; $i<count($multi_arr1); $i++){
                            //     if($multi_arr1['user1_id']=='9'){
                            //         echo $multi_arr1['user1_id'];
                            //         $multi_arr1['is_searched']=='true';
                            //     }
                            //     else{
                            //         echo "not";
                            //     }
                            // }
                        }
                        // print_r (array_values($multi_arr1[$key]));
                    }
                }
            }

            echo ckhu2foun($u2, $multi_arr1, $last_id_arr);



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