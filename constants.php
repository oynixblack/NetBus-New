<?php
 //require_once 'session.php';



include_once 'config.php';

define("SITE_NAME", $title);
date_default_timezone_set("Asia/Kolkata");
$date = date('D, d-M-Y h:i:s A');;
$date_small = date('d-M-Y');;
//INSERT YOUR OWN PAYSTACK API KEYS
$paystack = "sk_test_71c2dc8c8c569dcfe1211f855d4bc749f5978276"; //Do not change this! Redirect URL http://localhost/train/pro/verify.php
if (!function_exists('connect')) {

    function connect()
    {
        $con = new mysqli("localhost", "root", "", "job1");
        if (!$con) die("Database is being upgraded!");
        return $con;
    }
}






function genSeat($id, $type, $number)
{
    $conn = connect();
    $type_seat = $conn->query("SELECT bus.first_seat as first, bus.second_seat as second FROM schedule INNER JOIN bus ON bus.id = schedule.bus_id WHERE schedule.id = '$id'")->fetch_assoc();
    $me = $type_seat[$type];
    $query = $conn->query("SELECT SUM(no) AS no FROM booked WHERE schedule_id = '$id' AND class = '$type'")->fetch_assoc();
    $no = $query['no'];
    if ($no == null) $no = 1;
    else $no++;
    //Multiple Seats or Not
    if ($number == 1) {
        while (strlen($no) != strlen($me)) {
            $no = "0" . $no;
        }
        return strtoupper(substr($type, 0, 1)) . "$no";
    } else {
        $start = $no;
        $end = $no + ($number - 1);
        while (strlen($start) != strlen($me)) {
            $start = "0" . $start;
        }
        while (strlen($end) != strlen($me)) {
            $end = "0" . $end;
        }
        $append = strtoupper(substr($type, 0, 1));

        return $append . $start . " - " . $append . $end;
    }
}


function genCode($id, $user, $class)
{
    $conn = connect();
    $query = $conn->query("SELECT SUM(no) AS no FROM booked WHERE schedule_id = '$id'")->fetch_assoc();
    $no = $query['no'];
    if ($no == null) $no = 1;
    else $no++;
    $number = "";
    switch (strlen($id)) {
        case 1:
            $number = "00";
            break;
        case 2:
            $number = "0";
            break;
        default:
            $number = "0";
            break;
    }
    $code = date('Y') . "/$number" . $id . "/" . $no . mt_rand(1, 882);
    return $code;
}

function login($username, $password)
{
    $password = md5($password);
    $q = connect()->query("SELECT * FROM login WHERE username = '$username' AND password = '$password' AND status = '1' ")->num_rows;
    if ($q == 1) return 1;
    return 0;
}

function adminLogin($username, $password)
{
    $q = connect()->query("SELECT * FROM login WHERE username = '$username' AND password = '$password' ")->num_rows;
    if ($q == 1) return 1;
    return 0;
}

function getIndividualName($id, $conn = null)
{
    $conn = connect();
    $q = $conn->query("SELECT * FROM register WHERE loginid = '$id'")->fetch_assoc();
    return $q['fname'];
}

// function uploadFile($file)
// {

//     $loc = genRand() . "." . strtolower(pathinfo(@$_FILES[$file]['name'], PATHINFO_EXTENSION));
//     $valid_extension = array("jpg", "png", "jpeg");
//     //Check for valid file size
//     if (($_FILES[$file]['size'] && !in_array(strtolower(pathinfo(@$_FILES[$file]['name'], PATHINFO_EXTENSION)), $valid_extension)) || ($_FILES[$file]['size'] && $_FILES[$file]['error']) > 0) {
//         return -1;
//     }
//     $upload = move_uploaded_file(@$_FILES[$file]['tmp_name'], "uploads/" . $loc);
//     if ($upload) {
//         chmod("uploads/" . $loc, 0777);
//         return $loc;
//     } else {
//         return -1;
//     }
// }

function genRand()
{
    return md5(mt_rand(1, 3456789) . date('dmyhmis'));
}

function getImage($id, $conn)
{
    $row = $conn->query("SELECT loc FROM passenger WHERE id = '$id'")->fetch_assoc();
    if (strlen($row['loc']) < 10) return "images/trainlg.png";
    else return "uploads/" . $row['loc'];
}

