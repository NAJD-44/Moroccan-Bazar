<?php
class Ligne_commande {
    public $idlcom,$idprod,$idcom,$prix,$quantite,$total;
    public static $errormsg="";
    public static $successmsg="";
    public function __construct($idlcom,$idprod,$idcom,$prix,$quantite,$total)
    {
        $this->idlcom=$idlcom;
        $this->idprod = $idprod;
        $this->idcom = $idcom;
        $this->prix = $prix;
       $this->quantite = $quantite;
       $this->total = $total;
        
    }

    public function insertLCommande($table,$conn) {
        $sql = "INSERT INTO $table (id,id_produit,id_commande,prix,quantite,total)
        VALUES ('$this->idlcom', '$this->idprod','$this->idcom','$this->prix','$this->quantite','$this->total')";
        if (mysqli_query($conn, $sql)) {
        self :: $successmsg="New record created successfully";
        } else {
            self :: $errormsg="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    static function selectLCommande($table,$conn) {
        $sql = "SELECT id,id_produit,id_commande,prix,quantite,total FROM $table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data=[];
    while($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        return $data;
    }
    }
    static function selectLCommandeById($table,$conn,$id){
        $row=[];
        $sql = "SELECT id_produit,id_commande,prix,quantite,total  FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    }
    return $row;
    }
    static function updateLCommande($Lcommande,$table,$id,$conn){
        $sql = "UPDATE $table SET id_produit='$Lcommande->idprod',id_commande='$Lcommande->idcom',prix='$Lcommande->prix',quantite='$Lcommande->quantite',total='$Lcommande->total' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record updated successfully";
        //header("Location:read_MB.php");
        } else {
            self::$errormsg= "Error updating record: " . mysqli_error($conn);
        }
    }
    static function deleteLCommande($table,$conn,$id){
        $sql = "DELETE FROM $table WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record deleted successfully";
        //header("Location:admin.php");
    } else {
        self::$errormsg= "Error deleting record: " . mysqli_error($conn);
    }
    
    }
}
?>