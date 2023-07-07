<?php
session_start();
require_once "connect.php";


if (isset($_GET["action"])) {
    if ($_GET["action"] == "add") {
        $id = $_GET["id"];
        $sql = "SELECT * FROM product WHERE product_id ='$id'";
        $result_s = mysqli_query($link, $sql);
        $da_po = mysqli_fetch_array($result_s);
        if (empty($_SESSION["cart"])) {
            $_SESSION["cart"][] = array_merge($da_po, array("quantity" => $_POST["quan"]));
        } else {
            foreach ($_SESSION["cart"] as $k => $v) {
                $id_arr[] = $_SESSION["cart"][$k]["product_id"];
                if ($_SESSION["cart"][$k]["product_id"] == $id) {
                    $_SESSION["cart"][$k]["quantity"] += $_POST["quan"];
                }
            }
            if (!in_array($id, $id_arr)) {
                $_SESSION["cart"][] = array_merge($_SESSION["cart"], array_merge($da_po, array("quantity" => $_POST["quan"])));
            }
        }
    }
    if ($_GET["action"] == "remove") {
        $ind = $_GET["ind"];
        unset($_SESSION["cart"][$ind]);
        if (empty($_SESSION["cart"])) {
            unset($_SESSION["cart"]);
        }
    }
    if ($_GET["action"] == "remove_all") {
        unset($_SESSION["cart"]);
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
    <a href="cart.php?action=remove_all">Empty Cart</a>
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
            <?php
            if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $k => $v) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $_SESSION["cart"][$k]["product_name"]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION["cart"][$k]["product_id"]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION["cart"][$k]["quantity"]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION["cart"][$k]["product_price"]; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION["cart"][$k]["product_price"] * $_SESSION["cart"][$k]["quantity"]; ?>
                        </td>
                        <td><a href="cart.php?action=remove&ind=<?php echo $k; ?>">Remove</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <?php
            if (isset($_SESSION["cart"])) {
                ?>
                <tr>
                    <td colspan="3"></td>
                    <td>sum</td>
                    <td>
                        <?php
                        $price = 0;
                        foreach ($_SESSION["cart"] as $k => $v) {
                            $price += $_SESSION["cart"][$k]["product_price"] * $_SESSION["cart"][$k]["quantity"];
                        }
                        echo $price;
                        ?>
                    </td>
                    <td>baht</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <div style="display:flex; padding-top:100px;">
        <?php
        $sql = "SELECT * FROM product";
        $result = mysqli_query($link, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $result_arr[] = $data;
        }
        foreach ($result_arr as $key => $value) {
            ?>
            <div class="container"
                style="display:flex; background-color:lightblue; border-radius:20px; width:500px; padding:20px;">
                <div class="image" style="padding-right:20px;">
                    <img src="<?php echo $result_arr[$key]["path_img"]; ?>" alt="images" width="200" height="200"
                        style="border-radius:20px;">
                </div>
                <form action="cart.php?action=add&id=<?php echo $result_arr[$key]["product_id"]; ?>" method="post">
                    <div class="footer">
                        <div>
                            <?php echo $result_arr[$key]["product_name"]; ?>
                        </div>
                        <div>
                            <?php echo $result_arr[$key]["product_price"]; ?> baht
                        </div>
                        <input value="1" name="quan">
                        <button type="submit">Add</button>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>

</body>

</html>