<?php
include("city_MB.php");
include("connection_server.php");
$connection = new Connection();
$connection->selectDatabase("MB_SUP");

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
          <a class="nav-link" href="admin_cat.php">Categorie</a>
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
    <h2>Détails Commandes</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Client</th>
            <th>Total</th>
            <th>Date</th>
            <th>Opérations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sqlStateLigneCommandes = $pdo->prepare('SELECT ligne_commande.*,produit.libelle,produit.image from ligne_commande
                                                        INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                                        WHERE id_commande = ?
                                                        ');
        $sqlStateLigneCommandes->execute([$idCommande]);
        $lignesCommandes = $sqlStateLigneCommandes->fetchAll(PDO::FETCH_OBJ);
        ?>
        <tr>
        <td><?php echo $commande['id'] ?></td>
        <td><?php echo $commande['login'] ?></td>
        <td><?php echo $commande['total'] ?> <i class="fa fa-solid fa-dollar"></i></td>
        <td><?php echo $commande['date_creation'] ?></td>
        <td>
            <?php if ($commande['valide'] == 0) : ?>
                <a class="btn btn-success btn-sm" href="valider_commande.php?id=<?= $commande['id']?>&etat=1">Valider la commande</a>
            <?php else: ?>
                <a class="btn btn-danger btn-sm" href="valider_commande.php?id=<?= $commande['id']?>&etat=0">Annuler la commande</a>
            <?php endif; ?>
        </td>
        <td>
        </td>
    </tr>
        <?php
        ?>
        </tbody>
    </table>
    <hr>
    <h2>Produits : </h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($lignesCommandes as $lignesCommande) : ?>
            <tr>
                <td><?php echo $lignesCommande->id ?></td>
                <td><?php echo $lignesCommande->libelle ?></td>
                <td><?php echo $lignesCommande->prix ?> <i class="fa fa-solid fa-dollar"></i></td>
                <td>x <?php echo $lignesCommande->quantite ?></td>
                <td><?php echo $lignesCommande->total ?> <i class="fa fa-solid fa-dollar"></i></td>
            </tr>
        <?php endforeach;
        ?>
        </tbody>
    </table>
</div>

</body>
</html>