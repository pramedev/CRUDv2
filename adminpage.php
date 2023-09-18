<?php 
    require('function.php');
    session_start();
    $conn = new DB_CON;
    $fetcheddata = $conn->fetchdata();

    if(isset($_SESSION['role']) == 'A') {

    }else {
        header('location: index.php');
    }

    if(isset($_POST['update'])) {
        $_SESSION['role'] = $fetcheddata['role'];
    }

    
    if(isset($_POST['logout'])) {
        session_destroy();
        session_unset();
        header('location: index.php');
        echo "<script>alert('Logged Out');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>Welcome,<?php echo $_SESSION['username']; ?> </p>
        <div class="container">
            <nav>
                <ul>
                    <li style="display: inline;"><a href="index.php"><button class="nav-btn">Home</button></a></li>
                    <li style="display: inline;"><a href="index.php"><form action="" method="post" class="clear"><button class="nav-btn" name="logout" <?php if(isset($_SESSION['role']) == null) {?> style="display:none"; <?php } ?>>LogOut</button></form></a></li>
                    <li style="display: inline;"><a href="adminpage.php"><button class="nav-btn">AdminPage</button></a></li>
                    <li style="display: inline;"><a href="approvepage.php"><button class="nav-btn">ApprovePage</button></a></li>
                </ul>
            </nav>

            <div class="table">
                <h1 style="text-align: center;">ตารางข้อมูลผู้ใช้</h1>
                <table class="table">
                    <tr>
                        <th>userID</th>
                        <th>username</th>
                        <th>email</th>
                        <th>password</th>
                        <th>phonenumber</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>role</th>
                        <th>timestamp</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <?php 
                            $data = mysqli_query($conn->dbcon, "SELECT * FROM usersTBL");
                            $fetcheddata = $conn->fetchdata();
                            $datarow = mysqli_num_rows($data);

                            if($fetcheddata['role'] == 'A') {  
                                $_SESSION['role'] = "A";
                            } 

                            if($datarow > 0) {
                                while ($row = $data->fetch_assoc()) { ?>
                                    <tr>
                                        <td id="userID"><?php echo $row["userID"] ?></td>
                                        <td><?php echo $row["username"]?></td>
                                        <td><?php echo $row["email"]?></td>
                                        <td><?php echo $row["password"]?></td>
                                        <td><?php echo $row["phonenumber"]?></td>
                                        <td><?php echo $row["fname"]?></td>
                                        <td><?php echo $row["lname"]?></td>
                                        <td><?php if($row['role'] == 'A') { echo "Admin";} elseif($row['role'] == 'U') { echo "User";}?></td>
                                        <td><?php echo $row["timestamp"]?></td>
                                        <td><a href="update.php?id=<?php echo $row['userID']; ?>"><button class="update-btn" name="update">Update</button></a></td>
                                        <td><a href="delete.php?del=<?php echo $row['userID']; ?>"><button class="delete-btn" name="update">Delete</button></a></td>


                                    </tr><?php
                                }
                            } 
                        ?>
                    </tr>
                </table>
            </div>
            <div class="btn">
                <a href="insert.php"><button class="insert-btn" name="insert">Insert</button></a>
            </div>

        </div>
</body>

<style>
    .table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
    }
    
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        font-size: large;
        padding: 8px;
    }

    

    .update-btn {
        width: 100%;
        padding: 10px;
        background-color: #00b60f;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
    }.update-btn:hover {
        background-color: #019b06;
    }

    .delete-btn {
        width: 100%;
        padding: 10px;
        background-color: #dc0909;
        text-align: center;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }.delete-btn:hover {
        background-color: #720303;
    }

    .insert-btn {
        width: 150px;
        margin: 0 auto;
        margin-top: 10px;
        padding: 10px;
        background-color: #0055ff;
        text-align: center;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }.insert-btn:hover {
        background-color: #0768f0;
    }

    .btn {
        margin: 0 auto;
        text-align: center;
    }

    #userID {
        text-align: center;
    }

</style>
</html>