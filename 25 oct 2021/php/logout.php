<?php
session_start();
$_SESSION['status']=false;

header("location:../login.html");
?>