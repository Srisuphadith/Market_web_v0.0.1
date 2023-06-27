<?php
session_start();
require_once "connect.php";
if (isset($_GET["action"])) {
    if ($_GET["action"] == "add") {
            if (empty($_SESSION["cart"])) {
                $_SESSION["cart"][0] = array(3, 1, 2, 30);
                $_SESSION["cart"][1] = 2;
            } else {
                echo $_SESSION["cart"][0][3];
                echo $_SESSION["cart"][1];
            }
        
    }
    if ($_GET["action"] == "remove") {
        unset($_SESSION["cart"][0]);
        unset($_SESSION["cart"][1]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <table width="100%">
        <tbody>
            <tr>
                <th>Name</th>
                <th>Product id</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>
            <tr>
                <td>BC547</td>
                <td>1</td>
                <td>2</td>
                <td>5</td>
                <td>10</td>
                <td>Remove</td>
            </tr>
        </tbody>
    </table>

    <div class="container">
        <div class="image">
            <img src="bc547.jpg" alt="images" width="200" height="200">
        </div>
        <form action="cart.php?action=add" method="post">
            <div class="footer">
                <div>BC547</div>
                <div>5</div>
                <input value="1">
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
    <a href="cart.php?action=remove">remove</a>

</body>

</html>