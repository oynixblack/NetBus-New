<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>

<div class="content">
    <div class="container-fluid">
        <?php
        if (!isset($_POST['submit'])) {
        ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="m-0">Quick Tips</h5>
                    </div>
                    <div class="card-body">
                        Use the links at the left.
                        <br />You can see list of schedules by clicking on "New Booking". The system will display list
                        of available schedules for you which you can view and make bookings from. <br>Before your
                        bookings are saved, you are redirected to make payment. 
                    </div>
                </div>
            </div><?php
                    } else {
                        $class = $_POST['class'];
                        $number = $_POST['number'];
                        $schedule_id = $_POST['id'];
                        if ($number < 1) die("Invalid Number");
                        ?>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header alert-success">
                            <h5 class="m-0">Ticket Booking Preview</h5>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> <?php echo ucwords($class), " Class" ?>:</h5>
                                You are about to book
                                <?php echo $number, " Ticket", $number > 1 ? 's' : '', ' for ', getRouteFromSchedule($schedule_id); ?>
                                <br />

                                <?php

                                    $fee = ($_SESSION['amount'] = getFee($schedule_id, $class));
                                    echo $number, " x ₹", $fee, " = ₹", ($fee * $number), "<hr/>";
                                    $fee = $fee * $number;
                                    $amount = intval($fee);
                                    $gst = ceil($fee * 0.01);
                                    $cgst = ceil($fee * 0.01);
                                    echo "G.S.T Charges = ₹$gst<br/><br/><hr/>";
                                    echo "C.G.S.T Charges = ₹$cgst<br/><br/><hr/>";
                                    echo "Total =₹", $total = $amount + $gst + $cgst;
                                    $fee =  intval($total) . "00";
                                    $_SESSION['amount'] =  $total;
                                    $_SESSION['original'] =  $fee;
                                    $_SESSION['schedule'] =  $schedule_id;
                                    $_SESSION['no'] =  $number;
                                    $_SESSION['class'] =  $class;
                                    ?>
                            </div>
                            <?php
$apiKey="rzp_test_NWRgjnzVKNrtx1";
?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<form action="verify.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $total  * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="order_CgmcjRh9ti2lP7"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay Now"
    data-name="NetBus E-Ticketing"
    data-description="Everything’s better with a better Journey."
    data-image="https://cdn.dribbble.com/users/5592566/screenshots/14248004/ksrtcdribble1_4x.jpg"
    data-prefill.name="Minu Joe"
    data-prefill.email=""
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden" class="btn btn-primary">
<input type="text"name="payment" value="<?php echo $total ?>" readonly>
<input type="hidden"name="schedule" value="<?php echo $schedule_id ?>">
<input type="hidden"name="class" value="<?php echo $class ?>">
<input type="hidden"name="number" value="<?php echo $number ?>">
</form>
<!--gateway end-->

<style>
    .razorpay-payment-button{
        background-color: #0DCAF0;
        color: white;
        font-size: 18px;padding: 8px 10px;font-weight: bold;
        border-radius: 12px; border: none;text-align: center; 
    }
</style>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>