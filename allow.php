<?php 
    require_once('function.php');
    $data = $_GET['username'];
    $conn = new DB_CON();

    $conn->allow($data);
    header("location: approvepage.php")
?>