<?php 
    include('function.php');

    $del = $_GET['del'];

    if(isset($del)) {
        $deletedata = new DB_CON();
        $userID = $_GET['del'];
        $deletedata->delete($userID);

        if($deletedata) {
            echo "Deleted ID :" . $userID;
            header('location: adminpage.php');
        }
    }

?>