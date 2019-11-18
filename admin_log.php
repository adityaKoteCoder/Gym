<?php
 session_start();
    $email = $_GET["email"];
    $pword = $_GET["pword"];
    if($email == "lehko@gmail.com" && $pword == "success")
    {
        header ("location:admin.html");
    }

?>
