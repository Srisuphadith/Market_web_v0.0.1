<?php

#connect to DB
require_once "connect.php";

#if submit is toggle do sign up method
if (!isset($_POST["submit"])) {
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
                <a class="navbar-brand" href="#">Tech Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
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
        <center><h1>Sign Up</h1></center>
        <div class="container-sm">
            <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">surname</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="surname">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">login</button>
            </form>
        </div>
    </body>

    </html>

    <?php
} else {
    #This is sign up method

    #set up insert variable
    $username = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    #check empty
    if ($username != "" and $name != "" and $surname != "" and $email != "" and $password != "") {
        #if already
        $sql = "INSERT INTO user_login (name,surname,username,pass,email,level) VALUES ('$name','$surname','$username','$password','$email',1)";
        $result = mysqli_query($link, $sql);
        echo "success";
        header("refresh: 1; url = login.php");

    } else {
        #if empty
        echo "enter please information";
        header("refresh: 1; url = register.php");
    }
}
?>