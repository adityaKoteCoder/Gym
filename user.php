<?php
session_start();
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// die();
$_SESSION["name"]=$_GET["name"];
$_SESSION["uname"]=$_GET['uname'];
$_SESSION["dob"]=$_GET['dob'];
$_SESSION["gen"]=$_GET['gen'];
$_SESSION["pno"]=$_GET['pno'];
$_SESSION['email']=$_GET['email'];
$_SESSION["pword"]=$_GET['pword'];


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
<link rel="stylesheet" href="css/main.css">

<body class="ad">
    <div>
        <div class="">
        <form action="logout.php" method="POST">
            <button type="submit" name="logout">LOGOUT</button>
        </form>
            <center>
                    <div class="button1">
                        <a href="user/u_index.php" class="btn">Personal DETAILS</a>
                        <a href="show_offer.php" class="btn">Offers</a>
                    </div>
            </center>
        </div>
    </div>
    <footer class="footer">
              copyrights &copy; @LEHKO GYM 2019.
     </footer>

     
</body>
</html>