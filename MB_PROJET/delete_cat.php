<?php
include("connection_server.php");
include("Categorie_MB.php");
$id=$_GET['id'];
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
Categorie::deleteCategorie("categorie",$connection->conn,$id);
header("Location:admin_cat.php") ;
?>