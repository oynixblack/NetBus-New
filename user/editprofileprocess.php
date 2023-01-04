<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$id=$_SESSION['id'];
include '../connection.php';
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$q="update register set fname='$fname',lname='$lname',phone='$phone',email='$email' where loginid='$id'";
mysqli_query($conn,$q);
header('location:userprofile.php');
?>


</body>
</html>
