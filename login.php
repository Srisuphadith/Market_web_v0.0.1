<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    #if session(user_id) exist

    #connect DB
    require_once "connect.php";
    if (!isset($_POST["send"])) {
        #if login button don't active yet
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
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
            <center><h1>Log In</h1></center>
            <div class="container-sm">
                <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="send">login</button>
                </form>
            </div>
        </body>

        </html>

        <?php
    } else {
        #if push login button
        $user = $_POST["username"];
        $pass = $_POST["password"];
        #Encrypt pass
        $pass_cyp = sha1($pass);

        $sql = "SELECT * FROM user_login Where username ='$user' and pass ='$pass_cyp' ";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
            #if user exist
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_level"] = $row["level"];
            #create session userid and userlevels
            if ($row["level"] == 0) {
                #if user_levels is admin
                header("location:admin.php");
                #redirect to admin pages
            } else if ($row["level"] == 1) {
                #if user_levels is common user
                header("location:com_user.php");
                #redirect to common users pages
            }
        } else {
            echo "Incorrect username or password";
            header("refresh: 1; url = login.php");
            #if user doesn't exist redirect to login pages
        }

    }
} else {
    #if session is exist
    if ($_SESSION["user_level"] == 0) {
        #if user_levels is admin
        header("location:admin.php");
        #redirect to admin pages
    } else if ($_SESSION["user_level"] == 1) {
        #if user_levels is common user
        header("location:com_user.php");
        #redirect to common users pages
    }
}

?>