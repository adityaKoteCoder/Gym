<?php
session_start();
$name=$_SESSION['name'];
$uname=$_SESSION['uname'];
$dob=$_SESSION['dob'];
$gen=$_SESSION['gen'];
$pno=$_SESSION['pno'];
$email=$_SESSION['email'];
$pword=$_SESSION['pword'];

$servername="localhost";
$username="root";
$password="";
$dbname="gym";
$tbl_name="user_details";

$conn = mysqli_connect("$servername","$username","$password","$dbname");




$sql = "SELECT * FROM user_details where  uname= '$uname'";
mysqli_select_db($conn,$dbname);
$retval = mysqli_query($conn, $sql );
// $row = mysqli_fetch_array($retval);

// UPDATE
$sql = "UPDATE offer SET name='$name',id='$id',cost='$cost' ,dur='$dur',img='$img' WHERE id=$id";
mysqli_select_db($conn,$db);
$retval1 = mysqli_query($conn, $sql );

if($retval1) {
    header("location:membership.php");
 }else {
    echo "<script> alert:Update failed!</script>";
 }
mysqli_close($conn);

// DELETION
$id = $_GET['id'];

   
    $sql = "DELETE FROM offer where id = '$id'";
   mysqli_select_db($conn,$dbname);
   $retval2 = mysqli_query($conn, $sql );
   
if($retval2) {
        echo "<script> alert:Deletion Successful!</script>";
      }else {
        echo "<script> alert:Deletion failed!</script>";
      }
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
<body class="ad">
    <div>
        <div class="login_box">
            <center>
            <table class=boxer>
                <tr>
                    <th>Name</th><th>User name</th><th>dob</th><th>Gender</th><th>Phone No</th><th>email</th><th>Password</th>
                </tr>
                <tr>
                    <td><?php echo "$name" ?></td>
                    <td><?php echo "$uname" ?></td>
                    <td><?php echo "$dob" ?></td>
                    <td><?php echo "$gen" ?></td>
                    <td><?php echo "$pno" ?></td>
                    <td><?php echo "$email" ?></td>
                    <td><?php echo "$pword" ?></td>
                </tr>
                <tr> <input type="submit" name="update" value="update">
                     <input type="submit" name="delete" value="delete">
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

