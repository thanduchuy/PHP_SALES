<?php
include "connectDB.php";
session_start();
if (isset($_SESSION['user'])) {
    $quanlity = $_GET['quanlity'];
    $price = $_GET['price'];
    $idP = $_GET['idP'];
    $image = $_GET['image'];
    $name = $_GET['name'];
    $user = $_SESSION['user'];
    if (checkProductToCart($name, $user) > 0) {
        updateCountCart($name, $user, number_format($quanlity));
        header('Location:../index.php');
    } else {
        if (addProductToCart(number_format($quanlity), number_format($price), $image, number_format($idP), $name, $user)) {
            header('Location:../index.php');
        }
    }
} else {
    header('Location:../login.php');
}
function checkProductToCart($nameCart, $nameuser)
{
    global $conn;
    $sql = "SELECT * FROM `cart` WHERE name='$nameCart' AND nameUser='$nameuser' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    return $num;
}
function updateCountCart($name, $user, $quanlity)
{
    global $conn;
    $sql = "UPDATE `cart` SET `quantity`=quantity+$quanlity WHERE name='$name' AND nameUser='$user'";
    $result = mysqli_query($conn, $sql);
}
function addProductToCart($quanlity, $price, $image, $idP, $name, $user)
{
    global $conn;
    $sql = "INSERT INTO `cart`(
            `quantity`,
            `price`,
            `image`,
            `product_id`,
            `name`,
            `nameUser`
        )
    VALUES($quanlity,$price,'$image',$idP,'$name','$user')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
