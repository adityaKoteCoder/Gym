<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="contact";

$conn=mysqli_connect("$servername","$username","$password","$dbname")or die(Mysqli_error());

$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));

$sql="SELECT * FROM $tbl_name";

$result=mysqli_query($conn,$sql)or die(mysqli_error($connection));

#if(isset($_POST['submit'])&&($_POST['username'])&&($_POST['password'])&&($_POST['emial']))
#{

$name=$_POST['name'];
$email=$_POST['email'];
$pno=$_POST['pno'];
$info=$_POST['info'];

// $cq=mysqli_query($conn)or die(mysqli_error($conn));
// $ret=mysqli_num_rows($cq);

$query="INSERT INTO contact VALUES ('$name','$email','$pno','$info')";

mysqli_query($conn,$query)or die(mysqli_error($conn));
    echo"<script>alert('Success')</script>";

#}
Mysqli_close($conn);
?>