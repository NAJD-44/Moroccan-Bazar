<?php
include("Categorie_MB.php");
include("connection_server.php");
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moroccan-Bazar</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="home.css" rel="stylesheet">
    <link rel="icon" href="PICS_MB/favicon 2.png" type="image">
    <style>
body {
    background-color: #eee
}
.mt-100{
margin-top: 100px;
}
.card {
    border-radius: 7px !important;
    border-color: #e1e7ec;
}

.mb-30 {
    margin-bottom: 30px !important;
}

.btn-group-sm>.btn, .btn-sm {
    padding: .45rem .5rem !important;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
    </style>
</head>

<body>

  <nav class="navbar-nav navbar-expand-lg fixed-top bg-white">
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
            <a href="catgories.php">Categuories</a>
          </div>
        </div>
      </div>
      <div class="col-6">
        <img  src="PICS_MB/Moroccan Bazar 3.png" width="80%" height="80%" alt="logo"> 
      </div>
      <div class="col-3 d-flex">
        <div class="col">
          <a href="Login.php" >Log in</a>
        </div>
        <div class="col">
          <a href="SignUp.php">Register</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<br>
<div class="container mt-100" style="margin-top:11%;">
    <?php
    $cat = Categorie::selectCategories("categorie", $connection->conn);
    if ($cat !== null && is_array($cat)) {
        $count = 0;
        echo "<div class='row'>";
        foreach ($cat as $row) {
            echo "<div class='col-md-4 col-sm-6'>
                    <div class='card mb-30' >
                        <div class='card-body text-center'>
                            <h4 class='card-title'>{$row['Catname']}</h4>
                            <a class='btn btn-outline-dark btn-sm' href='product.php?id={$row['id']}' data-abc='true'>View Products</a>
                             </div>
                    </div>
                  </div>";
            $count++;
            if ($count % 3 == 0) {
                echo "</div><div class='row'>";
            }
        }
        echo "</div>"; 
    } else {
        echo "No Categories Available";
    }
    ?>
</div>

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
  <!-- Footer -->

</div>
<!-- End of .container -->

    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/popper.min.js"></script>
    <script src="path/to/bootstrap.min.js"></script>
<script>
  function nextSlide() {
    $('#carouselExampleIndicators').carousel('next');
  }

  // Move to the previous slide manually
  function prevSlide() {
    $('#carouselExampleIndicators').carousel('prev');
  }

  // Move to the next slide automatically every 3 seconds
  setInterval(function() {
    nextSlide();
  }, 3000);
</script>
</body>

</html>
