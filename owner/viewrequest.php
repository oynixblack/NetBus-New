
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>NetBus E-ticketing</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="apple-touch-icon" href="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    tr,th,td
{
    padding-left:30px;
    padding-right:40px;
    padding-top:30px;
    padding-bottom;30px;
}
</style>
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
                <p class="contact-action"><i class=""></i><b><h3>WELCOME BACK</h3></b></strong></p>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Bus Detals</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="addbus.php">BUs</a>
								<a class="dropdown-item" href="viewbusstatus.php">View Bus Status</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="viewrequest.php">Booking Request</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
						<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
						
					<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">My Bookings</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="">View
					Booked Tickets</a>
								<a class="dropdown-item" href="">View BookingStatus</a>
								
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">My Account</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="userprofile.php">Profile</a>
								<a class="dropdown-item" href="change-password.php">Change Password</a>
								<a class="dropdown-item" href="../logout.php">Logout</a>
							</div>
						</li> -->
						
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>REQUEST DEtAIlS</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2></h2>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form>
							
							<table border="2">
                                <tr>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>Booking Date</th>
                                    <th>No of Seats</th>
									<th>From</th>
									<th>To</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
</tr>
<?php
include 'connection.php';

    $sq=mysqli_query($conn,"select * from book");
    while($row1=mysqli_fetch_array($sq))
    {
        ?>
        <tr>
            <td><?php echo $row1['name'];?></td>
            <td><?php echo $row1['phone'];?></td>
            <td><?php echo $row1['dte'];?></td>
            <td><?php echo $row1['nseat'];?></td>
			<td><?php echo $row1['frm'];?></td>
			<td><?php echo $row1['tdetails'];?></td>
            <td><?php echo $row1['status'];?></td>
            <?php
            if($row1['status']=="pending")
            {
                ?>
            <td><a href="approve.php?id=<?php echo $row1['bkid'];?>" style="color:green;">Approve</a></td>
            <td><a href="rejects.php?id=<?php echo $row1['bkid'];?>" style="'color:red;">Reject</a></td>
            <?php
            }
            ?>
    </tr>
            <?php
    }

?>
     </table>
</form>
</div>                           
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>.</p>
				</div>
				<footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h2><strong>SMOOTHER LOCAL BUS BOOKING</strong></h2>
							<p class="black">Checkout available seats, route information, fare information on real time
                                basis with NetBus E-ticketing Platform.</p>
						</div>
					</div>
					
					
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h2><strong>About NetBus E-ticketing</strong></h2>
                            <p>Our mission is to help people book Rural Bus tickets from anywhere using the robust ticketing platform exclusively built to provide the passengers with pleasant ticketing experience						
							</p>
                        </div>
                    </div>
                    
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h2><strong>Contact Us</strong></h2>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address:Netbus E-ticketing Pvt.Lmt <br> Pathanamthitta ,Kerala </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+91-7902796869">+91-7902796869</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:netbuseticketing@gmail.com">netbuseticketing@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">NetBus E-ticketing</p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
