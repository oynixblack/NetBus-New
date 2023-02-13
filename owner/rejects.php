<?php
include'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"update book set status='Reject' where bkid='$id'");
header('location:viewrequest.php');
?>