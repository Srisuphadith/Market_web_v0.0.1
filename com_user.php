<?php
session_start();
if (isset($_SESSION["user_id"])) {
  #if session(user_id) exist

  #connect DB
  require_once "connect.php";
  #define id = session[user_id]
  $id = $_SESSION["user_id"];

  $sql = "SELECT * FROM user_login Where user_id ='$id' ";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);







  if (mysqli_num_rows($result) == 1) {
    #if user exist
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </head>

    <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Tech Shop</a>
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
                <a class="nav-link" href="account.php">
                  <?php echo $row["username"]; ?>
                </a>
              </li>
            </ul>
            <a class="nav-link" href="log_out.php">Log Out</a>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <br>
      <table class="table">
        <tr>
          <th>id</th>
          <th>name</th>
          <th>price</th>
          <th>product details</th>
          <th>seller id</th>
        </tr>
        <?php
        $sql = "SELECT * FROM product";
        $result_p = mysqli_query($link, $sql);
        while ($pro = mysqli_fetch_array($result_p)) {
          echo "<tr>";
          for ($i = 0; $i < mysqli_num_fields($result_p); $i++) {
            echo "<td>";
            echo "  " . $pro[$i] . "  ";
            echo "</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>

    </body>

    </html>
    <?php
  } else {
    #if exist but don't have user in table
    header("location:login.php");
  }
} else {
  #if session(user_id) not exist
  header("location:login.php");
}
?>