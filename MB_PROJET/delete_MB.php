<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

   include('connection_server.php');
   $connection=new Connection();
   $connection->selectDatabase("MB_SUP");
    include("Client_MB.php");
    Client::deleteClient("Clients",$connection->conn,$id);

}
?>