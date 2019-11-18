<?php
session_start();
session_unset();

session_destroy();// Destroying All Sessions 

header("Location: main.html"); // Redirecting To Home Page

?>