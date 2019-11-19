<?php 
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="offer";


$conn=mysqli_connect("$servername","$username","$password","$dbname")or die(Mysqli_error());

$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));

$sql="SELECT * FROM $tbl_name";

$result=mysqli_query($conn,$sql)or die(mysqli_error($connection));



    $name=$_POST['name'];
    //$id=$_POST['id'];
    $price=$_POST['price'];
    $dur=$_POST['dur'];
    $img=$_POST['img'];

    $query="INSERT INTO offer (name, price, dur, img) VALUES ('$name','$price','$dur','$img')";

$result=mysqli_query($conn,$sql)or die(mysqli_error($connection));
// INSERTION
mysqli_query($conn,$query)or die(mysqli_error($conn));
    // <script>
    // alert="Offer added successfully"
    // </script>
?>

<!-- #}
Mysqli_close($conn);
?> -->

