<?php
session_start();
if(isset($_SESSION["user_id"])and isset($_SESSION["user_level"])){
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop tech | wellcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Tech Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Signup</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <center>
    <h1>main pages</h1>
  </center>
  <table class="table">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>price</th>
      <th>product details</th>
      <th>view details</th>
    </tr>
    <?php
    require_once "connect.php";
    $sql = "SELECT * FROM product";
    $result_p = mysqli_query($link, $sql);
    while ($pro = mysqli_fetch_assoc($result_p)) {
      echo "<tr>";
?>
      <td><?php echo $pro["product_id"]?></td>
      <td><?php echo $pro["product_name"]?></td>
      <td><?php echo $pro["product_price"]?></td>
      <td><?php echo $pro["product_detail"]?></td>
      <td><a href="pro_detail.php?id=<?php echo $pro["product_id"]?>">view</a></td>
<?php
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>