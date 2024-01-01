<?php
include("connection_server.php");
include("Product_MB.php");
include("Categorie_MB.php");
$id=$_GET['id'];
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
Product::deleteProduct("Product",$connection->conn,$id);
header("Location:admin_product.php") ;
?>