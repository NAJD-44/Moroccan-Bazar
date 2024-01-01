<?php

class Categorie {
    public $idcat,$name;
    public static $errormsg="";
    public static $successmsg="";
    public function __construct($name)
    {
        $this->name=$name;
        
    }

    public function insertCategories($table,$conn) {
        $sql = "INSERT INTO $table (id, Catname)
        VALUES ('$this->idcat', '$this->name')";
        if (mysqli_query($conn, $sql)) {
        self :: $successmsg="New record created successfully";
        } else {
            self :: $errormsg="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    public static function selectCategories($table,$conn) {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data=[];
        while($row = mysqli_fetch_assoc($result)) {
                $data[]=$row;
            }
            return $data;
        }
    }
    static function selectCategorieById($table,$conn,$id){
        $sql = "SELECT Catname  FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    }
    return $row;
    }
    static function updateCategorie($categorie,$table,$id,$conn){
        $sql = "UPDATE $table SET Catname='$categorie->name' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record updated successfully";
        } else {
            self::$errormsg= "Error updating record: " . mysqli_error($conn);
        }
    }
    static function deleteCategorie($table,$conn,$id){
        $sql = "DELETE FROM $table WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record deleted successfully";
        header("Location:read_MB.php");
    } else {
        self::$errormsg= "Error deleting record: " . mysqli_error($conn);
    }
    
    }
}
?>