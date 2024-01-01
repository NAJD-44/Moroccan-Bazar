<?php

$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$passwordValue="";
$idcityValue = "";
$errorMesage = "";
$successMesage = "";

include("connection_server.php");
        $connection=new Connection();
        $connection->selectDatabase("MB_SUP");
        include("Client_MB.php");
        include("city_MB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
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
          <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item"style="margin-right:10%;">
          <a class="nav-link" href="#">Categorie</a>
        </li>
        <li class="nav-item"style="margin-right:10%;">
          <a class="nav-link" href="#">Product</a>
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
    <div class="container my-5  ">

        <h2>Update</h2>

    <?php

    if(!empty($errorMesage)){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
    }
       ?>

        <br>
        <form method="post">
            
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $fnameValue ?>" class="form-control" type="text" id="fname" name="firstName">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $lnameValue ?>" class="form-control" type="text" id="lname" name="lastName">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input value=" <?php echo $emailValue ?>" class="form-control" type="email" id="email" name="email">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="idcity">City:</label>
                    <div class="col-sm-6">
                   <select name="idcity" class="form-select">
                    <option selected>Select your city</option>
                           <?php
                           $city=City::selectAllcities("Cities",$connection->conn);
                           foreach($city as $c){
                               echo"<option value='$c[id]'>$c[name]</option>";
                           }
                           ?>
                  </select></div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="password">Password:</label>
                    <div class="col-sm-6">
                        <input  class="form-control" type="password" id="password" name="password">
                    </div>
            </div>
            


            <?php
            if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
  ?>  
      

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-dark">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-dark" href="admin.php">Cancel</a>
                    </div>
            </div>
        </form>

    </div>
<?php
if(isset($_POST["submit"])){


    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];
    $fnameValue = $_POST["firstName"];
    $passwordValue= $_POST["password"];
    $idcityValue = $_POST["idcity"];

    if(empty($emailValue) || empty($fnameValue) || empty($lnameValue)|| empty($passwordValue)|| empty($idcityValue) ){

            $errorMesage = "all fileds must be filed out!";

    }else{
        $client=new Client($fnameValue,$lnameValue,$emailValue,$passwordValue,$idcityValue);

      Client::updateClient($client,'Clients',$_GET['id'],$connection->conn);
    }
}

?>

</body>
</html>