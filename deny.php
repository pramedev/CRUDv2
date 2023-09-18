<?php 
    require_once('function.php');

    if(isset($_GET['username'])) {
        $data = $_GET['username'];
        $conn = new DB_CON;

        $conn->deny($data);
        header("location: approvepage.php");
    }
?>