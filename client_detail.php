<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="user_details";

$conn = mysqli_connect("$servername","$username","$password","$dbname");

// $result = $conn->query($sql);


$sql = "SELECT * FROM user_details";
$result = $conn->query($sql);
// mysqli_select_db($conn,$dbname);
// $retval = mysqli_query($conn, $sql );
// $row = mysqli_fetch_row_assoc($retval);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<link rel="stylesheet" href="css/style.css">
<body class="wrapper">
<h1 style="color:white;"><center>Client Details</h1>
<div>
    <div class="login_box">
        <table class=boxer>
            <tr>
                <th>Name</th><th>uname</th><th>dob</th><th>Gender</th><th>Phone No</th><th>email</th><th>Password</th>
            </tr>
            <?php if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['uname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['gen']; ?></td>
                    <td><?php echo $row['pno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pword']; ?></td>
            </tr>
            <?php 
                }
            }
            ?>
            </table>
        </div>
    </div>
    
</body>
<!-- <footer class="footer">
<center><h3>Copyrights &copy @LehkoGym</h3>
</footer> -->
</html>