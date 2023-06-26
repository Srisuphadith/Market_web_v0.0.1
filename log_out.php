<?php
session_start();
session_destroy();
#destroy session and redirect to main pages
header("location:index.php");
?>