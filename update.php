<?php 
    require_once('function.php');
    session_start();
    $update = new DB_CON();
    
    if(isset($_POST['updateSubmit'])) {
        $userID = $_GET['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phonenumber = $_POST['phonenumber'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $role = $_POST['role'];

        $update->update($userID,$username,$email,$password,$phonenumber,$fname,$lname,$role);
        if($update) {
            echo "<script>alert('Update Success');</script>";
            header('location: adminpage.php');
        }else {
            echo "<script>alert('Update Error');</script>";
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
    <title>Update Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $userID = $_GET['id'];
        $conn = new DB_CON();
        $fetch = $conn->fetchOneRecord($userID);
        while($row = mysqli_fetch_array($fetch)){ ?>
            <div class="container">
                <form action="" method="post">
                    <div>
                        <h1>Update Data</h1>
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo $row['username'];?>">
                    </div>
                    <div>
                        <label for="username">Email</label>
                        <input type="text" name="email" value="<?php echo $row['email'];?>">
                    </div>
                    <div>
                        <label for="username">Password</label>
                        <input type="text" name="password" value="<?php echo $row['password'];?>">
                    </div>
                    <div>
                        <label for="username">Phone Number</label>
                        <input type="text" name="phonenumber" value="<?php echo $row['phonenumber'];?>">
                    </div>
                    <div>
                        <label for="username">First Name</label>
                        <input type="text" name="firstname" value="<?php echo $row['fname'];?>">
                    </div>
                    <div>
                        <label for="username">Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $row['lname'];?>">
                    </div>
                    <div>
                        <label for="role" class="clear" id="radioInput">Admin</label>
                        <input type="radio" name="role" class="clear" id="radioInput" value="A" <?php if($row['role']=='A') {?>checked <?php }?>>&emsp;
                        <label for="role" class="clear" id="radioInput">User</label>
                        <input type="radio" name="role" class="clear" id="radioInput" value="U" <?php if($row['role']=='U') {?>checked <?php }?>>
                    </div><br>
                    <div>
                        <button type="submit" name="updateSubmit" class="submitBTN">Submit</button>
                        <button type="submit" name="cancelSubmit" class="cancelBTN">Cancle</button>
                    </div>
                </form>
            </div>
            
      <?php  } ?>
        
    
    
</body>
</html>