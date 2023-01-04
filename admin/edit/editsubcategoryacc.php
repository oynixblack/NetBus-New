  <?php
   include 'connection.php';
  if(isset($_POST['s']))
    {
    $subid=$_POST['subid'];
	$sname = $_POST['sname'];
    
    
   
        mysqli_query($con,"UPDATE `sub_category` SET 
       `sname`='$sname' where subid='$subid'");
    
            header('location: ../viewsubcategory.php?subid=.$subid');
     }

   ?>