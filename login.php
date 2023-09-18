<?php 
    require('function.php');
    session_start();
    $conn = new DB_CON();
    
    if(isset($_POST['loginSubmit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn->login($username, $password);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li style="display: inline;"><a href="index.php"><button class="nav-btn" >Home</button></a></li>
            <li style="display: inline;"><a href="login.php"><button class="nav-btn" >Login</button></a></li>
            <li style="display: inline;"><a href="register.php"><button class="nav-btn">Register</button></a></li>
        </ul>
    </nav>
    <div class="container">
        <form action="" method="POST">
            <h1 style="text-align: center;">Log In</h1><br>
            <div>
                <label for="username">Username &nbsp;</label>
                <input type="text" name="username" require>
            </div>
            <div>
                <label for="password">Password &nbsp;</label>
                <input type="password" name="password" require>
            </div><br>
            <div>
                <button type="submit" name="loginSubmit" class="submitBTN">SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>