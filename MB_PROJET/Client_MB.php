<?php
// include("connection_server.php");
class Client {
public $id,$fname,$lname,$email,$password,$reg_date,$idcity;
public static $errormsg="";
public static $successmsg="";
public function __construct($fname,$lname,$email,$password,$idcity) {
    $this->fname =$fname;
    $this->lname =$lname;
    $this->email =$email;
    $this->idcity =$idcity;
    $this->password =password_hash($password,PASSWORD_DEFAULT);
}
public function insertClient($table,$conn){
    $sql = "INSERT INTO $table (firstname, lastname, email,password,idcity)
    VALUES ('$this->fname',' $this->lname',' $this->email','$this->password','$this->idcity')";
    if (mysqli_query($conn, $sql)) {
    self :: $successmsg="New record created successfully";
    } else {
        self :: $errormsg="Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
static function selectClient($table,$conn){
    $sql = "SELECT id, firstname, lastname,email,password,idcity FROM $table";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data=[];
    while($row = mysqli_fetch_assoc($result)) {
        $data[]=$row;
    }
    return $data;
}
}
static function selectClientById($table,$conn,$id){
    $row=[];
    $sql = "SELECT firstname, lastname,email,password FROM $table WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$row=mysqli_fetch_assoc($result);
}
return $row;
}
static function selectClientByEmail($table,$conn,$email){
   
$sql = "SELECT * FROM $table WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$row=mysqli_fetch_assoc($result);
return $row;
}

}
static function updateClient($client,$table,$id,$conn){
    $sql = "UPDATE $table SET lastname='$client->lname',firstname='$client->fname',email='$client->email',password='$client->password' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
    self::$successmsg= "Record updated successfully";
    header("Location:admin.php");
    } else {
        self::$errormsg= "Error updating record: " . mysqli_error($conn);
    }
}
static function deleteClient($table,$conn,$id){
    $sql = "DELETE FROM $table WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    self::$successmsg= "Record deleted successfully";
    header("Location:admin.php");
} else {
    self::$errormsg= "Error deleting record: " . mysqli_error($conn);
}

}
public static function selectClientByCityId($table,$conn,$id){
    $sql = "SELECT id,firstname, lastname,email,password,idcity FROM $table WHERE idcity='$id'";
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