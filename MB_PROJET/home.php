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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="PICS_MB/banner.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="PICS_MB/marrakech-4409009_1920.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="PICS_MB/morocco-1070782_1920.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container "style="color:black;background:whitesmoke;" >
  <div class="w3-content">
    <div class="w3-twothird">
      <h1 >About us</h1>
      <h5 class="w3-padding-32">Welcome to our world of Moroccan craftsmanship, where tradition meets artistry in a vibrant fusion of colors and patterns. At <a class="text-decoration-none w3-text-blue-gray" href="home.html"> Moroccan-Bazar</a>, we take pride in curating and showcasing the rich heritage of Morocco through an exquisite collection of handcrafted treasures. Each piece tells a story of skilled artisans who have perfected their craft over generations, infusing passion and dedication into every stitch, weave, and detail.
      </h5>
      <p >Indulge in the timeless elegance of Moroccan craftsmanship, and let each carefully chosen item add a touch of sophistication and cultural flair to your life. Join us on a journey that celebrates tradition, honors craftsmanship, and brings the soulful beauty of Morocco to your doorstep.
         </p>
         <button type="button" class="btn btn-dark text-white"><a href="About us.html">read more</a></button>
    </div>
    <div class="w3-third w3-center">
      <img src="PICS_MB/berber-1125869_1920.jpg" width="88%" height="88%" style="border-radius: 50%;margin-right: -40%;" alt="berber">
    </div>
  </div>
</div>
<section class="section-products">
  <div class="container">
      <div class="row justify-content-center text-center">
          <div class="col-md-8 col-lg-6">
              <div class="header">
                  <h3>Featured Product</h3>
                  <h2>Popular Products</h2>
              </div>
          </div>
      </div>
      <?php
      $produit=Product::selectProducts("product",$connection->conn);
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
              $i++;
            if($i>=6)
            break;
        }
    } else {
        echo "No Products Avaliable";
    }
      ?>
      
</section>

 
<div >

  <!-- Footer -->
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
