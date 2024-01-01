<?php
include("connection_server.php");
include("Product_MB.php");
include("Categorie_MB.php");
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
$pimage="";
$pname="";
$pdes="";
$pprice=0;
$pq=0;
$pcat="";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="PICS_MB/favicon 2.png" type="image">
    <title>EDIT PRODUCT</title>
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
          <a class="nav-link" href="admin_cat">Categorie</a>
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
</nav>a
<div class="container py-2">
    <h4>EDIT PRODUCT</h4>
    <?php
    $id = $_GET['id'];
    if (isset($_POST['ajouter'])) {
        $pimage=$_POST['pImage'];
        $pname=$_POST['pName'];
        $pdes=$_POST['pDescription'];
        $pprice=$_POST['pPrice'];
        $pq=$_POST['pQ'];
        $pcat=$_POST['pCategorie'];
        $filename = 'produit.png';
    if (!empty($_FILES['pImage']['pName'])) {
            $image = $_FILES['pImage']['pName'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['pImage']['tmp_name'],''. $filename);
        }
        if (!empty($pname) && !empty($pdes) && !empty($pprice)&& !empty($pq)&& !empty($pcat)) {
            $produit=new Product($filename,$pname,$pdes,$pprice,$pq,$pcat);
            Product::updateProduct($produit,"Product",$id,$connection->conn);
                header('location:admin_product.php');
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
    <label class="form-label">Image:</label>
        <input type="file" class="form-control" name="pImage">
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" name="pName">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="pDescription"></textarea>
        <label class="form-label">Price:</label>
        <input type="number" class="form-control" step="0.1" name="pPrice" min="0">
        <label class="form-label">Quantity:</label>
        <input type="number" class="form-control" step="0.1" name="pQ" min="0">
        <label class="form-label">Categorie:</label>
        <select name="pCategorie" class="form-control">
            <option selected>Select a Categorie</option>
            <?php
            $categories=Categorie::selectCategories("categorie",$connection->conn);
            foreach ($categories as $categorie) {
                echo "<option value='" . $categorie['id'] . "'>" . $categorie['Catname'] . "</option>";
            }
            ?>
        </select>


        <input type="submit" value="UPDATE" class="btn btn-primary my-2" name="ajouter">
    </form>
</div>

</body>
</html>