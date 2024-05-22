<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- <script src="https://kit.fontawesome.com/a5cbde906e.js" crossorigin="anonymous"></script> -->
    </head>
    <body class="">
    
        <div class="container col-6" id='hidecontainer'>
            <div class="card mt-5">
                <div class="card card-body">
                    <h4>Find Relation</h4>
                    <form id="findrelfrm" method="POST" action="findrelation.php">
                        <div class="row">
                            <div class="col mt-3">
                                <label class="form-check-label" for="inlineRadio1"> User 1:&nbsp;&nbsp;&nbsp;</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="us_fn1" placeholder="First Name" name="us_fn1" value="" aria-label="Username" aria-describedby="basic-addon1">
                                    <input type="text" class="form-control" id="us_ln1" placeholder="Last Name" name="us_ln1" value="" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col mt-3">
                                <label class="form-check-label" for="inlineRadio1"> User 2:&nbsp;&nbsp;&nbsp;</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="us_fn2" placeholder="First Name" name="us_fn2" value="" aria-label="Username" aria-describedby="basic-addon1">
                                    <input type="text" class="form-control" id="us_ln2" placeholder="Last Name" name="us_ln2" value="" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <input type="submit" class="btn btn-outline-secondary" id="clearfields" value="Clear">
                            <input type="submit" class="btn btn-outline-primary" id="findrelation" value="Find Relation">
                        </div>
                    </form>
                </div>
            </div>
            <div id="loadajax" style="font-size: 21px;">
            <!-- <p>ajax</p> -->
        </div>
        </div>
        
        <script>
            $(document).ready(function(){
                // $('#findrelation').on("click",function(e){
                //     e.preventDefault();
                    window.onload=function(){
                
                    var us_fn1 = $("#us_fn1").val();
                    var us_ln1 = $("#us_ln1").val();
                    var us_fn2 = $("#us_fn2").val();
                    var us_ln2 = $("#us_ln2").val();
                    // var hidecontainer=document.getElementById('#hidecontainer');

                        // $("input").keypress(function(){
                            // $("#loadajax").text(i += 1);
                       
                            // if(us_fn1!="" || us_ln1!="" || us_fn2!="" || us_ln2!=""){
                            //     if(us_fn1==us_fn2 && us_ln1==us_ln2)
                            //     {
                            //         alert("same name");
                            //     }
                            //     else{
                                    // $('#hidecontainer').html("<div id='loadajax'></div>");
                                    $.ajax({
                                        url:"findrelation.php",
                                        type:"POST",
                                        data:{us_fn1:us_fn1, us_ln1:us_ln1, us_fn2:us_fn2, us_ln2:us_ln2},
                                        success:function(result){
                                            $("#loadajax").html(result);
                                        }
                                    });
                                // }                        
                            // }
                            // else{
                            //     alert("please fill all input");
                            // }
                        }
                        // });
            // });
                $('#clearfields').on("click",function(){
                    $('#findrelfrm')[0].reset();
                    $('.fetch_results').find('input:text').val('');
                });
            });
        </script>
    </body>
</html>