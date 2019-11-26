<?php 
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="user_details";


$conn=mysqli_connect("$servername","$username","$password","$dbname")or die(Mysqli_error());

$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));

$sql="SELECT * FROM $tbl_name";

$result=mysqli_query($conn,$sql)or die(mysqli_error($connection));


    $name=$_POST['name'];
    $uname=$_POST['uname'];
    $dob=$_POST['dob'];
    $gen=$_POST['gen'];
    $pno=$_POST['pno'];
    $email=$_POST['email'];
    $pword=$_POST['pword'];


$query="INSERT INTO user_details VALUES ('$name','$uname','$dob','$gen','$pno','$email','$pword')";

mysqli_query($conn,$query)or die(mysqli_error($conn));
    echo"<script>alert:Success;</script>";

#}
Mysqli_close($conn);
?>