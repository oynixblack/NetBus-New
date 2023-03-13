<?php
require_once 'session.php';
require_once 'connection.php';
require_once 'constants.php';
// require_once 'helper.php';
// require_once 'mail_template.php';

// $message_text = "<p> Thank you for joining the contest. Sitback while we update you on events and processes involved. </p> 
//   <p>In order to login, use your email and your first name as password. Once you are logged in, you are advised to change your password. <a href='https://netrepeneurs.com/login/'>Login Here</a></p>
//   <p>Regards, Netrepeneurs team.</p>
// ";

// if (isset($_GET['reference'])) {
//   $email = $_SESSION['email'];
 //$reference = $_GET['reference'];
//   $uid = $_SESSION['user_id'];
//   $pay = curl_init();
//   $paid = $_SESSION['original'];

// $number = $_SESSION['no'];
//   $class = $_SESSION['class'];
//   $price = 0;
// sesion_start();

  // $user_id = $_SESSION['loginid'];
  session_start();
  $user_id=$_SESSION['id'];
  $amount = $_POST['payment'];
  $schedule_id = $_POST['schedule'];
  $class = $_POST['class'];
  $number = $_POST['number'];
  
                                     

  $select_stock="SELECT phone from register where loginid=$user_id";

  $result_stock=mysqli_query($conn,$select_stock);
  
  $row_stock=mysqli_fetch_assoc($result_stock);//fetch data from db

    $phone=$row_stock['phone'];
  
// Set API credentials and endpoint URL
$api_token = 'ff8653622c27425495dd4760ec05c279';
$service_plan_id = '12fadf401edf4cc7923167cdfde310b5';
$endpoint_url = "https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches";

// Set SMS data
$from = '+447520651524';
$to = $phone;
$body = 'Hi there,We are pleased to inform you that your booking is confirmed.Thank you .';

// Set POST data
$data = array(
'from' => $from,
'to' => array($to),
'body' => $body
);
$post_data = json_encode($data);

// Set cURL options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Authorization: Bearer {$api_token}",
"Content-Type: application/json"
));

// Send request and get response
$response = curl_exec($ch);


// // Process response
// if ($response) {
//     $response_data = json_decode($response, true);
//     echo "SMS sent! Message ID:{$response_data['id']}";
// } else {
//     echo "Error sending SMS: " . curl_error($ch);
// }
curl_close($ch);
                                   

                                   

  // curl_setopt_array($pay, array(
  //   CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  //   CURLOPT_RETURNTRANSFER => true,
  //   CURLOPT_SSL_VERIFYPEER => 0,
  //   CURLOPT_HTTPHEADER => [
  //     "accept: application/json",
  //     "authorization: Bearer sk_test_821804a35c86b49555518a31e0f43ca687086660",
  //     "cache-control: no-cache"
  //   ],
  // ));

  // $response = curl_exec($pay);
  // $err = curl_error($pay);
  // if ($err) {

  //   // there was an error contacting the Paystack API
  //   header("Location: individual.php?page=pay&error=payment");
  //   exit();
  // }

  // if ($response) {

  //   $result = json_decode($response, true);

  //   if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success') && ($result['data']['requested_amount'] === intval($amount))) {
  //     //confirm access to payment success page
  //     $paid = substr($paid, 0, -2);
      // $reference = strtoupper($reference);
      $ins = $conn->query("INSERT INTO payment (passenger_id, schedule_id, amount, date) VALUES ('$user_id','$schedule_id', '$amount', '$date')");
      // if ($ins)
      // {
      //  echo "<script>alert('Payment could not be initialized! Network Error!'); </script>";
      // }
      $code = genCode($schedule_id, $user_id, $class);
      $seat = genSeat($schedule_id, $class, $number);
      $payment_id = $conn->insert_id;
      if ($payment_id > 0) {

       
       $i= $conn->query("INSERT INTO booked (payment_id, schedule_id, user_id, code, class, no, date, seat) VALUES ('$payment_id','$schedule_id', '$user_id', '$code', '$class', '$number', '$date' , '$seat')");
       
      //  unset($_SESSION['discount']);
      //   unset($_SESSION['amount']);
      //   unset($_SESSION['original']);
      //   unset($_SESSION['schedule'])
      //   unset($_SESSION['no']);
      //   unset($_SESSION['class']);
      //   $_SESSION['pay_success'] = 'true';
      //   $_SESSION['has_paid'] = 'true';
      //   header("Location: individual.php?page=paid&now=true");
      //   exit();
      // }
      if ($i)
      {
        echo "<script>alert('Payment Success'); window.location = 'individual.php?page=paid';</script>";
      }
    // } else {
    //   header("Location: individual.php?page=pay&error=payment");
    //   exit();
    // }
//     header("Location: individual.php?page=pay&error=payment");
//     exit();
  }
//   header("Location: individual.php?page=pay&error=payment");
//   exit();
// }
// header("Location: individual.php?page=pay&error=payment");
// exit()
?>