<?php
include 'connection.php';
 if(isset($_POST['s']))
    {
    $jobid=$_POST['joid'];
    $cid=$_POST['cat'];
      $subid=$_POST['spec'];
      $req_emp=$_POST['req_emp'];
      $salary=$_POST['salary'];
      $duration=$_POST['duration'];
      $workexp=$_POST['workexp'];
      $qualifi=$_POST['qualifi'];
      $location=$_POST['location'];
      $jobdis=$_POST['jobdis'];
      
      date_default_timezone_set('asia/kolkata');
       $date = date('Y/m/d h:i:s a', time());
    
   
 mysqli_query($con,"UPDATE tbljob SET cid='$cid',subid='$subid',req_num_emp='$req_emp',salary='$salary',duration='$duration',workexp='$workexp',qualifi='$qualifi',location='$location',jobdiscription='$jobdis',dateofpost='$date' WHERE jobid='$jobid'");
    
            header('location: ../viewvacancy.php');
     }
  
      
    
 ?>
