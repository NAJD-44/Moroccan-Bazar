<?php
class Admin {
public $email;
public $password;
public static $errormsg="";
public static $successmsg="";
public function __construct($email,$password) {
    $this->email =$email;
    $this->password =$password;
}
static function selectAdminByEmail($table,$conn,$mail){
    $sql = "SELECT * FROM $table WHERE email='$mail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    return $row;
    }
}
}
?>