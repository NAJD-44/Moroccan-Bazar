<?php 
class City{
    public $ID,$name;
    public static function selectAllcities($table,$conn){
        $sql = "SELECT id , name FROM $table";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data=[];
while($row = mysqli_fetch_assoc($result)) {
        $data[]=$row;
    }
    return $data;
}
    }
    public static function selectCityById($table,$conn,$id){
        $row=[];
        $sql = "SELECT name FROM $table WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_assoc($result);
        }
        return $row;
    }

}
?>