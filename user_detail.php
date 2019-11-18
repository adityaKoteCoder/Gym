<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="user_details";

$conn = mysqli_connect("$servername","$username","$password","$dbname");
   
$uname = $_GET['uname'];

$name=$_POST['name'];
$uname=$_POST['uname'];
$dob=$_POST['dob'];
$gen=$_POST['gen'];
$pno=$_POST['pno'];
$pword=$_POST['pword'];


$sql = "SELECT * FROM user_details where uname = '$uname'";
mysqli_select_db($conn,$dbname);
$retval = mysqli_query($conn, $sql );
$row = mysqli_fetch_array($retval);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/table.css">
    <title>Admin</title>
</head>
<link rel="stylesheet" href="css/style.css">
<body class="wrapper">
    <div>
        <div class="login_box">
            <center>
            <table class="boxer">
                <tr>
                    <th>First Name</th><th>Last Name</th><th>Date of birth</th><th>Gender</th><th>Phone No</th><th>email</th><th>password</th>
                </tr>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['uname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['gen']; ?></td>
                    <td><?php echo $row['pno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pword']; ?></td>
                </tr>
            </table>
            </center>
        </div>
    </div>
    <footer class="footer">
              copyrights &copy; @LEHKO GYM 2019.
     </footer>

    
</body>
</html>