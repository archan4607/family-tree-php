<?php
    session_start();
    include_once 'connection.php';
    error_reporting(E_ERROR | E_PARSE);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        LINK REL
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card mt-3 ">
            <div class="card-body">
                <form method="POST" action="updlink.php" id="frmsub">
                    <div class="row">
                        <?php
                            $selmale="select * from user where gender=1";
                            $resmale=mysqli_query($con,$selmale);
                        ?>
                        <div class="col mt-3">
                            <label for="exampleFormControlSelect1">Male</label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="selrelation" name="male">
                                        <?php
                                            while($fetchmale=mysqli_fetch_array($resmale))
                                            {
                                                ?>
                                            <option value="" hidden>Select</option>
                                            <option value="<?php echo $fetchmale['user_id']; ?>"><?php echo $fetchmale['u_fname']." ".$fetchmale['u_lname']; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <?php
                            $selmale="select * from user where gender=2";
                            $resmale=mysqli_query($con,$selmale);
                        ?>
                        <div class="col mt-3">
                            <label for="exampleFormControlSelect1">Female</label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="selrelation" name="female">
                                        <?php
                                            while($fetchmale=mysqli_fetch_array($resmale))
                                            {
                                                ?>
                                            <option value="" hidden>Select</option>
                                            <option value="<?php echo $fetchmale['user_id']; ?>"><?php echo $fetchmale['u_fname']." ".$fetchmale['u_lname']; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-outline-primary" id="upd" value="UPDATE">
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-3">
            <div id="alertbox"></div>
        </div>  
    </div>
    <?php
    
    if ($_REQUEST['s'] == "1") {
        // echo "hello>>>";
        // echo $_REQUEST['reg'];

    ?>
        <script>
            $(document).ready(function() {
                $("#alertbox").html("<div class='alert alert-success' role='alert'>Details Updated.</div>");
                setTimeout(function() {
                    $("#alertbox").html("<div id='alertbox'></div>");
                }, 3000);
            });
        </script>
    <?php
    }
    ?>

   </body>
</html>