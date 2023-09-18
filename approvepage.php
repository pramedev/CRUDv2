<?php 
    require_once('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ApprovePage</title>
</head>
<body>
    <div class="container">
    <nav>
        <ul>
            <li style="display: inline;"><a href="index.php"><button class="nav-btn">Home</button></a></li>
            <li style="display: inline;"><a href="index.php"><form action="" method="post" class="clear"><button class="nav-btn" name="logout" <?php if(isset($_SESSION['role']) == null) {?> style="display:none"; <?php } ?>>LogOut</button></form></a></li>
            <li style="display: inline;"><a href="adminpage.php"><button class="nav-btn">AdminPage</button></a></li>
            <li style="display: inline;"><a href="approvepage.php"><button class="nav-btn">ApprovePage</button></a></li>
        </ul>
    </nav>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phonenumber</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Role</th>
                    <th>TimeStamp</th>
                    <th>Approve</th>
                    <th>Disapprove</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                     $conn = new DB_CON;
                     $data = $conn->fetchApprove();
                     $datarow = mysqli_num_rows($data);
                     if ($datarow > 0) {
                        while($row = $data->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['phonenumber']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                            <td><a href="allow.php?username=<?php echo $row['username']; ?>"><button type="submit" class="update-btn">Allow</button></a></td>
                            <td><a href="deny.php?username=<?php echo $row['username']; ?>"><button type="submit" class="delete-btn">Deny</button></a></td>
                        </tr>
                        <?php }
                     }
                ?>
            </tbody>
        </table>
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