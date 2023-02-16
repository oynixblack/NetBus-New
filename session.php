 <?php
  session_start();
  $user_id = $_SESSION['loginid'];
  $email = $_SESSION['username'];
 /*  if (!isset($conn)) require 'connection.php';
  $exist = $conn->query("SELECT * FROM login WHERE loginid = '$user_id'")->num_rows;
   */
  if (!isset($_SESSION['loginid'])) {
    echo "<script>alert('You are not logged in!'); window.location='../';</script>";
    exit;
  }


  
  /*if ($exist != 1) {
    echo "<script>alert('You are not logged in!'); window.location='../';</script>";
    exit;
  }*/
  ?>