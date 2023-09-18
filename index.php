<?php 
    require('function.php');
    session_start();

    if(isset($_POST['logout'])) {
        session_unset();
    }

    if(isset($_POST['register'])) {
        header("location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDv2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li style="display: inline;"><a href="index.php"><button class="nav-btn">Home</button></a></li>
                <li style="display: inline;"><a href="login.php"><button class="nav-btn" <?php if(isset($_SESSION['role'])) {?> style="display:none"; <?php } ?>>Login</button></a></li>
                <li style="display: inline;"><a href="register.php"><form action="" method="post" class="clear"><button class="nav-btn" name="register" <?php if(isset($_SESSION['role'])) {?> style="display:none"; <?php } ?>>Register</button></form></a></li>
                <li style="display: inline;"><a href="index.php"><form action="" method="post" class="clear"><button class="nav-btn" name="logout" <?php if(isset($_SESSION['role']) == null) {?> style="display:none"; <?php } ?>>LogOut</button></form></a></li>
                <?php if(isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    if($role == "A") {?>
                        <li style="display: inline;"><a href="adminpage.php"><button class="nav-btn">AdminPage</button></a></li> 
                        <li style="display: inline;"><a href="approvepage.php"><button class="nav-btn">ApprovePage</button></a></li> <?php
                    }
                }?>
            </ul>
        </nav>
        <h1>CRUDv2</h1>
        <?php if(isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    if($role == "A") {?>
                        <p>Welcome, Admin</p> <?php
                    }
        }?>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem deleniti veritatis eaque voluptatum similique architecto, hic quidem quia laudantium possimus saepe vitae culpa nesciunt accusantium rerum incidunt, vero nostrum ipsum labore eligendi quaerat nam? Fugit voluptates maxime distinctio? Iure ea fuga pariatur ut atque rem unde? Placeat ad iure harum.</p>
    </div>
</body>
</html>