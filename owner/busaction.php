<?php
include'connection.php';
session_start();
$val=$_SESSION['id'];
if(isset($_POST['submit']))
{
	$name=$_FILES['file']['name'];
$tmpname=$_FILES['file']['tmp_name'];
	if(isset($name))
	{
		if(!empty($name))
		{
            
			$location='uploads/';
			echo"file is".$name;
			if(move_uploaded_file($tmpname,$location.$name))
            $fn=$_POST['fname'];
            $ln=$_POST['lname'];
            $em=$_POST['email'];
            $a=$_POST['adress'];
            $ph=$_POST['phone'];
            $sql=mysqli_query($conn,"insert into bus(name,first_seat,second_seat,regno,scapacity,frm,tdetails,image,vid,status)values('$fn','$em','$em','$ln','$em','$a','$ph','$name','$val','pending')");
           // $sql=mysqli_query($conn,"insert into owner(fname,lname,email,address,phone,image,gender,loggid)values('$fn','$ln','$em','$a','$ph','$name','$g','$loid')");
           
            
           echo "<script> alert('Added successfully'); window.location.href='addbus.php';</script>";
           
        
        }
    }
}
?>
                        

                    