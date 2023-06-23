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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </head>

        <body>
            <h1>
                Dashboard
            </h1>
            <h1>
                <?php echo $row["username"]; ?>
            </h1>
            <img src="meme2.gif">
            <h1><a href="log_out.php">log out</a></h1>
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