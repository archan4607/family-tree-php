<?php
    session_start();
    include_once 'connection.php';
    error_reporting(E_ERROR | E_PARSE);
    $requid = $_REQUEST['uid'];
    if(isset($_SESSION['last_id'])){
        $requid = $_SESSION['last_id'];
        $sel="select * from user where user_id=$requid";
        $res=mysqli_query($con,$sel);
        $row=mysqli_fetch_assoc($res);
        $last_lname= $row['u_lname'];
        
        
        // echo $last_lname;
    }
    else{
        echo "error";
    }
    

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- <script src="https://kit.fontawesome.com/a5cbde906e.js" crossorigin="anonymous"></script> -->
        <link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    
<!-- <script>
        $(document).ready(function (){
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var number = $("#number").val();
            var dob = $("#dob").val();
            $("#frmsub").submit(function(){
                if(fname == ''){
                    alert("Please enter first name");
                    return false;
                }
                if(lname == ''){
                    alert("Please enter last name");
                    return false;
                }
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(!emailReg.test(email)){
                    alert("Please enter valid email");
                    return false;
                }
                var phoneno = /^\d{10}$/;
                if(!number.match(phoneno)){
                    alert("Please enter valid number");
                    return false;
                }
                if(dob == ''){
                    alert("Please enter dob");
                    return false;
                }
            });
        });
    </script> -->
