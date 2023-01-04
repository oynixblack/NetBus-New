
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
		@font-face {
  font-family: "Poppins-Regular";
  src: url("../fonts/poppins/Poppins-Regular.ttf"); }
@font-face {
  font-family: "Poppins-SemiBold";
  src: url("../fonts/poppins/Poppins-SemiBold.ttf"); }
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

body {
  font-family: "Poppins-Regular";
  color: #333;
  font-size: 13px;
  margin: 0; }

input, textarea, select, button {
  font-family: "Poppins-Regular";
  color: #333;
  font-size: 13px; }

p, h1, h2, h3, h4, h5, h6, ul {
  margin: 0; }

img {
  max-width: 100%; }

ul {
  padding-left: 0;
  margin-bottom: 0; }

a:hover {
  text-decoration: none; }

:focus {
  outline: none; }

.wrapper {
  min-height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
  display: flex;
  align-items: center; }

.inner {
  padding: 20px;
  background: #fff;
  max-width: 850px;
  margin: auto;
  display: flex; }
  .inner .image-holder {
    width: 50%; }
  .inner form {
    width: 50%;
    padding-top: 36px;
    padding-left: 45px;
    padding-right: 45px; }
  .inner h3 {
    text-transform: uppercase;
    font-size: 25px;
    font-family: "Poppins-SemiBold";
    text-align: center;
    margin-bottom: 28px; }

.form-group {
  display: flex; }
  .form-group input {
    width: 50%; }
    .form-group input:first-child {
      margin-right: 25px; }

.form-wrapper {
  position: relative; }
  .form-wrapper i {
    position: absolute;
    bottom: 9px;
    right: 0; }

.form-control {
  border: 1px solid #333;
  border-top: none;
  border-right: none;
  border-left: none;
  display: block;
  width: 100%;
  height: 30px;
  padding: 0;
  margin-bottom: 25px; }
  .form-control::-webkit-input-placeholder {
    font-size: 13px;
    color: #333;
    font-family: "Poppins-Regular"; }
  .form-control::-moz-placeholder {
    font-size: 13px;
    color: #333;
    font-family: "Poppins-Regular"; }
  .form-control:-ms-input-placeholder {
    font-size: 13px;
    color: #333;
    font-family: "Poppins-Regular"; }
  .form-control:-moz-placeholder {
    font-size: 13px;
    color: #333;
    font-family: "Poppins-Regular"; }

select {
  -moz-appearance: none;
  -webkit-appearance: none;
  cursor: pointer;
  padding-left: 20px; }
  select option[value=""][disabled] {
    display: none; }

button {
  border: none;
  width: 164px;
  height: 51px;
  margin: auto;
  margin-top: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  background: #333;
  font-size: 15px;
  color: #fff;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s; 
  }
  button:hover
  {
	  background:#b0b435;
  }
  button i {
    margin-left: 10px;
    -webkit-transform: translateZ(0);
    transform: translateZ(0); }
  button:hover i, button:focus i, button:active i {
    -webkit-animation-name: hvr-icon-wobble-horizontal;
    animation-name: hvr-icon-wobble-horizontal;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1; }

@-webkit-keyframes hvr-icon-wobble-horizontal {
  16.65% {
    -webkit-transform: translateX(6px);
    transform: translateX(6px); }
  33.3% {
    -webkit-transform: translateX(-5px);
    transform: translateX(-5px); }
  49.95% {
    -webkit-transform: translateX(4px);
    transform: translateX(4px); }
  66.6% {
    -webkit-transform: translateX(-2px);
    transform: translateX(-2px); }
  83.25% {
    -webkit-transform: translateX(1px);
    transform: translateX(1px); }
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0); } }
@keyframes hvr-icon-wobble-horizontal {
  16.65% {
    -webkit-transform: translateX(6px);
    transform: translateX(6px); }
  33.3% {
    -webkit-transform: translateX(-5px);
    transform: translateX(-5px); }
  49.95% {
    -webkit-transform: translateX(4px);
    transform: translateX(4px); }
  66.6% {
    -webkit-transform: translateX(-2px);
    transform: translateX(-2px); }
  83.25% {
    -webkit-transform: translateX(1px);
    transform: translateX(1px); }
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0); } }
@media (max-width: 1199px) {
  .wrapper {
    background-position: right center; } }
@media (max-width: 991px) {
  .inner form {
    padding-top: 10px;
    padding-left: 30px;
    padding-right: 30px; } }
@media (max-width: 767px) {
  .inner {
    display: block; }
    .inner .image-holder {
      width: 100%; }
    .inner form {
      width: 100%;
      padding: 40px 0 30px; }

  button {
    margin-top: 60px; } }
	
	.options {
            padding-top: 15px;
            margin: auto;
			center;
        }
		.options a {
            text-decoration: none;
            color: black;
            margin: 0 135px;
            font-size: 18px;

        }
		.options a:hover {
            color:#b0b435;
 
        }

/*# sourceMappingURL=style.css.map */

		</style>
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<!--<link rel="stylesheet" href="css/style.css">-->
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/5.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/6.jpg" alt="">
				</div>
				<form action="regacc.php" method="POST">
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" required onchange="Validate();">
						<span id="msg1" style="color:red;"></span>
						<script>		
