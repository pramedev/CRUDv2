<?php 

    include('functions.php');
    session_start();
    $insertdata = new DB_con();
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        $phonenumber = $_POST['phonenumber'];

        $sql = $insertdata->registration($username, $email, $password, $confpassword, $phonenumber);
        echo "<script>window.location.href='login.php'</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Register</title>
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

<!------------------------------------------------------- FORM ------------------------------------------------------->

    <div class="container" style="max-width: 30%;">
        <h1 class="mt-5" style="text-align: center;">Register</h1>
        <hr>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confpassword">Confirm Password</label>
                <input type="text" name="confpassword" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phonenumber">Phone number</label>
                <input type="text" name="phonenumber" class="form-control" required>
            </div>
            <div class="d-grip">
                <button type="submit" name="register" class="btn btn-block btn-success">Register</button>
            </div><br>
            <h6>Already have an account? <a href="login.php">Login</a></h6>
        </form>
    </div>
<!------------------------------------------------------- END FORM ------------------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>