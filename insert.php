<?php 
    require('function.php');
    if(isset($_POST['submit'])) {
        $insertData = new DB_CON();

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phonenumber = $_POST['phonenumber'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $role = $_POST['role'];

        $insertData->insert($username, $email, $password, $phonenumber, $fname, $lname, $role);

        if($insertData) {
            echo "<script>alert('Insert Success');</script>";
            header('location: adminpage.php');
        }
    }

    if(isset($_POST['cancelSubmit'])) {
        header('location: adminpage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Insert Page</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1 style="text-align: center;">Insert</h1>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label for="username">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name="password">
            </div>
            <div>
                <label for="phonenumber">Phonenumber</label>
                <input type="text" name="phonenumber">
            </div>
            <div>
                <label for="fname">Firstname</label>
                <input type="text" name="fname">
            </div>
            <div>
                <label for="lname">LastName</label>
                <input type="text" name="lname">
            </div>
            <div>
                <label for="role" class="clear">Admin</label>
                <input type="radio" name="role" class="clear" id="radioInput" value="A">&emsp;
                <label for="role" class="clear">User</label>
                <input type="radio" name="role" class="clear" id="radioInput" value="U">
            </div><br>
            <div>
                <button type="submit" name="updateSubmit" class="submitBTN">Submit</button>
                <button type="submit" name="cancelSubmit" class="cancelBTN">Cancle</button>
            </div>
        </form>
    </div>
</body>
</html>