function formatDate($date)
{
    return date('d-m-Y', strtotime($date));
}

function getRoutePath($id)
{
    $val = connect()->query("SELECT * FROM route WHERE id = '$id'")->fetch_assoc();
    return $val['start'] . " to " . $val['stop'];
}

function formatTime($time)
{
    $time = explode(":", $time);
    if ($time[0] > 12) {
        $string = ($time[0] - 12) . ":" . $time[1] . " PM";
    } else {
        $string = ($time[0]) . ":" . $time[1] . " AM";
    }
    return $string;
}

function getToday()
{
    return date('d-m-Y');
}

function getTime()
{
    return date('H:i');
}

function querySchedule($type)
{
    $today = getToday();
    $conn = connect();
    $row = 0;
    if ($type == 'future') {
        $row = $conn->query("SELECT * FROM `schedule` WHERE STR_TO_DATE(`date`,'%d-%m-%Y') >= STR_TO_DATE('$today','%d-%m-%Y')");
    } else {
        $row = $conn->query("SELECT * FROM `schedule` WHERE STR_TO_DATE(`date`,'%d-%m-%Y') <= STR_TO_DATE('$today','%d-%m-%Y')");
    }
    return $row;
}

function getRouteFromSchedule($id)
{
    $q = connect()->query("SELECT route_id as id FROM schedule WHERE id = '$id'")->fetch_assoc();
    return getRoutePath($q['id']);
}

function getFee($id, $type = 'first')
{
    if ($type == 'first') {
        $type = 'first_fee';
    } else {
        $type = 'second_fee';
    }
    $q = connect()->query("SELECT $type FROM schedule WHERE id = '$id'")->fetch_assoc();
    return $q[$type];
}

function getTotalBookByType($id)
{

    $con =  connect()->query("SELECT SUM(no) as no FROM `booked` WHERE schedule_id = '$id' AND class = 'second'")->fetch_assoc();
    $con2 =  connect()->query("SELECT SUM(no) as no FROM `booked` WHERE schedule_id = '$id' AND class = 'first'")->fetch_assoc();
    $no = $con['no'];
    $no2 = $con2['no'];
    $num = $no == null ? 0 :  $con['no'];
    $num2 = $no2 == null ? 0 :  $con2['no'];
    $qu = connect()->query("SELECT bus.first_seat as first, bus.second_seat as second FROM schedule INNER JOIN bus ON bus.id = schedule.bus_id WHERE schedule.id = '$id'")->fetch_assoc();
    $first = $qu['first'];
    $second = $qu['second'];
    $first = intval($first);
    $second = intval($second);
    $num = intval($num);
    $num2 = intval($num2);
    return array("first" => $first, "second" => $second, "first_booked" => $num, "second_booked" => $num2);
}

function isScheduleActive($id)
{
    $today = getToday();
    $con = connect();
    $conn = $con->query("SELECT * FROM `schedule` WHERE STR_TO_DATE(`date`,'%d-%m-%Y') >= STR_TO_DATE('$today','%d-%m-%Y') AND `id` = '$id'");
    if ($conn->num_rows == 1) {
        $row = $conn->fetch_assoc();
        $time = getTime();
        $schedule_date = $row['date'];
        $schedule_time = $row['time'];
        if ($schedule_date == $today) {
            if (strtotime($schedule_time) <= strtotime($time)) return false;
        }
        return true;
    }
    return false;
}

function getTrainName($id)
{
    $val = connect()->query("SELECT name FROM bus WHERE id = '$id'")->fetch_assoc();
    return $val['name'];
}
function alert($msg)
{
    echo "<script>alert('$msg')</script>";
}

function load($link)
{
    echo "<script>window.location = ('$link')</script>";
}


