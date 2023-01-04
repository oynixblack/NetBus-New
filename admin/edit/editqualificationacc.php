  <?php
   include 'connection.php';
  if(isset($_POST['s']))
    {
    $qid=$_POST['qid'];
	$qname = $_POST['qname'];
    
  // UPDATE `tbl_qualification` SET `qname`='new' WHERE qid='3';
   
if(mysqli_query($con,"UPDATE tbl_qualification SET qname='$qname' where qid='$qid'")){
    
            header("location:../viewqualification.php?qid=.$qid");
       }
     }

   ?>