<?php

class Product {
    public $productId;
    public $producImage;
    public $productName;
    public $productDescription;
    public $price;
    public $quantity;
    public $idcat;
    public static $errormsg="";
    public static $successmsg="";
    public function __construct($producImage, $productName,$productDescription, $price, $quantity, $idcat)
    {

        $this->producImage = $producImage;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->idcat = $idcat;
    }
    public function getcatname() {
        return $this->idcat; 
    }

    public  function insertProduct($table,$conn) {
        $sql = "INSERT INTO $table (Productimage, Productname,ProductDescription,price,Quantity,Catname)
        VALUES ('$this->producImage','$this->productName','$this->productDescription', '$this->price',' $this->quantity','$this->idcat')";
        if (mysqli_query($conn, $sql)) {
        self :: $successmsg="New record created successfully";
        } else {
            self :: $errormsg="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    public static function selectProducts($tableName,$conn) {
        $sql = "SELECT * FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $data=[];
            while($row = mysqli_fetch_assoc($result)) {
            
                $data[]=$row;
            }
            return $data;
        }
    }
    static function selectProductById($table,$conn,$id){
        $row=[];
        $sql = "SELECT Productimage,Productname, ProductDescription,price,Quantity,Catname  FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    }
    return $row;
    }
    static function updateProduct($product,$table,$id,$conn){
        $sql = "UPDATE $table SET Productimage='$product->producImage',Productname='$product->productName',ProductDescription='$product->productDescription',price='$product->price',Quantity='$product->quantity',Catname='$product->idcat' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record updated successfully";
        header("Location:admin_product.php");
        } else {
            self::$errormsg= "Error updating record: " . mysqli_error($conn);
        }
    }
    static function deleteProduct($table,$conn,$id){
        $sql = "DELETE FROM $table WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        self::$successmsg= "Record deleted successfully";
        header("Location:read_MB.php");
    } else {
        self::$errormsg= "Error deleting record: " . mysqli_error($conn);
    }
    
    }

    public static function selectProductByCatId($table,$conn,$id){
        $sql = "SELECT id, Productimage,Productname, ProductDescription,price,Quantity,Catname FROM $table WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data=[];
    while($row = mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        return $data;
    }
    }
}
?>