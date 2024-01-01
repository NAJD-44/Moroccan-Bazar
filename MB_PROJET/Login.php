<?php
 include("connection_server.php");
 $connection=new Connection();
 $connection->selectDatabase("MB_SUP");
$emailValue = "";
$passwordValue = "";
$errorMesage = "";
$successMesage = "";
if(isset($_POST["Logged"])){
    $emailValue = $_POST["email"];
    $passwordValue = $_POST["password"];
    if(empty($emailValue) || empty($passwordValue)){

            $errorMesage = "all fileds must be filed out!";

    }else if(strlen($passwordValue) < 8 ){
        $errorMesage = "password must contains at least 8 char";
    }else if(preg_match("/[A-Z]+/", $passwordValue)==0){
        $errorMesage = "password must contains  at least one capital letter!";
    }else{
      include("Admin_MB.php");
      include("Client_MB.php");
      if(Client::selectClientByEmail("Clients",$connection->conn,$emailValue)){
        header("Location:home2.php");
      }else if(Admin::selectAdminByEmail("Admin",$connection->conn,$emailValue)){
        header("Location:admin.php");
      }
      
        $emailValue = "";
        $passwordValue = "";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOG IN</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="home.css" rel="stylesheet">
    <link rel="icon" href="PICS_MB/favicon 2.png" type="image">
</head>

<body>

  <nav class="navbar-nav navbar-expand-lg fixed-top bg-white ">
  <div class="container text-center">
    <div class=" navbar-collapse">
      <div class="col-3 d-flex">
        <div class="col ">
          <a href="home.php">Home</a>
        </div>
        <div class="col">
          <a href="Aboutus.php">About us</a>
        </div>
        <div class="col">
          <div class="dropdown">
            <a href="#">Categuories</a>
            <div class="dropdown-content">
              <a href="#">Decoration</a>
              <a href="#">Clothing</a>
              <a href="#">Accessories</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <img  src="PICS_MB/Moroccan Bazar 3.png" width="80%" height="80%" alt="logo"> 
      </div>
      <div class="col-3 d-flex">
        <div class="col">
          <a href="Login.php">Log in</a>
        </div>
        <div class="col">
          <a href="SignUp.php">Register</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<br>
<section class="vh-100 bg-image"
  style="background-image: url('PICS_MB/Saharasignup.jpg');
  margin-top: 5%;">
  <div class="mask d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-6">
              <h2 class="text-uppercase text-center mb-5">LOG IN</h2>
              <?php

              if(!empty($errorMesage)){
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>$errorMesage</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
              </button>
              </div>";
              }
                 ?>
              <form method="post">
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email:</label>
                  <input  value=" <?php echo $emailValue ?>" type="email" id="email" name="email" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password:</label>
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  </div>
                  <?php
                      if(!empty($successMesage)){
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>$successMesage</strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                      </button>
                      </div>";
                      }
                  ?>  
                <div class="d-flex justify-content-center">
                  <button type="submit" name="Logged"
                    class="btn btn-success btn-block btn-lg  text-body">Login</button>
                </div>
                <p class="text-center text-muted mt-5 mb-0">You don't have an account? <a href="Login.php"
                    class="fw-bold text-body"><u>Register here</u></a></p>
                    <?php
              if(!empty($successMesage)){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>$successMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
              }
              ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  

<footer
          class="text-center text-lg-start text-white"
          style="background-color: black"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4"
             style="background-color: whitesmoke"
             >
      <!-- Left -->
      <div class="me-5 text-black">
        <span>Get connected with us on social networks:</span>
      </div>
      <div>
        <a href="" class="text-primary me-4">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="" class="text-black me-4">
          <i class="bi bi-twitter-x"></i>
        </a>
        <a href="" class="text-danger me-4">
          <i class="bi bi-google"></i>
        </a>
        <a href="" class=" me-4" style="color: #6f42c1;">
          <i class="bi bi-instagram"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="bi bi-linkedin"></i>
        </a>
        <a href="" class="text-dark me-4">
          <i class="bi bi-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Moroccan-Bazar</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              
Discover the allure of Morocco . Explore a curated blend of tradition and artistry in our handpicked collection of exquisite crafts. Elevate your space with authentic, soulful pieces that tell a story of skill and heritage. Welcome to a world where every purchase is a celebration of Moroccan craftsmanship.
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="Login.php" class="text-white">Your Account</a>
            </p>
            <p>
              <a href="SignUp.php" class="text-white">SignUp</a>
            </p>
            
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fas fa-home mr-3"></i> Marrakesh,40000,Morocco</p>
            <p><i class="fas fa-envelope mr-3"></i> contact@Moroccan-Bazar.com</p>
            <p><i class="fas fa-phone mr-3"></i> +21266666668</p>
            <p><i class="fas fa-print mr-3"></i> +21266666669</p>
          </div>
        </div>
      </div>
    </section>
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2023 Copyright:
      <a class="text-white" href="home.php"
         >www.Moroccan-Bazar.com</a
        >
    </div>
    <!-- Copyright -->
  </footer>

</div>
<!-- End of .container -->

    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/popper.min.js"></script>
    <script src="path/to/bootstrap.min.js"></script>

</body>

</html>