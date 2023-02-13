<?php
$dbhost = "localhost";
$dbuser="root";
$dbpass="";
$dbname = "job1";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    echo "Database connection faild...";
}
?>