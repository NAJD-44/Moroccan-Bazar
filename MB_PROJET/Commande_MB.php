<?php
class Commande {
    public $idcom,$idclient,$total,$valide;
    public static $errormsg="";
    public static $successmsg="";
    public function __construct($idcom,$idclient,$total,$valide)
    {
        $this->idcom=$idcom;
        $this->idclient = $idclient;
        $this->total = $total;
        $this->valide = $valide;
        
    }

    public function insertCommande($table,$conn) {
        $sql = "INSERT INTO $table (id,id_client,total,valide)
        VALUES ('$this->idcom', '$this->idclient','$this->total','$this->valide')";
        if (mysqli_query($conn, $sql)) {
        self :: $successmsg="New record created successfully";
        } else {
            self :: $errormsg="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    static function selectCommande($table,$conn) {
        $sql = "SELECT id,id_client,total,valide,date_creation FROM $table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data=[];
    while($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        return $data;
    }
    }
    static function selectCommandeById($table,$conn,$id){
        $row=[];
        $sql = "SELECT id_client,total,valide,date_creation  FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    }
    return $row;
    }
    static function updateCommande($commande,$table,$id,$conn){
        $sql = "UPDATE $table SET total='$commande->total',valide='$commande->valide' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record updated successfully";
        //header("Location:read_MB.php");
        } else {
            self::$errormsg= "Error updating record: " . mysqli_error($conn);
        }
    }
    static function deleteCommande($table,$conn,$id){
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