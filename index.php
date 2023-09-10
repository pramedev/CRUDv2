<?php

  include('functions.php');
  session_start();

  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
    header('location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <title>Home</title>
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
  <div class="container">
    <h1 class="mt-5">Home</h1>

    <?php 
      if (isset($_SESSION['username'])): // CHECK IF LOGGED IN
        $data = new DB_con();
        $username = $_SESSION['username'];
        $result = $data->checkrole($username);
        $role = mysqli_fetch_array($result);

          if ($_SESSION['role'] == 'A'): ?> <!-- ADMIN -->
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> Status : <strong>Admin</strong></p>
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <a href="adminpage.php" class="btn btn-primary">Admin Page</a>
          <?php endif ;
          if ($_SESSION['role'] == 'M'): ?> <!-- MEMBER -->
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> Status : <strong>Member</strong></p>
            <a href="logout.php" class="btn btn-danger">Logout</a>
          <?php endif ; ?>

      <?php else : // IF NOT LOGIN ?>
        <a href="login.php" class="btn btn-success">Login</a>
        <a href="register.php" class="btn btn-primary">Register</a>
      <?php endif ?>
    

    <hr>
  </div>
 
  <div class="container">
    <div class="card-group">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <img src="product.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iusto quo exercitationem inventore? Ad id eligendi obcaecati quis, magnam explicabo?</p>
              <center>
                <a href="buy.php" class="btn btn-success">Buy</a>
                <a href="addtocart.php" class="btn btn-info" me>Add to cart</a>
              </center>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="product.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iusto quo exercitationem inventore? Ad id eligendi obcaecati quis, magnam explicabo?</p>
              <center>
                <button class="btn btn-success">Buy</button>
                <button class="btn btn-info">Add to cart</button>
              </center>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="product.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iusto quo exercitationem inventore? Ad id eligendi obcaecati quis, magnam explicabo?</p>
              <center>
                <button class="btn btn-success" name="buy">Buy</button>
                <button class="btn btn-info" name="addtocart">Add to cart</button>
              </center>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="product.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iusto quo exercitationem inventore? Ad id eligendi obcaecati quis, magnam explicabo?</p>
              <center>
                <button class="btn btn-success">Buy</button>
                <button class="btn btn-info">Add to cart</button>
              </center>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="product.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Product 5</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iusto quo exercitationem inventore? Ad id eligendi obcaecati quis, magnam explicabo?</p>
              <center>
                <button class="btn btn-success">Buy</button>
                <button class="btn btn-info">Add to cart</button>
              </center>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="product.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Product 6</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iusto quo exercitationem inventore? Ad id eligendi obcaecati quis, magnam explicabo?</p>
              <center>
                <button class="btn btn-success">Buy</button>
                <button class="btn btn-info">Add to cart</button>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
</body>

</html>