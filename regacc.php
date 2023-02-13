<?php
    include 'connection.php';


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    function sendMail($email, $v_code)
    {
      require ("PHPMailer/PHPMailer.php");
      require ("PHPMailer/SMTP.php");
      require ("PHPMailer/Exception.php");
      $mail = new PHPMailer(true);
      try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'netbuseticketing@gmail.com';                     //SMTP username
        $mail->Password   = 'kqxmaeuonidkrbqi';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        $mail->setFrom('netbuseticketing@gmail.com', 'NetBus');
        $mail->addAddress($email);    
     //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = 'Email Verification From NetBus';
     $mail->Body    = "Thanks for registering! Click the link to verify the email address
                       <a href='http://localhost/NETBUSSP/verifymail.php?email=$email&code=$v_code'>Verify</a>";
     $mail->send();
     return true;
    } catch (Exception $e) {
     // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     return false;
    }
    }
    




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
              $code=bin2hex(random_bytes(16));
            $sq = "INSERT INTO login (username,password,type1,status,code) VALUES ('$email','$password','user','1','$code')";
            
             mysqli_query($conn, $sq);

              $sqll = "SELECT * FROM login WHERE username = '$email' and password = '$password' and type1 = 'user'";
             $result = mysqli_query($conn, $sqll);
            $no=mysqli_num_rows($result);
        
            if($no > 0)
            {
             $row=mysqli_fetch_assoc($result);
             $loid=$row['loginid'];
           $sql = "INSERT INTO register (loginid,fname,lname,email,adress,phone,gender,estatus) VALUES ('$loid','$fname','$lname','$email','$adress','$phone','$gender','1')";
           if($conn->query($sql)=== TRUE && sendMail($email, $code))
           {
             echo "<script> alert('Please do Verify the link send to registered email to LOGIN'); </script>";
     //header("location:user-login.php");
           } }
         }
         else
            echo "<script> alert('please enter password correctly'); window.location.href='register.php';</script>";
}
else
echo "<script> alert('You are already registered'); window.location.href='index.php';</script>"

?>