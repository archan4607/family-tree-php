<?php
session_start();
if(isset($_GET['selmember'])){
    $selmember=$_GET['selmember'];
    $merge_selmember=implode(" ",$selmember);
    // $tempary=array();
    //     $tempary[]=$merge_selmember;
    // print_r($tempary) ;
    echo $merge_selmember;
    $_SESSION['merge_selmember'] = $merge_selmember;
    // $_SESSION['merge_selmember'] = $merge_selmember;

        // $unmerge_selmember=explode(" ",$merge_selmember);
        // print_r (explode(" ",$merge_selmember));
        // for($i=0;$i<=$merge_selmember;$i++)
        // {
        // }
        // echo  "$('#relationmodal').modal('merge')";
        header("Location: mainpage.php");
    }
    // echo  "Data ins";
?>