function Validate() 
{
    var val = document.getElementById('fname').value;

    if (!val.match(/^[A-Z][A-Za-z]{3,}$/)) 
    {
        document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
		            document.getElementById('fname').value = "";
        return false;
    }
document.getElementById('msg1').innerHTML=" ";
    return true;

}
</script>
						<input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" required onchange="Validate1();">
						<span id="msg2" style="color:red;"></span>
<script>		
function Validate1() 
{
    var val = document.getElementById('lname').value;

    if (!val.match(/^[A-Z][a-z]{0,}$/)) 
    {
        document.getElementById('msg2').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
		            document.getElementById('lname').value = "";
        return false;
    }
document.getElementById('msg2').innerHTML=" ";
    return true;
}
</script>
					</div>



					<div class="form-wrapper">
						<input type="text" name="email" id="email" placeholder="Email Address" class="form-control" required onchange="Validata();">
						<i class="zmdi zmdi-email"></i>
					</div>
					<span id="msg5" style="color:red;"></span>
<script>		
function Validata() 
{
    var val = document.getElementById('email').value;

    if (!val.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) 
    {
        document.getElementById('msg5').innerHTML="Enter a Valid Email";
		
		     document.getElementById('email').value = "";
        return false;
    }
document.getElementById('msg5').innerHTML=" ";
    return true;
}

		</script>

    
					<div class="form-wrapper">
						<input type="text" name="adress" id="adress" placeholder="Address" class="form-control" required onchange="Validname();">
						<i class="zmdi zmdi-home"></i>
					</div>
					<span id="msg3" style="color:red;"></span>
<script>		
function Validname() 
{
    var val = document.getElementById('adress').value;

    if (!val.match(/^[a-z" "]{3,}$/)) 
    {
        document.getElementById('msg3').innerHTML="Only alphabets are allowed";
		            document.getElementById('adress').value = "";
        return false;
    }
document.getElementById('msg3').innerHTML=" ";
    return true;
}
</script>
					<div class="form-wrapper">
						<input type="number" name="phone"  maxlength="10" id="phone" placeholder="Phone Number" class="form-control" required onchange="Validat();">
						<i class="zmdi zmdi-phone"></i>
					</div>
					<span id="msg4" style="color:red;"></span>
			
<script>
function Validat() 
{
    var val = document.getElementById('phone').value;

    if (!val.match(/^[789][0-9]{9}$/))
    {
        document.getElementById('msg4').innerHTML="Only Numbers are allowed and must contain 10 number";
	
		
		            document.getElementById('phone').value = "";
        return false;
    }
document.getElementById('msg4').innerHTML=" ";
    return true;
}

</script>

					<div class="form-wrapper">
						<select name="gender" id="gender" class="form-control" required>
							<option value="" disabled selected>Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<!--<div class="form-wrapper">
						<input type="text" name="uname" id="uname"placeholder="Username" class="form-control" required onchange="Validatun();">
						<i class="zmdi zmdi-account"></i>
					</div>
					<span id="msg8" style="color:red;"></span>
<script>		
function Validatun() 
{
    var val = document.getElementById('uname').value;

    if (!val.match(/^[A-Za-z]+$/)) 
    {
        document.getElementById('msg8').innerHTML="User name field required only alphabet characters";
		
		     document.getElementById('uname').value = "";
        return false;
    }
document.getElementById('msg8').innerHTML=" ";
    return true;
}

</script>-->
					<div class="form-wrapper">
						<input type="password" name="password" id="password" placeholder="Password" class="form-control" required onchange="Validp();">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<span id="msg6" style="color:red;"></span>
<script>		
function Validp() 
{
    var val = document.getElementById('password').value;

    if (!val.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/)) 
    {
        document.getElementById('msg6').innerHTML="Upper case, Lower case, Special character and Numeric number are required in Password filed";
		
		     document.getElementById('password').value = "";
        return false;
    }
document.getElementById('msg6').innerHTML=" ";
    return true;
}

</script>
					<div class="form-wrapper">
						<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" required onchange="check();">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<span id="msg7" style="color:red;"></span>
<script>
function check()
{
var pas1=document.getElementById("password");
							  var pas2=document.getElementById("confirm_password");
							
							  if(pas1.value=="")
	{
		document.getElementById('msg7').innerHTML="Password can't be null!!";
		pas1.focus();
		return false;
	}
	if(pas2.value=="")
	{
		document.getElementById('msg7').innerHTML="Please confirm password!!";
		pas2.focus();
		return false;
	}
	if(pas1.value!=pas2.value)
	{
		document.getElementById('msg7').innerHTML="Passwords does not match!!";
		pas1.focus();
		return false;
	}
     document.getElementById('msg7').innerHTML=" "; 
	return true;
	
}
	</script>
					<button><i class="zmdi zmdi-arrow-right"></i>Register</button>

          
					<div class="options">
           


					<a href="login.php">Login </a>
          <a href="index.php">Home</a>
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>