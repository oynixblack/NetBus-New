<?php
include 'connection.php';
session_start();
if (! empty($_SESSION['logged_in'])) {
	# code...
	$uid = $_SESSION['id'];
	$sql = mysqli_query($conn,"SELECT * from register where loginid='$uid'");
    $row=mysqli_fetch_array($sql);
    $bi=$_GET['id'];
    $bn=$_GET['bname'];
    $sc=$_GET['sc'];
    $n=$_GET['nsc'];
    $nm=$_GET['nm'];
    $ph=$_GET['ph'];
    $dt=date('Y-m-d');
    $f=$_GET['f'];
    $t=$_GET['t'];
    $sq=mysqli_query($conn,"insert into book(bid,bname,scapacity,nseat,name,phone,status,vid,dte,frm,tdetails)values('$bi','$bn','$sc','$n','$nm','$ph','pending','$uid','$dt','$f','$t')");
    header('location:individual.php');
}
    ?>
