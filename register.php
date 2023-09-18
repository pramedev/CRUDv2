<?php 
    include('function.php');
    session_start();
    $conn = new DB_CON();

    if(isset($_POST['regSubmit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        $phonenumber = $_POST['phonenumber'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        
        if($password == $confpassword) {
            $conn->register($username, $email, $password, $phonenumber, $fname, $lname);
            echo "<script>alert('Register Successful');</script>";
            header('location: index.php');
        }
        else {
            echo "<script>alert('Password don't match');</script>";
            exit();
            header('location: register.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <form action="" method="post">
            <h1>Register</h1>
            <div>
                <label for="username">Username</label>
                <input type="username" name="username" require>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" require>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" require>
            </div>
            <div>
                <label for="confpassword">Confirm Password</label>
                <input type="password" name="confpassword" require>
            </div>
            <div>
                <label for="phonenumber">Phone Number</label>
                <input type="number" name="phonenumber" require>
            </div>
            <div>
                <label for="fname">FirstName</label>
                <input type="text" name="fname" require>
            </div>
            <div>
                <label for="lname">LastName</label>
                <input type="text" name="lname" require>
            </div>
            <div>
                <button type="submit" name="regSubmit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>