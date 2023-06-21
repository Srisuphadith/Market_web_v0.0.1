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
        <style>
        </style>
    </head>

    <body>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post"><br><br>
            <h1>Sign up</h1>
            <input type="text" name="username" placeholder="username"><br><br>
            <input type="text" name="name" placeholder="name"><br><br>
            <input type="text" name="surname" placeholder="surname"><br><br>
            <input type="email" name="email" placeholder="email"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <button type="submit" name="submit">
                <h1>Sign up</h1>
            </button>
        </form>
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
        $sql = "INSERT INTO user_login (name,surname,username,pass,email,level) VALUES ('$name','$surname','$username','$password','$email',1)";
        $result = mysqli_query($link,$sql);
        echo "success";
        header("refresh: 1; url = login.php");

    } else {
        echo "enter please information";
        header("refresh: 1; url = register.php");
    }
}
?>