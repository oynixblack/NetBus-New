<?php
include '../connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"update bus set status='Rejected' where id='$id'");
echo "<script> alert('Rejected successfully'); window.location.href='/NETBUSSP/admin.php';</script>";
?>