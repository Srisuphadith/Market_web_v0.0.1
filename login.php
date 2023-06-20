<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    require_once "connect.php";
    if (!isset($_POST["send"])) {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
        </head>

        <body>
            <h1>Log In</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input name="email" type="text" placeholder="email"><br><br>
                <input name="password" type="password" placeholder="password"><br><br>
                <button type="submit" name="send" value="Submit">Login</button>
            </form>
        </body>

        </html>

        <?php
    } else {
        $user = $_POST["email"];
        $pass = $_POST["password"];
        $pass_cyp = sha1($pass);

        $sql = "SELECT * FROM user_login Where email ='$user' and pass ='$pass_cyp' ";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_level"] = $row["level"];
            if ($row["level"] == 0) {
                header("location:admin.php");
            } else if ($row["level"] == 1) {
                header("location:com_user.php");
            }
        } else {
            echo "Incorrect email or password";
            echo mysqli_num_rows($result);
        }

    }
} else {
    if ($_SESSION["user_level"] == 0) {
        header("location:admin.php");
    } else if ($_SESSION["user_level"] == 1) {
        header("location:com_user.php");
    }
}

?>