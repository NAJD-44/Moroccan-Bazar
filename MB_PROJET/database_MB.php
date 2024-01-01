<?php
include('connection_server.php');
$connection = new Connection();
//$connection->createDatabase('MB_SUP');
// $query0 = "
// CREATE TABLE Cities (
//  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//  name VARCHAR(30) NOT NULL
//  )
//  ";
// $query = "
// CREATE TABLE Clients (
//  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//  firstname VARCHAR(30) NOT NULL,
//  lastname VARCHAR(30) NOT NULL,
//  email VARCHAR(50) UNIQUE,
//  password VARCHAR(80),
//  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//  idcity INT  UNSIGNED ,
//  FOREIGN KEY (idcity) REFERENCES Cities(id) ON DELETE CASCADE ON UPDATE CASCADE
//  )
// ";
// $query1 = "
// CREATE TABLE Categorie (
//  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//  Catname VARCHAR(30) NOT NULL
//  )
// ";
// $query2 = "
// CREATE TABLE Product (
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     Productimage VARCHAR(255) NOT NULL,
//     Productname VARCHAR(30) NOT NULL,
//     ProductDescription LONGTEXT NOT NULL,
//     price DECIMAL(10, 2) NOT NULL,
//     Quantity INT NOT NULL,
//     Catname INT UNSIGNED,
//     FOREIGN KEY (Catname) REFERENCES Categorie(id) ON DELETE CASCADE ON UPDATE CASCADE
// )
// ";
// $query4 = "
// CREATE TABLE Admin (
//  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//  email VARCHAR(50) UNIQUE,
//  password VARCHAR(80)
//  )
// ";
// $query5="
// CREATE TABLE commande (
//   id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   id_client INT(1) UNSIGNED NOT NULL,
//   total DECIMAL(10, 2) NOT NULL,
//   valide INT(11) NOT NULL DEFAULT 0,
//   date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   FOREIGN KEY (id_client) REFERENCES Clients(id) ON DELETE CASCADE ON UPDATE CASCADE
// );
// ";
//   $query6= "
//   CREATE TABLE ligne_commande (
//     id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     id_produit INT UNSIGNED NOT NULL,
//     id_commande INT UNSIGNED NOT NULL,
//     prix DECIMAL(10, 2) NOT NULL,
//     quantite INT(11) NOT NULL,
//     total DECIMAL(10, 2) NOT NULL,
//     FOREIGN KEY (id_produit) REFERENCES Product(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     FOREIGN KEY (id_commande) REFERENCES commande(id) ON DELETE CASCADE ON UPDATE CASCADE
// );

//   ";
// $connection->selectDatabase('MB_SUP');
// $connection->createTable($query0);
// $connection->createTable($query);
// $connection->createTable($query1);
// $connection->createTable($query2);
// $connection->createTable($query4);
// $connection->createTable($query5);
// $connection->createTable($query6);
?>