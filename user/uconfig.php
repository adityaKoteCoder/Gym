<?php
session_start();
$name=$_SESSION['name'];
$uname=$_SESSION['uname'];
$dob=$_SESSION['dob'];
$gen=$_SESSION['gen'];
$pno=$_SESSION['pno'];
$email=$_SESSION['email'];
$pword=$_SESSION['pword'];
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gym');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>