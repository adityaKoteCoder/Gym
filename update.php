<?php

session_start();
    //check to see whether the user is logged in or not
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname="gym";
$tbl_name="client_login";
   
   $conn = mysqli_connect("$servername","$username","$password","$dbname");
  

   $fname=$_POST['name'];
   $lname=$_POST['uname'];
   $dob=$_POST['dob'];
   $gen=$_POST['gen'];
   $pno=$_POST['pno'];
   $email=$_POST['email'];
   $pword=$_POST['pword'];

$sql = "UPDATE client_login SET name='$name',uname='$uname',dob='$dob',gen='$gen',pword=$pword  WHERE email=$email && pword=$pword";
   mysqli_select_db($conn,$dbname);
   $retval = mysqli_query($conn, $sql );
   
if($retval) {
         header("location: update.php");
      }else {
         die('failed to update: ' . mysqli_error());
      }
   mysqli_close($conn);
?>
