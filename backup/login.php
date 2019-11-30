<?php

    $email = $_GET["email"];
    $pword = $_GET["pword"];
    if($email == "lehko@gmail.com" && $pword == "success")
    {
        header ("location:admin.html");
    }
    else
    {   
    echo  "<script>alert('Invalid Input');location.href='main.html'</script>";
    }

$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="user_details";

$conn = new mysqli("$servername","$username","$password","$dbname")or die("cannot connect");

$email=$_GET['email'];
$pword=$_GET['pword'];


$sql= "SELECT * from user_details where email='$email' and pword='$pword'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$cnt=mysqli_fetch_row($result);

$uname = $cnt[1];
//die($uname);

// $uname = $cnt['uname'];
// echo "<script>alert($uname);</script>"

if($cnt == true)
    {
        header("location:user.php?uname=$uname&name=$name&dob=$dob&gen=$gen&pno=$pno&email=$email&pword=$pword");
    }
else
    {   
    echo  "<script>alert('Invalid Input');location.href='main.html'</script>";
    }
    
    ob_end_flush();
?>






