<?php 
    include_once('functions.php');
    session_start();
    $updatedata = new DB_con();

    if (isset($_POST['update'])) {
        $userid = $_GET['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['checker'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];

        $sql = $updatedata->update($userid, $username, $email, $password, $role, $phonenumber, $address);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='adminpage.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }

    if (isset($_POST['cancle'])) {
      echo "<script>window.location.href='adminpage.php'</script>";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

<!------------------------------------------------------- NAV BAR ------------------------------------------------------->
<?php if (!isset($_SESSION['username'])): ?> <!-- IF NOT LOGIN -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="login.php">Login</a>
        <a class="nav-link" href="register.php">Register</a>
      </div>
    </div>
  </div>
</nav>
<?php endif ?>
<?php if (isset($_SESSION['username'])): ?> <!-- IF LOGGED IN -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="register.php">Register</a>
        <a class="nav-link" href="login.php">Login</a>
      </div>
    </div>
  </div>
</nav>
<?php endif ?>
<!------------------------------------------------------- END OF NAV BAR ------------------------------------------------------->

    <div class="container" style="max-width: 30%;">
        <h1 class="mt-5" style="text-align: center;">Update Page</h1>
        <hr>
        <?php 

            $userid = $_GET['id'];
            $updateuser = new DB_con();
            $sql = $updateuser->fetchonerecord($userid);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" 
                    value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" 
                    value="<?php echo $row['password']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phonenumber">Phone Number</label>
                <input type="text" class="form-control" name="phonenumber"
                    value="<?php echo $row['phonenumber']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <textarea name="address"cols="30" rows="5" class="form-control" required><?php echo $row['address']; ?></textarea>
            </div>
            <?php if ($_SESSION['role'] === 'A') : ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="checker" id="adminradio" value="A" checked>
                <label class="form-check-label" for="adminradio">Admin</label><br>
                <input class="form-check-input" type="radio" name="checker" id="memberradio" value="M" >
                <label class="form-check-label" for="memberradio">Member</label>
            </div>
            <?php endif ?>
            <?php if ($_SESSION['role'] === 'M') : ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="checker" id="adminradio" value="A" >
                <label class="form-check-label" for="adminradio">Admin</label><br>
                <input class="form-check-input" type="radio" name=" checker" id="memberradio" value="M" checked>
                <label class="form-check-label" for="memberradio">Member</label>
            </div>
            <?php endif ?><br><br>
            <div class="md-5 d-grip">
            <?php } ?>
            <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
            <button type="submit" name="cancle" class="btn btn-danger btn-block">Cancle</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>