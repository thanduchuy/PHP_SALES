<?php
include "control/connectDB.php";
function getAllCart($name)
{
    global $conn;
    $sql = "SELECT
    *
FROM
    `cart`
WHERE
    cart.nameUser = '$name'";
    $result = mysqli_query($conn, $sql);
    $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    return $cart;
}
function checkProductToCart($nameCart, $nameuser)
{
    global $conn;
    $sql = "SELECT * FROM `cart` WHERE name='$nameCart' AND nameUser='$nameuser' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    return $num;
}
function updateQuanlity($cartid, $quanlity)
{
    global $conn;
    $sql = "UPDATE
    `cart`
SET
    `quantity` = $quanlity
WHERE
    cart_id = $cartid ";
    $result = mysqli_query($conn, $sql);
}
function deleteItemInCart($cartid)
{
    global $conn;
    $sql = "DELETE FROM `cart` WHERE cart_id=$cartid ";
    $result = mysqli_query($conn, $sql);
}
function subTotalCart($cart)
{
    $result = 0;
    for ($i = 0; $i < count($cart); $i++) {
        $result += $cart[$i]["quantity"] * $cart[$i]["price"];
    }
    return $result;
}
function generateRandomString($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function checkOut($carts)
{
    global $conn;
    if (isset($_POST['btnCheckout'])) {
        if (!isset($_POST['rule'])) {
            echo "<script type='text/javascript'>alert('Vui lòng chấp nhận điều khoản');</script>";
        } else {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $company = $_POST['company'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $selectCountry = $_POST['selectOption'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $pay = $_POST['selector'];
            $subTotal = $_POST['subtotal'];
            $shipping = $_POST['shipping'];
            $user = $_SESSION['user'];
            $id = generateRandomString();
            if (empty($firstName) || empty($lastName) || empty($company) || empty($number) || empty($email) || empty($company) || empty($selectCountry) || empty($city) || empty($district) || !isset($pay) || empty($street)) {
                echo "<script type='text/javascript'>alert('Không được để trống trường nào');</script>";
            } else {
                $sql = "INSERT INTO `checkout`(
                `id`,
                `firstName`,
                `lastName`,
                `company`,
                `numberPhone`,
                `email`,
                `country`,
                `city`,
                `district`,
                `street`,
                `pay`,
                `subtotal`,
                `shipping`,
                `user`
            )
            VALUES('$id','$firstName','$lastName', '$company', '$number', '$email', '$selectCountry', '$city', '$district', '$street','$pay',$subTotal,$shipping,'$user') ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    addDetailCheckout($id, $carts);
                    removeALLCart($carts);
                    header('Location:index.php?success=true');
                }
            }
        }
    }
}
function removeALLCart($cart)
{
    global $conn;
    foreach ($cart as $item) {
        $id = $item['cart_id'];
        $sql = "DELETE FROM `cart` WHERE cart_id=$id";
        $result = mysqli_query($conn, $sql);
    }
}
function addDetailCheckout($id, $cart)
{
    global $conn;
    foreach ($cart as $item) {
        $name = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $sql = "INSERT INTO `detailCheckout`( `idCheckout`, `quanlity`, `price`, `name`) VALUES ('$id',$quantity,$price,'$name')";
        $result = mysqli_query($conn, $sql);
    }
}
