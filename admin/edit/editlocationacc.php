  <?php
   include 'connection.php';
  if(isset($_POST['s']))
    {
    $lid=$_POST['lid'];
	$lname = $_POST['lname'];
    
  // UPDATE `tbl_qualification` SET `qname`='new' WHERE qid='3';
   
if(mysqli_query($con,"UPDATE tbl_location SET lname='$lname' where lid='$lid'")){
    
            header("location:../viewlocation.php?lid=.$lid");
       }
     }

   ?>