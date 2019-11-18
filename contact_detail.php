<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="contact";

$conn = mysqli_connect("$servername","$username","$password","$dbname");

// $result = $conn->query($sql);


$sql = "SELECT * FROM contact";
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
<h1>Contact Details</h1>
<div>
    <div class="login_box">
        <table class=boxer>
            <tr>
                <th>Name</th><th>Phone No</th><th>email</th><th>Information</th>
            </tr>
            <?php if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["pno"] ?></td>
                    <td><?php echo $row["info"] ?></td>
            </tr> 
            <?php 
                }
            } 
            ?>
            </table>
        </div>
    </div>
    <footer class="footer">
        copyrights &copy; @LEHKO GYM 2019.
    </footer>
</body>
</html>

    
</body>
</html>