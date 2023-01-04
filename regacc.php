<?php
    include 'connection.php';
  //$cno = $_REQUEST['con_no'];
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
	$adress = $_POST['adress'];
    $phone = $_POST['phone'];
	$gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $s = "SELECT * FROM login WHERE username = '$email'";
    $result1 = mysqli_query($conn, $s);
    $row1=mysqli_fetch_assoc($result1);
    $uname= isset($row1['username']) ? $row1['username'] : '';
	
    if($uname=="")
    {
            if($password===$confirm_password)
            {
            $sq = "INSERT INTO login (username,password,type1,status) VALUES ('$email','$password','user','1')";
            
             mysqli_query($conn, $sq);

              $sqll = "SELECT * FROM login WHERE username = '$email' and password = '$password' and type1 = 'user'";
             $result = mysqli_query($conn, $sqll);
            $no=mysqli_num_rows($result);
        
            if($no > 0)
            {
             $row=mysqli_fetch_assoc($result);
             $loid=$row['loginid'];
             echo $sql = "INSERT INTO register (loginid,fname,lname,email,adress,phone,gender,estatus) VALUES ('$loid','$fname','$lname','$email','$adress','$phone','$gender','1')";
             mysqli_query($conn, $sql);
               echo "<script> alert('Registration successfull'); window.location.href='login.php';</script>";
             }
         }
         else
            echo "<script> alert('please enter password correctly'); window.location.href='register.php';</script>";
}
else
echo "<script> alert('You are already registered'); window.location.href='index.php';</script>"

?>