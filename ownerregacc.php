<?php
include'connection.php';
//session_start();
//$val=$_SESSION['uid'];
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
            $g=$_POST['gender'];
            $ps=$_POST['password'];
            $cp=$_POST['confirm_password'];
            if($ps==$cp)
            {
                $q=mysqli_query($conn,"insert into login(username,password,type1,status)values('$em','$ps','owner','0')");
                
              $sqll = "SELECT * FROM login WHERE username = '$em' and password = '$ps' and type1 = 'owner'";
              $result = mysqli_query($conn, $sqll);
             $no=mysqli_num_rows($result);
         
             if($no > 0)
             {
              $row=mysqli_fetch_assoc($result);
              $loid=$row['loginid'];
            
            $sql=mysqli_query($conn,"insert into owner(fname,lname,email,address,phone,image,gender,loggid)values('$fn','$ln','$em','$a','$ph','$name','$g','$loid')");
            // $sq=mysqli_query($conn,"select max(oid) as id from owner");
            // $row=mysqli_fetch_assoc($sq);
            // $tid=$row['id'];
            
           echo "<script> alert('Registration successfull'); window.location.href='login.php';</script>";
            }
        }
        else
            echo "<script> alert('please enter password correctly'); window.location.href='register.php';</script>";
        }
    }
}
?>