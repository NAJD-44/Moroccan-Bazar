<?php
include("connection_server.php");
include("Categorie_MB.php");
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
$cname="";
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="PICS_MB/favicon 2.png" type="image">

    <title>ADD Categorie</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="PICS_MB/Moroccan Bazar.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item" style="margin-right:10%;">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item"style="margin-right:10%;">
          <a class="nav-link" href="admin.php">Users</a>
        </li>
        <li class="nav-item"style="margin-right:10%;">
          <a class="nav-link" href="categories.php">Categorie</a>
        </li>
        <li class="nav-item"style="margin-right:10%;">
          <a class="nav-link" href="admin_product.php">Product</a>
        </li>
        <li class="nav-item"style="margin-right:110%;">
          <a class="nav-link" href="#">Orders</a>
        </li>
        <li class="nav-item "style="float: right;">
        <a class="nav-link " href="home.php" >Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container py-2">
    <h4>ADD CATEGORIE</h4>
    <?php
    if (isset($_POST['ajouter'])) {
$cname=$_POST['catname'];

        if (!empty($cname) ) {
           $cat=new Categorie($cname);
           $cat->insertCategories("categorie",$connection->conn);
                header('location:admin_cat.php');
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Tout les champs sont obligatoires.
            </div>
            <?php
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
    
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" name="catname">
        <input type="submit" value="Ajouter produit" class="btn btn-primary my-2" name="ajouter">
    </form>
</div>

</body>
</html>