function printClearance($id)
{
    ob_start();
    $conn = connect();
    $me=$_SESSION['id'];
    $getCount = (connect()->query("SELECT schedule.id as schedule_id, register.fname as fullname, register.email as email, register.phone as phone, payment.amount as amount , payment.date as payment_date, schedule.bus_id as bus_id , booked.code as code, booked.no as no, booked.class as class, booked.seat as seat, schedule.date as date, schedule.time as time FROM booked INNER JOIN schedule on booked.schedule_id = schedule.id INNER JOIN payment ON payment.id = booked.payment_id INNER JOIN register ON register.loginid = booked.user_id WHERE booked.id = '$id'"));
    if ($getCount->num_rows != 1) die("Denied");
    $row = $getCount->fetch_assoc();
    $passenger_name = substr($fullname = ($row['fullname']), 0, 15);
    $name = $fullname;
    $phone = $row['phone'];
    $email = $row['email'];
    $timeframe = '<tr><th style="text-align:center"><b>Project Phase</b></th><th style="text-align:center"><b>Date Accepted</b></th></tr>';
    $date = $row['date'];
    $time = formatTime($row['time']);
    $uniqueCode = $row['code'];
    $route = getRouteFromSchedule($row['schedule_id']);
    $date = date("D d, M Y", strtotime($date));

    $barcode = "$fullname Ticket For $route - $date by $time. Ticket ID : $uniqueCode";
    $barcodeOutput = generateQR($id, $barcode);
    // $loc = $row['loc'];
    $seat = $row['seat'];
    $bus = getTrainName($row['bus_id']);
    $class = $row['class'];
    $payment_date = $row['payment_date'];
    $amount = $row['amount'];
    $file_name = preg_replace('/[^a-z0-9]+/', '-', strtolower($passenger_name)) . ".pdf";
    require_once 'PDF/tcpdf_config_alt.php';

    // Include the main TCPDF library (search the library on the following directories).
    $tcpdf_include_dirs = array(
        realpath('PDF/tcpdf.php'),
        '/usr/share/php/tcpdf/tcpdf.php',
        '/usr/share/tcpdf/tcpdf.php',
        '/usr/share/php-tcpdf/tcpdf.php',
        '/var/www/tcpdf/tcpdf.php',
        '/var/www/html/tcpdf/tcpdf.php',
        '/usr/local/apache2/htdocs/tcpdf/tcpdf.php',
    );
    foreach ($tcpdf_include_dirs as $tcpdf_include_path) {
        if (@file_exists($tcpdf_include_path)) {
            require_once $tcpdf_include_path;
            break;
        }
    }

    class MYPDF extends TCPDF
    {
        //Page header
        public function Header()
        {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = K_PATH_IMAGES . "watermark.jpg";
            // die($img_file);
            $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            $this->SetAlpha(0.5);

            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor($fullname);
    $pdf->SetTitle($fullname . " Ticket");
    $pdf->SetSubject(SITE_NAME);
    $pdf->SetKeywords("Bus Booking System, Bus, Buses, Busbooking, Booking, Project, System, Website, Portal ");


    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, 7, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(true, 5);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once dirname(__FILE__) . '/lang/eng.php';
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    $src = $barcodeOutput;
    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
    // Set some content to print
    $html = <<<EOD
<style>
table th{font-weight:italic}
</style>
<h1 style="text-align:center"><img src="images/trainlg.png" width="100" height="100"/><br/>NetBUS e-Ticketing System<br/> BUS TICKET</h1> <div style="text-align:right; font-family:courier;font-weight:bold"><font size="+6">Ticket N<u>o</u>: $uniqueCode </font></div>
<table width="100%" border="1">
<tr><th colspan="2" style="text-align:center"><b>Personal Data</b></th></tr>
<tr><th><b>Passenger Name:</b></th><td>$fullname</td></tr>
<tr><th><b>Email:</b></th><td>$email</td></tr>
<tr><th><b>Contact:</b></th><td>$phone</td></tr>
<tr><td colspan="2" style="text-align:center"><b>Trip Detail</b></td></tr>
<tr><th><b>Route:</b></th><td>$route</td></tr>
<tr><th><b>Bus:</b></th><td>$bus</td></tr>
<tr><th><b>Class:</b></th><td>$class Class</td></tr>
<tr><th><b>Seat Number:</b></th><td>$seat</td></tr>
<tr><th><b>Date:</b></th><td>$date</td></tr>
<tr><th><b>Time:</b></th><td>$time</td></tr>
<tr><th colspan="2"  style="text-align:center"><b>Payment</b></th></tr>
<tr><th><b>Amount:</b></th><td>₹ $amount</td></tr>
<tr><th><b>Payment Date:</b></th><td>$payment_date</td></tr>


</table>

EOD;

    // @unlink($barcodeOutput);
    $html .= <<<EOD
<table width="100%">
<tr><td colspan="2"><p>&nbsp;</p></td></tr>
<tr><td colspan="2" style="text-align:center"><font size="-3"><i><em><strong>CAUTION: </strong></em> Any person who (1) Falsifies any of the data on this ticket or (2) uses a falsified ticket as true, Knowing it to be false is liable to prosecution. </i></font></td></tr>
<tr><td colspan="2" style="text-align:center"><font size="-3"><i><em><strong>NOTE: </strong></em> Phone: +91-7902796869  Email: netbuseticketing@gmail.com</i></font></td></tr>

<tr><td style="text-align:right">
<img weight="180" height="180" src="$src"></td></tr>
    </table>
EOD;
    // die($html);
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output($file_name, 'D');
    @unlink($src);
}

function generateQR($id, $data)
{
    $imgname = intval($id) . ".png";
    // === Create qrcode image
    include 'phpqrcode/qrlib.php';
    QRcode::png($data, $imgname, QR_ECLEVEL_L, 11.45, false);

    // === Adding image to qrcode
    $QR = imagecreatefrompng($imgname);

    imagefilter($QR, IMG_FILTER_COLORIZE, 41, 255, 111); //     rgb(197, 167, 95) || rgb(27, 78, 25) || rgb(41, 22, 111) || rgb(15, 81, 22)
    imagealphablending($QR, false);

    // === Change image color
    $im = imagecreatefrompng($imgname);
    //This changes the color
    $r = 41;
    $g = 22;
    $b = 111;
    for ($x = 0; $x < imagesx($im); ++$x) {
        for ($y = 0; $y < imagesy($im); ++$y) {
            //imagefilter($im, IMG_FILTER_COLORIZE, 0, 255, 0); //This changes the color
            $index = imagecolorat($im, $x, $y);
            $c = imagecolorsforindex($im, $index);
            if (($c['red'] < 100) && ($c['green'] < 100) && ($c['blue'] < 100)) { // dark colors
                // here we use the new color, but the original alpha channel
                $colorB = imagecolorallocatealpha($im, 0x12, 0x2E, 0x31, $c['alpha']);
                imagesetpixel($im, $x, $y, $colorB);
            }
        }
    }

    imagepng($im, $imgname);
    imagedestroy($im);

    // === Convert Image to base64
    $type = pathinfo($imgname, PATHINFO_EXTENSION);
    $data = file_get_contents($imgname);
    $imgbase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    chmod($imgname, 0777);

    // === Show image
    // $html = <<<EOD
    // <img src="$imgbase64" style="position:relative;display:block;width:200px;height:200px;margin:auto;">
    // EOD;

    // return array($imgname,$imgbase64);
    return $imgname;
}

function sum($id, $type = null)
{
    $conn = connect();
    if ($type == null) {
        $row = $conn->query("SELECT SUM(amount) as amount FROM `payment` INNER JOIN booked ON booked.payment_id = payment.id AND booked.schedule_id = payment.schedule_id WHERE payment.schedule_id = '$id'")->fetch_assoc();
    } else {
        $row = $conn->query("SELECT SUM(amount) as amount FROM `payment` INNER JOIN booked ON booked.payment_id = payment.id AND booked.schedule_id = payment.schedule_id WHERE payment.schedule_id = '$id' AND booked.class = '$type'")->fetch_assoc();
    }
    return $row['amount'] == null ? 0 : $row['amount'];
}





function printReport($id)
{
    ob_start();
    $conn = connect();
    $getCount = (connect()->query("SELECT schedule.date as date, schedule.time as time, schedule.bus_id as bus, schedule.route_id as route, booked.seat as seat, register.fname as fullname, booked.code as code, booked.class as class FROM booked INNER JOIN schedule ON schedule.id = booked.schedule_id INNER JOIN register ON register.loginid = booked.user_id WHERE booked.schedule_id = '$id' ORDER BY class "));

    $output = "<style>
    .a {
        text-align:left;
        width: 10%;
    }
    .b{
        width: 20%
    }.c{
    width:30%;
    }
    table {
        border: 1px solid green;
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;
      }
      
   
          table th.shrink {
        white-space: nowrap
      }
      th{
        font-weight:bolder;

      }
      .shrink {
        white-space: nowrap;
        width: 40%;

      }
      
      table td.expand {
        width: 99%
      }
 
    </style>";
    $sn = 0;
    $schedule = getRouteFromSchedule($id);
    if ($getCount->num_rows < 1) {
        echo "<script>alert('No passenger yet for this schedule!');window.location='admin.php?page=report'</script>";
        exit;
    }
    while ($row = $getCount->fetch_assoc()) {
        $date = $row['date'];
        $time = $row['time'];
        $bus = getTrainName($row['bus']);
        $route = getRouteFromSchedule($id);
        $time = formatTime($time);
        $sn++;
        $output .= '<tr><td class="a">' . $sn . '</td><td class="c">' . substr(ucwords(strtolower($row['fullname'])), 0, 15) . '</td><td class="shrink">' . $row['code'] . ' (' . ucwords(strtolower($row['class'])) . ')</td><td class="b">' . (strtoupper($row['seat'])) . '</td></tr>';
    }
    $start = '<table class="table" width="100%" border="1"><tr><th class="a">SN</th><th  class="c">Full Name</th><th  class="shrink">Code/Class</th><th  class="b">Seat No</th></tr>';
    $end = '</table>';
    $result = $start . $output . $end;
    // die($result);
    $file_name = preg_replace('/[^a-z0-9]+/', '-', strtolower('bus_booking')) . ".pdf";
    require_once 'PDF/tcpdf_config_alt.php';

    // Include the main TCPDF library (search the library on the following directories).
    $tcpdf_include_dirs = array(
        realpath('PDF/tcpdf.php'),
        '/usr/share/php/tcpdf/tcpdf.php',
        '/usr/share/tcpdf/tcpdf.php',
        '/usr/share/php-tcpdf/tcpdf.php',
        '/var/www/tcpdf/tcpdf.php',
        '/var/www/html/tcpdf/tcpdf.php',
        '/usr/local/apache2/htdocs/tcpdf/tcpdf.php',
    );
    foreach ($tcpdf_include_dirs as $tcpdf_include_path) {
        if (@file_exists($tcpdf_include_path)) {
            require_once $tcpdf_include_path;
            break;
        }
    }

    class MYPDF extends TCPDF
    {
        //Page header
        public function Header()
        {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = K_PATH_IMAGES . "watermark.jpg";
            // die($img_file);
            $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            $this->SetAlpha(0.5);

            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor("Admin");
    $pdf->SetTitle("NetBus Bookings " . " Ticket");
    $pdf->SetSubject(SITE_NAME);
    $pdf->SetKeywords("NetBus E-ticketing System, Rail, Rails, Railway, Booking, Project, System, Website, Portal ");


    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, 7, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(true, 5);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once dirname(__FILE__) . '/lang/eng.php';
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 12, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
    // Set some content to print
    $html = '<h5 style="text-align:center"><img src="images/trainlg.png" width="80" height="80"/><br/>NetBus E-ticketing System<br/> LIST OF BOOKINGS  FOR ' . $date . ' (' . $time . ')</h5> <div style="text-align:right; font-family:courier;font-weight:bold"><font size="+1">Bus Name: ' . $bus . ' (' . $sn . ' Passengers) : ' . $schedule . ' </font></div>' . $result;
    // die($html);
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output($file_name, 'D');
    @unlink($src);
}


function sendFeedback($msg)
{
    $me = $_SESSION['id'];
    $email=$_SESSION['email'];
    $msg = connect()->real_escape_string($msg);
    $stmt = connect()->query("INSERT INTO feedback (user_id, message) VALUES ('$email', '$msg')");
    if ($stmt) return 1;
    return 0;
}

function getFeedbacks()
{
    $me = $_SESSION['email'];
    return connect()->query("SELECT * FROM feedback WHERE user_id = '$me'");
}

function replyTo($id, $reply)
{
    $con = connect();
    $reply = $con->real_escape_string($reply);
    $sql = $con->query("UPDATE feedback SET response = '$reply' WHERE id = '$id' ");
    if ($sql) return 1;
    return 0;
}
