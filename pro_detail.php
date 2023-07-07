<?php
require_once "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM product WHERE product_id='$id'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_assoc($result);
            echo $data["product_name"];
        }

        ?>
    </title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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


    <div
        style="background-color: lightblue; height:500px; width: 80%;border-radius: 25px; margin:auto;padding-top:100px;">
        <div style="display:flex;">
            <div style="background-color: red;height:300px; width:300px; border-radius: 25px; margin-left:5%;">
                <img src="<?php echo $data["path_img"]; ?>" style="height:300px; width:300px;border-radius: 25px;">
            </div>
            <div style="padding-left:20px;">
                <h1 style="text-align: left; ">Product :
                    <?php echo $data["product_name"]; ?>
                </h1>
                <h1 style="text-align: left; "> Price :
                    <?php echo $data["product_price"]; ?> Baht
                </h1>
                <h1 style="text-align: left; "> detail:
                    <?php echo $data["product_detail"]; ?>
                </h1>
                <div style="padding-top:20%">
                    <form action="#" method="post">
                        <input value="1" name="quan">
                        <button type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    



</body>

</h1>

</html>