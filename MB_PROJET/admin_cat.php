<?php
include("connection_server.php");
include("Categorie_MB.php");
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="PICS_MB/favicon 2.png" type="image">
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
          <a class="nav-link" href="#">Categorie</a>
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
  <h2>Categories</h2>
  <a href="admin_addcat.php" class="btn btn-dark">Add Categorie</a>
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Opérations</th>
          </tr>
      </thead>
      <tbody>
      <?php
$cat = Categorie::selectCategories("Categorie", $connection->conn);

if ($cat !== null) {
    foreach ($cat as $row) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['Catname']}</td>
        <td>
                    <a class='btn btn-dark' href='update_cat.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger' href='delete_cat.php?id=$row[id]' >Delete</a>
                </td>
        </tr>";
    }
} else {
    echo "No Categories found"; 
}
?>

      </tbody>
  </table>
</div>
</body>
</html>