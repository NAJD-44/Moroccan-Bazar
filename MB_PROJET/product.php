<?php
include("Product_MB.php");
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
            <a href="categories.php">Categuories</a>
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
<section class="section-products" style="margin-top:11%;">
      <?php
      if (isset($_GET['id'])) {
        $categoryId = $_GET['id'];
        $produit=Product::selectProductByCatId("product",$connection->conn,$categoryId );
        echo"<div class='container'>
      <div class='row justify-content-center text-center'>
          <div class='col-md-8 col-lg-6'>
              <div class='header'>
                  <h2>Products</h2>
              </div>
          </div>
      </div>";
      if ($produit !== null && is_array($produit)) {
        $i=0;
        foreach ($produit as $row) {
              echo "<div class='row'>
              <div class='col-md-6 col-lg-4 col-xl-3'>
                  <div id='product-$i' class='single-product'>
                      <div class='part-1'>
                      </div>
                      <div class='part-2'>
                          <h3 class='product-title'>{$row['Productname']}</h3>
                          <h4 class='product-old-price'>$279.99</h4>
                          <h4 class='product-price'>{$row['price']}$</h4>
                      </div>
                  </div>
              </div>";
              $i++ ;
        }
    } 
      } else {
        echo "No Products Avaliable";
    }
      ?>
      
</section>
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
</div>
<!-- End of .container -->

    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/popper.min.js"></script>
    <script src="path/to/bootstrap.min.js"></script>

</body>

</html>
