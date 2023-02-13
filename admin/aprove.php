<?php
include '../connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"update bus set status='Approved' where id='$id'");
     
echo "<script> alert('Approved successfully'); window.location.href='/NETBUSSP/admin.php';</script>";
?>