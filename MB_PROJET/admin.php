<?php
include("city_MB.php");
include("connection_server.php");
$connection = new Connection();
$connection->selectDatabase("MB_SUP");
include("Client_MB.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
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
          <a class="nav-link" href="admin_cat.php">Categorie</a>
        </li>
        <li class="nav-item"style="margin-right:10%;">
          <a class="nav-link" href="admin_product.php">Product</a>
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
<div class="container my-5">
    <h2>USERS</h2>
    <a class="btn btn-dark text-white" href="SignUp.php" role="button">Signup</a>

    <br><br>

    <form method="post">
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-success" type="submit" name="submit">Search</button>
            </span>
            <select name="city" class="form-select">
                <option selected>Select a City</option>
                <?php
                $city = City::selectAllCities("Cities", $connection->conn);
                foreach ($city as $c) {
                    echo "<option value='$c[id]'>$c[name]</option>";
                }
                ?>
            </select>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>City Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
// Display all clients by default
$clients = Client::selectClient("Clients", $connection->conn);

// Process the form submission
if (isset($_POST["submit"])) {
    if (!empty($_POST['city']) && $_POST['city'] != 'Select a City') {
        // Display clients from the selected city
        $clients = Client::selectClientByCityId("Clients", $connection->conn, $_POST['city']);
    } else {
        // If an invalid or no city is selected, display an error message or handle it as appropriate
        echo "Please select a valid city.";
    }
}

// Display the clients or "No clients found" message
if ($clients !== null && is_array($clients)) {
    foreach ($clients as $row) {
        $city = City::selectCityById("Cities", $connection->conn, $row['id']);
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['email']}</td>
            <td>";

        if (!empty($city) && isset($city['name'])) {
            echo $city['name'];
        } else {
            echo 'N/A';
        }

        echo "</td>
            <td>
                <a class='btn btn-success btn-sm' href='Update_MB.php?id={$row['id']}'>edit</a>
                <a class='btn btn-danger btn-sm' href='delete_MB.php?id={$row['id']}'>delete</a>
            </td>
        </tr>";
    }
} else {
    echo "No clients found.";
}
?>

        </tbody>
    </table>
</div>

</body>
</html>