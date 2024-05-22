<?php
session_start();
    include_once 'connection.php';
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_SESSION['last_id'])){
        $requid = $_SESSION['last_id'];
        $sel="select * from user where user_id=$requid";
        $res=mysqli_query($con,$sel);
        $row=mysqli_fetch_assoc($res);
        $last_lname= $row['u_lname'];
        
        $sel2="SELECT * FROM user where u_lname='$last_lname' and NOT user_id=$requid";
        $res2=mysqli_query($con,$sel2);
        
        // echo $last_lname;
    }
    else{
        // echo "error";
    }

    
    // $row2=mysqli_fetch_row($res2);
   
    
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
  <body>
        <div class="container col-6">
            <div class="card mt-5">
                <div class="card card-body">
                    <h4>Registration Form</h4>
                <form method="GET" action="insert.php" id="frmsub">
                    <div class="row">
                        <div class="col mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                                <input type="text" class="form-control" id="num" placeholder="mobile number" name="num" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <label class="form-check-label" for="inlineRadio1">Gender:&nbsp;&nbsp;&nbsp;</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" id="dob" placeholder="Select DOB" name="dob" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-outline-primary" value="Register">
                    </div>
                </form>              
            </div>
        </div>
        <div class="mt-3">
            <div id="alertbox"></div>
        </div>  
        <div class="mt-3">
            <div id="rs"></div>
        </div>  

        
        <!-- Modal -->
        <div class="modal fade" id="relationmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="relationmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="relationmodalLabel"><?php
                // echo $_SESSION['last_id']." ";
                // echo $row['u_fname']." ";
                // echo $row['u_lname'];
                ?>
                Select people if you know them.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="relform" method="GET" action="updaterelation.php">                   
                    <div class="form-check form-switch">
                <?php
                   
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                    // }
                ?>
                    <!-- <input type="checkbox" name="xyz" id="" value=""> -->
                    <div>
                        <input class="form-check-input get_value" type="checkbox" role="switch" name="selmember[]" value="<?php echo $row2['user_id']; ?>" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked"><?php echo $row2['u_fname']." ".$row2['u_lname']; ?></label>
                    </div>
                        <!-- <input type="checkbox" class="btn-check" name="vbtn-radio" id="vbtn-radio1" autocomplete="off" checked>
                        <label class="btn btn-outline-danger" for="vbtn-radio1"></label> -->
                        
                <?php
                    }
                    
                ?>
                </div>

                <!-- <p><?php echo $row2['u_lname']; ?></p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitreldata" >Submit</button>
                </div>
            </form> 
            </div>
        </div>
        </div>
                    

    </div>
    
    <?php
    if(mysqli_num_rows($res2)>0){
        $flag_data=1;
        $_SESSION['flag_data']=$flag_data;
        // echo "data";
        ?>
        <script>
            $(document).ready(function(){
                // $("#relationmodal").modal('show');
            });
        </script>
        <?php
    }
    else{
        $flag_data=0;

        // echo "not found";
    }
    if ($_REQUEST['reg'] == "success") {
        // echo "hello>>>";
        // echo $_REQUEST['reg'];
    
    ?>
        <script>
            $(document).ready(function() {
                // var fdata= <?php echo $_SESSION['flag_data']; ?>;
                // if(fdata=="1"){

                //     alert("data not found");
                // }else{
                    $("#relationmodal").modal('show');
                // }
    
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
    <script>
        $(document).ready(function(){
            // $("#submitreldata").click(function() {
            //     var personlist = [];  
            //     $('.get_value').each(function(){  
            //             if($(this).is(":checked"))  
            //             {  
            //                 personlist.push($(this).val());  
            //             }  
            //         });  
            //         personlist = personlist.toString();
            //         console.log(personlist);
            //         // alert("hello");
            //         $.ajax({
            //             url: updaterelation.php,
            //             type: GET,
            //             data: {personlist:personlist},
            //             success: function(data){
            //                 // window.location.href("index.php");
            //                 $('#rs').html(data);
            //         }
            //     });
            // });


            // $('#submitreldata').click(function(){  
            //     preventDefault();
            //     var checkboxes_value = []; 
            //     $('.get_value').each(function(){  
            //             //if($(this).is(":checked")) { 
            //             if(this.checked) {              
            //                 checkboxes_value.push($(this).val());                                                                               
            //             }  
            //     });                              
            //     checkboxes_value = checkboxes_value.toString(); 

            //     $.ajax({  
            //             url:"updaterelation.php",  
            //             method:"GET",  
            //             data:{ checkboxes_value:checkboxes_value},  
            //             success:function(data){  
            //                 alert("reses");
            //                 $('#rs').html(data);  
            //             }  
            //     });  
            //     });
        });
    </script>
  </body>
</html>