</head>
<!-- class="bg-secondary" -->
  <body >
        <div class="container col-6">
            <div class="card mt-5">
                <div class="card card-body">
                    <h4>User Information</h4>
                <form method="GET" action="insertrelation.php" id="frmsub">
                    <img src="./uploads/default.png" class="rounded mx-auto d-block w-25 h-25" alt="...">
                    <div class="row">
                        <div class="col mt-3">
                        <label class="form-check-label" for="inlineRadio1">First Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?php echo $row['u_fname']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                        <div class="col mt-3">
                        <label class="form-check-label" for="inlineRadio1">Last Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php echo $row['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                        <label class="form-check-label" for="inlineRadio1">Email Id</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></i></span>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1">Mobile No.</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                                <input type="text" class="form-control" id="num" placeholder="mobile number" name="num" value="<?php echo $row['mobile']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            
                            <label class="form-check-label blockquote" for="inlineRadio1">Gender:&nbsp;&nbsp;&nbsp;</label>
                            <div class="form-check form-check-inline">
                            <?php if($row['gender']==1){ 
                                    ?>
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                <?php } ?>
                            </div>
                            <div class="form-check form-check-inline">
                            <?php if($row['gender']==2){ 
                                    ?>
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" checked>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col mt-3">
                        <label class="form-check-label" for="inlineRadio1">Date Of Birth:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                <input type="date" class="form-control" id="dob" placeholder="Select DOB" name="dob" value="<?php echo $row['dob']; ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if(isset($_SESSION['merge_selmember'] )){
                            // echo $_SESSION['merge_selmember'];
                            $set=$_SESSION['merge_selmember'];
                            $unmerge_selmember=explode(" ",$_SESSION['merge_selmember']);
                            // $unmerge_selmember=explode(" ",$_SESSION['merge_selmember']);
                            // print_r (explode(" ",$_SESSION['merge_selmember']));
                            // echo "set";
                            
                        
                        foreach($unmerge_selmember as $i =>$key) {

                            // echo $i.' '.$key .'</br>';
                            $selenewdata="select * from user where user_id='$key'";
                            $resultnewdata=mysqli_query($con,$selenewdata);
                            $fetchnewdata=mysqli_fetch_assoc($resultnewdata);
                        
                    ?>
                    <div class="row">
                        <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1"></label>
                            <div class="form-check form-check-inline">
                                <input type="hidden" name="user<?php echo $key; ?>" value="<?php echo $key; ?>">
                                <blockquote class="blockquote">
                                    <p><?php echo $fetchnewdata['u_fname']." ".$fetchnewdata['u_lname']." is your? "; ?></p>
                                </blockquote>
                            </div> 
                        </div>
                        <div class="col mt-3">
                            <label for="exampleFormControlSelect1">Select your relation.</label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="selrelation" name="selrelation<?php echo $i; ?>">
                                        <option value="" hidden>Select</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Son">Son</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Wife">Wife</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                    ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-outline-primary" id="savedetails" value="Save">
                    </div>
                    <?php
                        }
                        else{
                            ?>
                        <div class="row">
                            <?php 
                                $showrec="select * from father where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['father_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[father_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1">Father</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="father" placeholder="Email" name="father" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php 
                                }
                                $showrec="select * from mother where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['father_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[mother_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                                <label class="form-check-label" for="inlineRadio1">Mother</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="num" placeholder="mobile number" name="mother" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="row">
                            <?php 
                                $showrec="select * from son where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['father_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[son_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1">Son</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="father" placeholder="Email" name="father" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php 
                                }
                                $showrec="select * from daughter where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['father_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[daughter_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                                <label class="form-check-label" for="inlineRadio1">Daughter</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="num" placeholder="mobile number" name="mother" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="row">
                            <?php 
                                $showrec="select * from brother where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['brother_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[brother_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1">Brother</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="father" placeholder="Email" name="father" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php 
                                }
                                $showrec="select * from sister where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['father_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[sister_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                                <label class="form-check-label" for="inlineRadio1">Sister</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="num" placeholder="mobile number" name="mother" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="row">
                            <?php 
                                $showrec="select * from husband where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['husband_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[husband_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1">Husband</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="father" placeholder="Email" name="father" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php 
                                }
                                $showrec="select * from wife where user_id='$requid'";
                                $resshowrec=mysqli_query($con,$showrec);
                                $fetchshowrec=mysqli_fetch_assoc($resshowrec);
                                // $temp1=$fetchshowrec['father_id'];
                                if($fetchshowrec['user_id']==$requid){

                                    $relationdetails="select * from user where user_id='$fetchshowrec[wife_id]'";
                                    $resultrelationdetails=mysqli_query($con,$relationdetails);
                                    $fetchrelationdetails=mysqli_fetch_assoc($resultrelationdetails);
                            ?>
                            <div class="col mt-3">
                                <label class="form-check-label" for="inlineRadio1">Wife</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="num" placeholder="mobile number" name="mother" value="<?php echo $fetchrelationdetails['u_fname']." ".$fetchrelationdetails['u_lname']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- <form action="index.php"> -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <input type="button" class="btn btn-outline-primary" onclick="window.location.replace('index.php');" id="indexbtn" value="INDEX">
                            </div>
                        <!-- </form> -->
                            <?php
                        }
                    ?>
                </form>              
            </div>
        </div>
        <div class="mt-3">
            <div id="alertbox"></div>
        </div>  
    </div>
    <script>
        $(document).ready(function() {
            $("#savedetails").on('click', function(){
                $.ajax({
                    url: "insertrelation.php",
                    type: "GET",
                    data: $("#frmsub").serialize(),
                    success: function(data) {
                        // alert(data);
                        // $("#relationmodal").modal('hide');
                        $("#alertbox").html("<div class='alert alert-success' role='alert'><i class='fas fa-solid fa-user-check' style='color: #000000;'></i> Details Entered.</div>");
                        setTimeout(function() {
                            $("#alertbox").html("<div id='alertbox'></div>");
                            // $("#relationmodal").modal('show');
                        }, 3000);
                    }
                })
            });
        });
    </script>
    
    <?php
    if ($_REQUEST['reg'] == "success") {
        // echo "hello>>>";
        // echo $_REQUEST['reg'];

    ?>
        <script>
            $(document).ready(function() {
                $("#relationmodal").modal('show');

                $("#alertbox").html("<div class='alert alert-success' role='alert'><i class='fas fa-solid fa-user-check' style='color: #000000;'></i> Details Entered.</div>");
                setTimeout(function() {
                    $("#alertbox").html("<div id='alertbox'></div>");
                    // $("#relationmodal").modal('show');
                }, 3000);
            });
        </script>
    <?php
    }
    if ($_REQUEST['reg'] == "ask") {
        // echo "hello>>>";
        // echo $_REQUEST['reg'];

    ?>
        <script>
            $(document).ready(function() {
                // $("#relationmodal").modal('show');

                $("#alertbox").html("<div class='alert alert-success' role='alert'>Details Entered.</div>");
                setTimeout(function() {
                    $("#alertbox").html("<div id='alertbox'></div>");
                    // $("#relationmodal").modal('show');
                }, 3000);
            });
        </script>
    <?php
    }
    if ($_REQUEST['reg'] == "complete") {
        // echo "hello>>>";
        // echo $_REQUEST['reg'];

    ?>
        <script>
            $(document).ready(function() {

                $("#alertbox").html("<div class='alert alert-primary' role='alert'>Registration Completed.</div>");
                setTimeout(function() {
                    $("#alertbox").html("<div id='alertbox'></div>");
                    // $("#relationmodal").modal('show');
                }, 3000);
            });
        </script>
    <?php
    }
    if ($_REQUEST['reg'] == "failed") {
        // echo "....hellofailed----";
        echo $_REQUEST['reg'];
    ?>
        <script>
            $(document).ready(function() {
                // if ($(user).val() == "" || $(user).val()==" ") {
                // alert("Please Enter Name");
                $("#alertbox").html("<div class='alert alert-danger' role='alert'><i class='fas fa-solid fa-skull-crossbones fa-shake fa-lg' style='color: #ff0000;'></i> Please Enter Your Name.</div>");
                setTimeout(function() {
                    $("#alertbox").html("<div id='alertbox'></div>");
                }, 3000);
                return false;
                // } 
            });
        </script>
    <?php
    }
    if ($_REQUEST['reg'] == "olduser") {
        // echo "....olduser----";
    ?>
        <script>
            $(document).ready(function() {
                // if ($(user).val() == "" || $(user).val()==" ") {
                // alert("Please Enter Name");
                $("#alertbox").html("<div class='alert alert-warning' role='alert'><i class='fas fa-solid fa-triangle-exclamation fa-lg' style='color: #000000;'></i> User already exists.</div>");
                setTimeout(function() {
                    $("#alertbox").html("<div id='alertbox'></div>");
                }, 3000);
                return false;
                // } 
            });
        </script>
    <?php
    }
    ?>
  </body>
</html>