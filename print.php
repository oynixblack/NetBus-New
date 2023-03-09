<?php require 'functions.php';
$file_access = 1;
?>
<?php 

$student = $_SESSION['id'];
echo printClearance($student);
?>
